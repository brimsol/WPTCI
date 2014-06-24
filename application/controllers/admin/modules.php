<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modules extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->customer_table = "users";
        $this->work_table = "customer_works";
        if (!is_admin()) {
            redirect(site_url());
        }
        //$this->output->enable_profiler(TRUE);
    }

    public function dashboard() {
        $this->load->view('admin/dashboard_view');
    }

    public function customers() {
        $data['title'] = "Customers";
        $data['customers'] = $this->admin_model->GetAllcustomers('users');
        $this->load->view('admin/customers/list_view', $data);
    }

    public function add_customer() {
        $data['title'] = "Customers";
        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean|max_length[40]|is_unique[users.user_name]');
        $this->form_validation->set_rules('password', 'Customer ID', 'required|trim|xss_clean|min_length[4]|max_length[40]');
        $this->form_validation->set_rules('points', 'Points', 'required|trim|xss_clean|max_length[10]|is_natural');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|xss_clean|max_length[40]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|max_length[100]');

        if ($this->form_validation->run() == FALSE) {// validation hasn't been passed
            $this->load->view('admin/customers/add_view', $data);
        } else {// passed validation proceed to post success logic
            $form_data = array('user_name' => set_value('user_name'), 'password' => sha1(set_value('password')), 'points' => set_value('points'), 'full_name' => set_value('full_name'),'email' => set_value('email'));
            if ($this->admin_model->Save($form_data, $this->customer_table) == TRUE) {// the information has therefore been successfully saved in the db
                $this->ci_alerts->set('success', 'Saved Successfully');
                redirect('admin/customers');
// or whatever logic needs to occur
            } else {

                $this->ci_alerts->set('success', 'An error occurred saving your information. Please try again later');
                redirect('admin/customers/add');
            }
        }
    }

    function edit_customer($id) {
        $data['title'] = "Customers";
        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean|max_length[40]');
        $this->form_validation->set_rules('password', 'Customer ID', 'trim|xss_clean|min_length[4]|max_length[40]');
        $this->form_validation->set_rules('points', 'Points', 'required|trim|xss_clean|max_length[10]|is_natural');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|xss_clean|max_length[40]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|max_length[100]');

        if ($this->form_validation->run() == FALSE) {// validation hasn't been passed
            $data['customer'] = $this->admin_model->GetOne($this->customer_table, 'user_id', $id);
            $this->load->view('admin/customers/add_view', $data);
        } else {// passed validation proceed to post success logic
            if(set_value('password') == ''){
                $form_data = array('user_name' => set_value('user_name'), 'points' => set_value('points'), 'full_name' => set_value('full_name'),'email' => set_value('email'));
            }else{
                $form_data = array('user_name' => set_value('user_name'), 'password' => sha1(set_value('password')), 'points' => set_value('points'), 'full_name' => set_value('full_name'),'email' => set_value('email'));
            }
            
            
            if ($this->admin_model->Update($id, $form_data, 'user_id', $this->customer_table) == TRUE) {// the information has therefore been successfully saved in the db
                $this->ci_alerts->set('success', 'Updated Successfully');
                redirect('admin/customers');
// or whatever logic needs to occur
            } else {

                $this->ci_alerts->set('warning', 'No information changed');
                redirect('admin/customers/edit/'.$id);
            }
        }
    }

    function delete_customer($id) {

        $form_data = array('deleted' => '1');
        if ($this->admin_model->Update($id, $form_data, 'user_id', $this->customer_table) == TRUE) {// the information has therefore been successfully saved in the db
            $this->ci_alerts->set('success', 'Deleted Successfully');
            redirect('admin/customers');
// or whatever logic needs to occur
        } else {

            $this->ci_alerts->set('success', 'An error occurred deleting your information. Please try again later');
            redirect('admin/customers/');
        }
    }

    public function works() {
        $data['title'] = "Works";
        $data['customers'] = $this->admin_model->GetAllWork();
        $this->load->view('admin/works/list_view', $data);
    }

    public function reports() {
        $data['title'] = "Reports";
        $start = $this->input->post('datestart');
        $end =  $this->input->post('dateend');
        $data['customers'] = $this->admin_model->GetAllWorkDate($start,$end);
        $this->load->view('admin/reports/list_view', $data);
        //$test = $this->admin_model->GetAllWorkDate($start,$end);
        //print_r($test);
    }

    public function add_points($id = '') {
        if ($id == '') {
            $this->ci_alerts->set('error', 'Invalid Customer ID');
            redirect('admin/customers/');
        }
        $data['title'] = "Work";
        $this->form_validation->set_rules('points', 'Points', 'required|trim|xss_clean|max_length[10]|is_natural');
        

        if ($this->form_validation->run() == FALSE) {// validation hasn't been passed
            $data['customer'] = $this->admin_model->GetOne($this->customer_table, 'user_id', $id);
            $this->load->view('admin/points/add_view', $data);
        } else {// passed validation proceed to post success logic
            $form_data = array('points' => set_value('points'));
            if ($this->admin_model->Update($id, $form_data, 'user_id', $this->customer_table) == TRUE) {// the information has therefore been successfully saved in the db
                $this->ci_alerts->set('success', 'Updated Successfully');
                redirect('admin/customers');

            } else {

                $this->ci_alerts->set('warning', 'No information changed');
                redirect('admin/customers/');
            }
        }
    }

    function edit_work($id) {
        if ($id == '') {
            $this->ci_alerts->set('error', 'Invalid Work ID');
            redirect('admin/works/');
        }
        $data['title'] = "Work";
        $this->form_validation->set_rules('work_starting_date', 'Work Starting Date', 'required|trim|xss_clean|callback_date_check');
        $this->form_validation->set_rules('rate_of_work', 'Customer ID', 'trim|xss_clean|numeric|greater_than[0]');
        $this->form_validation->set_rules('total_measurement', 'Total Measurement', 'required|trim|xss_clean|numeric|greater_than[0]');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required|trim|xss_clean|numeric|greater_than[0]');
        $this->form_validation->set_rules('advance_amount', 'Advance Amount', 'trim|xss_clean|numeric');
        $this->form_validation->set_rules('balance_amount', 'Balance Amount', 'required|trim|xss_clean|numeric');
        $this->form_validation->set_rules('details_of_work', 'Detail of Work', 'required|trim|xss_clean|max_length[1000]');

        if ($this->form_validation->run() == FALSE) {// validation hasn't been passed
            $data['customer'] = $this->admin_model->GetOne($this->work_table, 'work_id', $id);
            $this->load->view('admin/works/add_view', $data);
        } else {// passed validation proceed to post success logic
            $wdate = set_value('work_starting_date');
            $wdate = str_replace('/', '-', $wdate);
            $wdate = strtotime($wdate);
            //echo date("Y-m-d", $wdate);
  
            $form_data = array('work_starting_date' => date("Y-m-d", $wdate), 'rate_of_work' => set_value('rate_of_work'), 'total_measurement' => set_value('total_measurement'), 'advance_amount' => set_value('advance_amount'), 'total_amount' => set_value('total_amount'), 'balance_amount' => set_value('balance_amount'), 'details_of_work' => set_value('details_of_work'));
            if ($this->admin_model->Update($id, $form_data, 'work_id', $this->work_table) == TRUE) {// the information has therefore been successfully saved in the db
                $this->ci_alerts->set('success', 'Updated Successfully');
                redirect('admin/works');
// or whatever logic needs to occur
            } else {

                $this->ci_alerts->set('error', 'An error occurred updating your information. Please try again later');
                redirect('admin/works');
            }
        }
    }

    function delete_work($id) {

        $form_data = array('deleted' => '1');
        if ($this->admin_model->Update($id, $form_data, 'work_id', $this->work_table) == TRUE) {// the information has therefore been successfully saved in the db
            $this->ci_alerts->set('success', 'Deleted Successfully');
            redirect('admin/customers');
// or whatever logic needs to occur
        } else {

            $this->ci_alerts->set('success', 'An error occurred deleting your information. Please try again later');
            redirect('admin/customers/');
        }
    }

    public function date_check($date) {

        $day = (int) substr($date, 0, 2);
        $month = (int) substr($date, 3, 2);
        $year = (int) substr($date, 6, 4);
        if (!checkdate($month, $day, $year)) {
            $this->form_validation->set_message('date_check', 'The %s field not valid');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    

}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */