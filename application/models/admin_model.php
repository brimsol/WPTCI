<?php

/**
 * Admin_model Class 
 * @package Webpagetest
 * @subpackage admin
 * @category Controller
 * @author AMI 
 * */
class Admin_model extends CI_Model {

    public function __construct() {

    }

    public function verify_user($username, $password) {
        $q = $this->db->where('deleted', '0')->where('user_name', $username)->where('password', sha1($password))->limit(1)->get('users');

        if ($q->num_rows > 0) {
            // person has account with us
            return $q;
        }
        return FALSE;
    }

    function changepass() {

        $newpassword = $this->input->post('newpassword');
        $username = $this->input->post('username');
        $data = array('password' => sha1($newpassword),);
        $this->db->update('users', $data);
        $this->db->where('username', $username);
    }

    function get() {
        $username = $this->input->post('username');
        $this->db->where('username', $username);
        return $this->db->get('users');
    }

    function addnewuser() {

        $username = $this->input->post('username');
        $newpassword = $this->input->post('newpassword');
        $usertype = $this->input->post('usertype');
        $data = array('username' => $username, 'password' => sha1($newpassword), 'user_type' => $usertype,);
        $this->db->insert('users', $data);
    }

    function listuser() {
        $this->db->where('user_type', 'M');
        return $this->db->get('users');
    }

    function Save($form_data,$table) {
        
        $this->db->insert($table, $form_data);

        if ($this->db->affected_rows() == '1') {
            $insert_id =$this->db->insert_id();
            $this->session->set_userdata($table.'_last_insert_id', $insert_id);
            return TRUE;    
        }

        return FALSE;
    }

    function Update($id, $form_data,$primary_key, $table) {

        $this->db->where($primary_key, $id);
        $this->db->update($table, $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }



    function GetOne($table, $primary_key, $id) {

        return $this->db->where($primary_key, $id)->where('deleted','0')->limit(1)->get($table);
    }

    function GetSearchResult($key) {

        return $this->db->like('name', $key, 'after')->order_by('name', 'ASC')->get('signs')->result();
    }

    function GetAll($table ,$offset = null, $limit = null) {

        if ($offset != null) {
            return $this->db->where('deleted','0')->order_by('created_at', 'DESC')->limit($offset, $limit)->get($table)->result();
        } else {
            return $this->db->where('deleted','0')->order_by('created_at', 'DESC')->get($table)->result();
        }
    }
     function GetAllcustomers() {

            return $this->db->where('user_type','2')->where('deleted','0')->order_by('user_name', 'ASC')->get('users')->result();

    }
    function GetAllWork() {

       
            $this->db->select('*');
            $this->db->from('customer_works');
            $this->db->join('customers', 'customers.customer_id = customer_works.work_id');
            $this->db->where('customers.deleted','0');
            $this->db->where('customer_works.deleted','0');
            $this->db->order_by('customer_works.created_at', 'DESC');
            return $this->db->get()->result();
        
    }
    
    function GetAllWorkDate($mindate='',$maxdate='') {

       
            $this->db->select('*');
            $this->db->from('customer_works');
            $this->db->join('customers', 'customers.customer_id = customer_works.work_id');
            $this->db->where('customers.deleted','0');
            $this->db->where('customer_works.deleted','0');
            if($mindate != '' && $maxdate != ''){
            $this->db->where("customer_works.work_starting_date BETWEEN '$mindate' AND '$maxdate'");
            }
            $this->db->order_by('customer_works.created_at', 'DESC');
            //print_r($mindate);
            return $this->db->get()->result();
        
    }

}

/* End of file admin_model.php */ 