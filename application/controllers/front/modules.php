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

        $this->output->enable_profiler(TRUE);

        // Load the rest client spark
        //$this->load->spark('restclient/2.2.1');
        // Load the library
        //$this->load->library('rest');
        $this->pageTesterURL = 'http://www.webpagetest.org/runtest.php';
        $this->testStatusURL = 'http://www.webpagetest.org/testStatus.php';
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
            
            if (is_admin) {
                $points = 1;
            }
            if ($points < 1) {

                $this->ci_alerts->set('error', 'Sorry you don\'t have enough points to continue');
                redirect('analyzer');
            } else {

                $url = $this->input->post('s_url');
                $email = $this->input->post('email');
                $this->analyze_history(urlencode($url), $email);
                $this->run_test(urlencode($url));
                //echo $this->points ;
                $data['url'] = $url;
                $this->load->view('front/scaning_view', $data);
            }
        }
    }

    public function update_point($p) {

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
        curl_setopt($curlSession, CURLOPT_POSTFIELDS, 'url=' . $url . '&f=xml&k=9c2ffd16b27f4059b94798f4ee91337b');
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
        //echo $test_id;
        $this->session->set_userdata('test_id', $test_id);
        //$data['url'] = $url;
        //$this->load->view('front/scaning_view', $data);
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

    public function xmlUrl($id) {
        $baseUrl = "http://www.webpagetest.org/xmlResult/";
        return $baseUrl . $id . "/";
    }

    public function fetchXmlResults($id) {
        $xmlFile = file_get_contents($this->xmlUrl($id));
        $xmlObj = new SimpleXMLElement($xmlFile);
        return $xmlObj;
    }

    public function convert_milli_seconds($milliseconds) {
        return $milliseconds / 1000;
    }

    function urlExists($url = NULL) {
        if ($url == NULL)
            return false;
        $url = urldecode($url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode >= 200 && $httpcode < 309) {
            return true;
        } else {
            return false;
        }
    }

    function pdf() {

        $this->load->helper('dompdf');
        // page info here, db calls, etc.     
        $html = $this->load->view('front/print_view', '', true);
        pdf_create($html, 'filename');

//        $data = pdf_create($html, '', false);
//        write_file('name', $data);
        //if you want to write it to disk and/or send it as an attachment    
    }

}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */