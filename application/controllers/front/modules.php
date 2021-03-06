<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modules extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!logged_in()) {
            redirect(site_url('login'));
        }

        $this->history_table = "test_history";
        $this->work_table = "customer_works";
        $this->customer_table = "users";

        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
        $this->user_type = $this->session->userdata('user_type');

//$this->output->enable_profiler(TRUE);
// Load the rest client spark
//$this->load->spark('restclient/2.2.1');
// Load the library
//$this->load->library('rest');
        $this->pageTesterURL = 'http://www.webpagetest.org/runtest.php';
        $this->testStatusURL = 'http://www.webpagetest.org/testStatus.php';
        $this->xmlUrl = "http://www.webpagetest.org/xmlResult/";
        $this->api_key = "9c2ffd16b27f4059b94798f4ee91337b";
    }

    public function analyzer() {

        $data['title'] = "Customers";
        $this->form_validation->set_rules('s_url', 'Site URL', 'required|trim|xss_clean|prep_url|valid_url');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email');

        if ($this->form_validation->run() == FALSE) {// validation hasn't been passed
            $this->load->view('front/analyzer_view', $data);
        } else {// passed validation proceed to post success logic
            $customer = $this->admin_model->GetOne($this->customer_table, 'user_id', $this->user_id);
            if ($customer->num_rows() > 0) {
                $row = $customer->row();
                $points = $row->points;
            } else {
                $points = 0;
            }
            $this->session->set_userdata('points', $points);
            if (is_admin()) {
                $points = 1;
            }
            if ($points < 1) {

                $this->ci_alerts->set('error', 'Sorry you don\'t have enough points to continue');
                redirect('analyzer');
            } else {

                $url = $this->input->post('s_url');
                $email = $this->input->post('email');

                $this->session->set_userdata('email_send', $email);

                $this->analyze_history(urlencode($url), $email);
                $this->run_test(urlencode($url));
//echo $this->points ;
                $data['url'] = $url;
                $this->session->set_userdata('url', $url);
                $this->load->view('front/scaning_view', $data);
            }
        }
    }

    public function update_point() {

        $p = $this->session->userdata('points');
        $points = $p - 1;
        $form_data = array('points' => $points);
        $this->admin_model->Update($this->user_id, $form_data, 'user_id', $this->customer_table);
        $this->session->set_userdata('points', $points);
    }

    public function analyze_history($url, $email) {
        $form_data = array('user_id' => $this->user_id, 'url' => $url, 'email_sent' => $email, 'test_date' => date("Y-m-d H:i:s"), 'status' => '0');
        $this->admin_model->Save($form_data, $this->history_table);
    }

    public function run_test($url) {
        if ($this->urlExists($url) == false) {

            $this->ci_alerts->set('error', 'May be your server is down or there is not internet connection');
            redirect('analyzer');
            exit();
        }
        $curlSession = curl_init($this->pageTesterURL);
        curl_setopt($curlSession, CURLOPT_POST, true);
        curl_setopt($curlSession, CURLOPT_POSTFIELDS, 'url=' . $url . '&f=xml&k=' . $this->api_key);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $curlResponse = curl_exec($curlSession);
        curl_close($curlSession);
        if ($curlResponse == '') {
//echo "Something wired happend, may be google is down";
            $this->ci_alerts->set('error', 'Something wired happend, may be google is down');
            redirect('analyzer');
            exit();
        }
        $xmlObj = new SimpleXMLElement($curlResponse);

        if ($xmlObj->statusCode != '200') {

//echo "Your Test url is down or we are running out of battery";
            $this->ci_alerts->set('error', 'Your Test url is down or we are running out of battery');
            redirect('analyzer');
            exit();
        }
        $test_id = (string) $xmlObj->data->testId;
        $this->session->set_userdata('test_id', $test_id);

        redirect('analyzing');
    }

    public function analyzing() {

        $data['url'] = $this->session->userdata('url');
        $this->load->view('front/scaning_view', $data);
        $this->load->view('front/app_js');
    }

    public function report_sent() {
        $this->ci_alerts->set('success', 'Please check you inbox for page test report.');
        redirect(site_url('analyzer'));
    }

    public function result_status() {

        $test_id = $this->session->userdata('test_id');
        if ($test_id == '') {
            echo 10;
            exit();
        }
        $curlSession = curl_init($this->testStatusURL);
        curl_setopt($curlSession, CURLOPT_POST, true);
        curl_setopt($curlSession, CURLOPT_POSTFIELDS, 'f=xml&test=' . $test_id . '');
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $curlResponse = curl_exec($curlSession);
        curl_close($curlSession);

        if ($curlResponse == '') {
            echo 20;
            exit();
        }
        $xmlObj = new SimpleXMLElement($curlResponse);
        echo $xmlObj->data->statusCode;
    }

    public function get_result() {

        $test_id = $this->session->userdata('test_id');

        if ($test_id == '') {
            echo 10;
            exit();
        }


        $xmlFile = file_get_contents($this->xmlUrl . $test_id . '/?breakdown=1&domains=1');

        if ($xmlFile == '') {
            echo 10;
            exit();
        }

        $xmlObj = new SimpleXMLElement($xmlFile);

        $data['test_url'] = (string) $xmlObj->data[0]->testUrl;
        $data['test_id'] = $test_id;
        $data['first_byte'] = (int) $xmlObj->data->average->firstView->TTFB;
        $data['score_cache'] = (int) $xmlObj->data->average->firstView->score_cache;
        $data['score_cdn'] = (int) $xmlObj->data->average->firstView->score_cdn;
        $data['score_gzip'] = (int) $xmlObj->data->average->firstView->score_gzip;
        $data['score_cookies'] = (int) $xmlObj->data->average->firstView->score_cookies;

//-------------------------------
        $data['first_view_render'] = (int) $xmlObj->data->average->firstView->render;
        $data['repeat_view_render'] = (int) $xmlObj->data->average->repeatView->render;

        $data['first_loadTime'] = (int) $xmlObj->data->average->firstView->loadTime;
        $data['repeat_loadTime'] = (int) $xmlObj->data->average->repeatView->loadTime;

        $data['first_fully_loaded'] = (int) $xmlObj->data->average->firstView->fullyLoaded;
        $data['repeat_fully_loaded'] = (int) $xmlObj->data->average->repeatView->fullyLoaded;

        $data['first_domElements'] = (int) $xmlObj->data->average->firstView->domElements;
        $data['repeat_domElements'] = (int) $xmlObj->data->average->repeatView->domElements;

        //----------------------------------error-----------

        $data['first_docTime'] = (int) $xmlObj->data->average->firstView->docTime;
        $data['first_bytesOut'] = (int) $xmlObj->data->average->firstView->bytesOut;
        $data['first_requestsDoc'] = (int) $xmlObj->data->average->firstView->requestsDoc;
        $data['first_requests'] = (int) $xmlObj->data->average->firstView->requests;


        $data['first_bytesIn'] = (int) $xmlObj->data->average->firstView->bytesIn;
        $data['first_bytesInDoc'] = (int) $xmlObj->data->average->firstView->bytesInDoc;

        $data['first_fullyLoaded'] = (int) $xmlObj->data->average->firstView->fullyLoaded;

//docTime loadTime domElements requestsDoc requests
//-----------------------------------

        $data['score_keep_alive'] = (int) $xmlObj->data->average->firstView->{'score_keep-alive'};
        $data['score_minify'] = (int) $xmlObj->data->average->firstView->score_minify;
        $data['score_combine'] = (int) $xmlObj->data->average->firstView->score_combine;

        $data['score_compress'] = (int) $xmlObj->data->average->firstView->score_compress;
        $data['score_etags'] = (int) $xmlObj->data->average->firstView->score_etags;

        $data['thumbnail'] = (string) $xmlObj->data->run->firstView->thumbnails->screenShot;

        $data['waterfall'] = (string) $xmlObj->data->run->firstView->images->waterfall;
        $data['connection_view'] = (string) $xmlObj->data->run->firstView->images->connectionView;
        $data['checklist'] = (string) $xmlObj->data->run->firstView->images->checklist;
        $data['screenshot'] = (string) $xmlObj->data->run->firstView->images->screenShot;

        $data['waterfall_repeat'] = (string) $xmlObj->data->run->repeatView->images->waterfall;
        $data['connection_view_repeat'] = (string) $xmlObj->data->run->repeatView->images->connectionView;
        $data['checklist_repeat'] = (string) $xmlObj->data->run->repeatView->images->checklist;
        $data['screenshot_repeat'] = (string) $xmlObj->data->run->repeatView->images->screenShot;

        //Break down data first view Request

        $data['break_html_req'] = (int) $xmlObj->data->run->firstView->breakdown->html->requests;
        $data['break_js_req'] = (int) $xmlObj->data->run->firstView->breakdown->js->requests;
        $data['break_css_req'] = (int) $xmlObj->data->run->firstView->breakdown->css->requests;
        $data['break_image_req'] = (int) $xmlObj->data->run->firstView->breakdown->image->requests;
        $data['break_flash_req'] = (int) $xmlObj->data->run->firstView->breakdown->flash->requests;
        $data['break_font_req'] = (int) $xmlObj->data->run->firstView->breakdown->font->requests;
        $data['break_other_req'] = (int) $xmlObj->data->run->firstView->breakdown->other->requests;

        $data['break_html_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->html->bytes;
        $data['break_js_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->js->bytes;
        $data['break_css_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->css->bytes;
        $data['break_image_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->image->bytes;
        $data['break_flash_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->flash->bytes;
        $data['break_font_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->font->bytes;
        $data['break_other_bytes'] = (int) $xmlObj->data->run->firstView->breakdown->other->bytes;

        $page_speed = (string) $xmlObj->data->run->firstView->rawData->PageSpeedData;
        //$this->PageSpeedTreeHTML($page_speed);

        $data['domain_host'] = $xmlObj->data->run->firstView->domains;
        $host = "";
        $req = "";
        $byt = "";
        $con = "";
        foreach ($xmlObj->data->run->firstView->domains->children() as $sec_gen) {

            $host .=$sec_gen['host'] . '|';
            $req .=$sec_gen->requests . ',';
            $byt .=$sec_gen->bytes . ',';
            $con .=$sec_gen->connections . ',';
        }
        $data['dom_host'] = substr($host, 0, strlen($host) - 1);
        $data['dom_req'] = substr($req, 0, strlen($req) - 1);
        $data['dom_byt'] = substr($byt, 0, strlen($byt) - 1);
        $data['dom_con'] = substr($con, 0, strlen($con) - 1);


        //$this->load->library('jpgraph');
        //$break_req_data = array($data['break_html_req'], $data['break_js_req'], $data['break_css_req'], $data['break_image_req'], $data['break_flash_req'], $data['break_font_req'], $data['break_other_req']);
        //$break_req_graph = $this->jpgraph->piechart($break_req_data, 'Breakdown by MIME (Request)', $test_id . 'req');
        //$break_byt_data = array($data['break_html_bytes'], $data['break_js_bytes'], $data['break_css_bytes'], $data['break_image_bytes'], $data['break_flash_bytes'], $data['break_font_bytes'], $data['break_other_bytes']);
        //$break_byt_graph = $this->jpgraph->piechart($break_byt_data, 'Breakdown by MIME(Bytes)', $test_id . 'byt');
        //exit();



        $pd = file_get_contents($page_speed);
        if ($pd == '') {
            echo 10;
            exit();
        }

        $json = json_decode($pd);
        $data['speed_score'] = $json->score;
        $data['page_speed'] = PageSpeedTreeHTML($pd);

        //echo $page_speed;
        //print_r($json);
        //$this->PageSpeedTreeHTML($json);
        //print_r($json);
        //print($pd);
        //print_r(PageSpeedTreeHTML($pd));
        //$this->load->view('front/print_domain_view', $data);
        $this->pdf($data);
    }

    function xml2array($xmlObject, $out = array()) {
        foreach ((array) $xmlObject as $index => $node)
            $out[$index] = ( is_object($node) ) ? xml2array($node) : $node;

        return $out;
    }

    function urlExists($url = NULL) {
//        if ($url == NULL)
//            return false;
//        $url = urldecode($url);
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $data = curl_exec($ch);
//        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//        curl_close($ch);
//
//        if ($httpcode >= 200 && $httpcode < 309) {
        return true;
//        } else {
//            return false;
//        }
    }

    function tpdf($data) {
        $this->load->library('mytcpdf');
        $pdf = new mytcpdf('P', 'mm', 'A4', true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 006');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
        $pdf->SetHeaderData(base_url() . '/assets/front/img/logo.png', 222, 'Page Test' . ' 006', 'Executive Report');
// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
        $pdf->SetMargins('10', PDF_MARGIN_TOP, '10');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// ---------------------------------------------------------

        $pdf->SetFont('Helvetica', '', 10);
        $pdf->AddPage();
        $html = $this->load->view('front/print_summary_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();


        $pdf->AddPage();
        $html = $this->load->view('front/print_waterfall_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_opt_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_connection_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_checklist_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();


        $pdf->AddPage();
        $html = $this->load->view('front/print_gradedetails_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_breakdown_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->Output('exampl.pdf', 'I');
    }

    function pdf($data) {

        $this->load->library('mytcpdf');
        $pdf = new mytcpdf('P', 'mm', 'A4', true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 006');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
         $pdf->SetHeaderData('logo.png', 30, 'Page Test', 'Executive Report');
// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
        $pdf->SetMargins('10', PDF_MARGIN_TOP, '10');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// ---------------------------------------------------------

        $pdf->SetFont('Helvetica', '', 10);
        $pdf->AddPage();
        $html = $this->load->view('front/print_summary_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();


        $pdf->AddPage();
        $html = $this->load->view('front/print_waterfall_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_opt_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_connection_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_checklist_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();


        $pdf->AddPage();
        $html = $this->load->view('front/print_gradedetails_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_breakdown_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_domain_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

        $pdf->AddPage();
        $html = $this->load->view('front/print_screenshot_view', $data, true);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->lastPage();

//pdf_create($html, 'filename');
        $pdf_data = $pdf->Output('', 's');

        if (write_file('./pdf/' . $this->session->userdata('test_id') . '.pdf', $pdf_data)) {
            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'mail.demoworks.be';
            $config['smtp_user'] = 'pagetest@demoworks.be';
            $config['smtp_pass'] = 'Techno#logy123';
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->from('pagetest@demoworks.be', 'Page Test Report - Verbat Technologies');
            $this->email->to($this->session->userdata('email_send'));
            $this->email->bcc('miaravindh@gmail.com');

            $this->email->subject('Page Test Report');


            /* EMAIL TEMPLATE BEGINS */

            $imgSrc = 'http://www.verbat.com/in/images/logo.gif'; // Change image src to your site specific settings
            $imgDesc = 'Verbat Logo'; // Change Alt tag/image Description to your site specific settings
            $imgTitle = 'Verbat Logo'; // Change Alt Title tag/image title to your site specific settings

            /*
              Change your message body in the given $subjectPara variables.
              $subjectPara1 means 'first paragraph in message body', $subjectPara2 means'first paragraph in message body',
              if you don't want more than 1 para, just put NULL in unused $subjectPara variables.
             */
            $subjectPara1 = 'Hello there,';
            $subjectPara2 = 'Thank you for taking webpage test.';
            $subjectPara3 = 'Please find the attached report document in pdf format.';
            $subjectPara4 = 'Regards,';
            $subjectPara5 = 'Page Test Team';

            $message = '<!DOCTYPE HTML>' .
                    '<head>' .
                    '<meta http-equiv="content-type" content="text/html">' .
                    '<title>Email notification</title>' .
                    '</head>' .
                    '<body>' .
                    '<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">' .
                    '<img height="50" width="220" style="border-width:0" src="' . $imgSrc . '" alt="' . $imgDesc . '" title="' . $imgTitle . '">' .
                    '</div>' .
                    '<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">' .
                    '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">' .
                    '<p>' . $subjectPara1 . '</p>' .
                    '<p>' . $subjectPara2 . '</p>' .
                    '<p>' . $subjectPara3 . '</p>' .
                    '<p>' . $subjectPara4 . '</p>' .
                    '<p>' . $subjectPara5 . '</p>' .
                    '</div>' .
                    '</div>' .
                    '<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">' .
                    '' .
                    '</div>' .
                    '</body>';

            /* EMAIL TEMPLATE ENDS */

            $this->email->message($message);
            $this->email->attach('./pdf/' . $this->session->userdata('test_id') . '.pdf');

            if ($this->email->send()) {
                if (!is_admin()) {
                    $this->update_point();
                }

                echo 200;
            }
            //echo $this->email->print_debugger();
        }
    }

    public
            function down() {

        echo "<center><img src='" . base_url() . "/assets/front/img/down.png'/></center>";
    }

}

/* End of file customers.php */
    /* Location: ./application/controllers/customers.php */    