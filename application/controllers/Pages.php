<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function contact() {
        $data = array();       
        $data["content"] = $this->load->view("front-end/contact-us", $data, TRUE);
        //$data["content"] = $this->load->view("front-end/content", $data, TRUE);
        $this->load->view("front-end/master", $data);
    } 
    
    
    public function blog() {
        $data = array();
        $data['allPdt'] = $this->am->ViewData("product", "*");
        $data["content"] = $this->load->view("front-end/blogs", $data, TRUE);
        //$data["content"] = $this->load->view("front-end/content", $data, TRUE);
        $this->load->view("front-end/master", $data);
    } 
       
}
