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
        if (!is_admin()) {
            $this->update_point();
        }

        if ($test_id == '') {
            echo 10;
            exit();
        }
        $xmlFile = file_get_contents($this->xmlUrl . $test_id . '/');
        $xmlObj = new SimpleXMLElement($xmlFile);

        $data['test_url'] = (string) $xmlObj->data[0]->testUrl;
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

        $page_speed = (string) $xmlObj->data->run->firstView->rawData->PageSpeedData;
        //$this->PageSpeedTreeHTML($page_speed);
        $pd = file_get_contents($page_speed);
        $json = json_decode($pd);
        $data['speed_score'] = $json->score;
        $data['page_speed'] = PageSpeedTreeHTML($pd);
        //echo $page_speed;
        //print_r($json);
        //$this->PageSpeedTreeHTML($json);
        //print_r($json);
        //print($pd);
        //print_r(PageSpeedTreeHTML($pd));
        //$this->load->view('front/print_view', $data);
        $this->pdf($data);
    }

    public function xmlUrl($id) {
        $baseUrl = "http://www.webpagetest.org/xmlResult/";
        return $baseUrl . $id . "/";
    }

    public function fetchXmlResults($id) {
        $xmlFile = file_get_contents($this->xmlUrl($id));
        $xmlObj = new SimpleXMLElement($xmlFile);
        return $xmlObj;
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

    function pdf($data) {

        $this->load->helper('dompdf');
        $html = $this->load->view('front/print_view', $data, true);
//pdf_create($html, 'filename');
        $pdf_data = pdf_create($html, '', false);
        if (write_file('./pdf/' . $this->session->userdata('test_id') . '.pdf', $pdf_data)) {
            $this->load->library('email');

            $this->email->from('pagetest@verbat.com', 'Page Test Report - Verbat Technologies');
            $this->email->to($this->session->userdata('email_send'));
            $this->email->bcc('aravind.m@verbat.com');

            $this->email->subject('Page Test Report');
            $this->email->message('Hello,\n Thank you for analyzing your website. \n Please find the attached PDF report \n regards \n Page Test Team \n Verbat Technologies');
            $this->email->attach('./pdf/' . $this->session->userdata('test_id') . '.pdf');

            if($this->email->send()){
                
                echo 200;
            }

            //echo $this->email->print_debugger();
        }
    }

}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */