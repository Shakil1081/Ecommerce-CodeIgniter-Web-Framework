<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_up extends CI_Controller {

    public function index() {
        $this->load->helper("form");

        //$this->load->view('header');
        $data['allcountry'] = $this->am->ViewData("country", "*");
        $data['allcity'] = $this->am->ViewData("city", "*");
        $data["content"] = $this->load->view("front-end/login", $data, TRUE);
        $this->load->view("front-end/master", $data);
        // $this->load->view('footer');
    }

    public function create_account() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("city", "*");
            $this->load->view('header');
            $this->load->view('templates/login');
            $this->load->view('footer');
        } else {
            $data = array(
                "name" => $this->input->post("Name"),
                "contact" => $this->input->post("phone"),
                "email" => $this->input->post("Email"),
                "cityid" => $this->input->post("city"),
                "gender" => $this->input->post("gender"),
                "password" => $this->input->post("password"),
                "type" => 'c',
                "status" => RandString(10)
            );
        }
        if ($this->am->InsertData("customer", $data)) {
            $message = "For activate your account, <a href='" . base_url() . "login/verify/{$data['status']}" . "'>Click Here</a>";
            mail($data['email'], "Account Verification", $message);
            echo $message;
            $sdata['success'] = 'Action complete';
        } else {
            $sdata['error'] = "Sorry! dublicate Data";
        }
        $this->session->set_userdata($sdata);
        //redirect(base_url() . "Sign_up", "refresh");
    }

}
