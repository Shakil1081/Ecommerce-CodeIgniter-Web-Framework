<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->helper("form");
        $this->load->view('header');
        $this->load->view('templates/login');
        $this->load->view('footer');
    }

    public function check() {
        $data = array(
            "email" => $this->input->post("email"),
            "password" => md5($this->input->post("pass"))
        );
        $r = $this->am->ViewDataWhere("customer", "id, type", $data);
        if ($r) {
            foreach ($r as $v) {
                $sdata['myid'] = $v->id;
                $sdata['mytype'] = $v->type;
                $this->session->set_userdata($sdata);
                redirect(base_url(), "refresh");
            }
        } else {
            echo "Invalid email or password";
        }
    }

    public function user_login() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('admin_page');
            } else {
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('admin_page');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_form', $data);
            }
        }
    }

    public function verify() {
        $st = $this->uri->segment(3);
        $r = $this->am->ViewDataWhere("customer", "*", array("status" => $st));

        if ($r) {
            foreach ($r as $dt) {
                $this->am->UpdateData("customer", array("status" => ""), array("status" => $st));
                $sdata = array(
                    "myid" => $dt->id,
                    "mytype" => $dt->type
                );
                $this->session->set_userdata($sdata);
                redirect(base_url(), "refresh");
            }
        } else {
            echo "Invalid Code";
        }
    }

}
