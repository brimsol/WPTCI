<?php

/**
 * Auth Class
 * @package Webpagetest
 * @subpackage admin
 * @category Controller
 * @author AMI
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('admin_model');
        $this->output->enable_profiler(TRUE);
    }

    public function index() {

        if (logged_in()) {
            redirect(site_url('analyzer'));
        } else {
            redirect(site_url('login'));
        }

//        if ($this->session->userdata('username') != '') {
//            redirect(site_url('admin/dashboard'));
//        } else {
//            redirect(site_url('admin/auth/login'));
//        }
    }

    public function login() {
        if (logged_in()) {
            redirect(site_url('analyzer'));
        }

        //$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|trim');

        if ($this->form_validation->run() !== false) {

            $res = $this->admin_model->verify_user($this->input->post('username'), $this->input->post('password'));

            if ($res != FALSE) {
                if ($res->num_rows() > 0) {
                    $row = $res->row();

                    $user_name = $row->user_name;
                    $user_id = $row->user_id;
                    $user_type = $row->user_type;
                    $points = $row->points;
                }
                $newdata = array('user_name' => $user_name, 'user_id' => $user_id, 'user_type' => $user_type, 'points' => $points);

                $this->session->set_userdata($newdata);
                redirect(site_url('analyzer'));
            } else {
                $this->ci_alerts->set('error_front', 'Invalid username or password');
                redirect('login');
            }
        }

        $this->load->view('front/login_view');
    }

    //I need to go home bye bye
    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('login'), 'refresh');
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */