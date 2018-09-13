<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class add_city extends CI_Controller {

    public function index() {
        $data = array(); 
        $data['title']=" Add City"; 
        $data['allcountry'] = $this->am->ViewData("country", "*");        
        $data["content"] = $this->load->view("admin/product_city", $data, TRUE);
        $this->load->view("master", $data);
    }
 public function insert() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('cintry', 'cintry', 'trim|required');
        //$this->form_validation->set_rules('price', 'Price', 'trim|required|integer');
       // $this->form_validation->set_rules('price', 'Price', 'trim|required|integer');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("country", "*");
            $data["content"] = $this->load->view("admin/product_city", $data, TRUE);
            $this->load->view("master", $data);
        } else {            
            $data = array(
                "name" => $this->input->post("name"),
                "countryid" => $this->input->post("cintry")
            );
           
   if ($this->am->InsertData("city", $data)) {
            $sdata['success'] = 'Action complete';
            } else { $sdata['error'] = "Server too busy...";}  
             $this->session->set_userdata($sdata);
            redirect(base_url() . "add_city", "refresh");
            
        }
    }
        public function view() {
        $data = array();
        $data['allcity'] = $this->am->ViewData("city", "*");
        print_r($data);
        $data["content"] = $this->load->view("admin/city_view", $data, TRUE);
        $this->load->view("master", $data);
    }
       public function delete() {
          $id = $this->uri->segment(3);
        if($this->am->DeleteData("city", array("id"=>$id))){
           $sdata['success'] = 'Delete complete';
        }
        else{
           $sdata['error'] = "Sorry! Server is busy";
        }
        $this->session->set_userdata($sdata);
    redirect(base_url() . "add_city/view", "refresh");
    }
    
    
        public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['allCat'] = $this->am->ViewData("country", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("city", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/city_edit", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("country", "*");
            $data["content"] = $this->load->view("admin/city_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "name" => $this->input->post("name"),
                "countryid" => $this->input->post("cat")
            );
            $id = $data['id'];
            if ($this->am->UpdateData("city", $data, array("id" => $id))) {
                //$id = $this->am->Id;
                write_file("./files/city_{$id}.txt", $this->input->post("descr"));
                $sdata['success'] = 'Update Successfull..!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_city/view", "refresh");
        }
    }
    
   /* public function insert() {
        $data = array(
            "name" => $this->input->post("name"),
            "countryid" => $this->input->post("cintry")
        );        
        print_r($data);
        if ($this->am->InsertData("city", $data)) {
            echo 'yahooooo';
        } else {
            echo"hoy nierrrrrrrrr";
        }
    }*/
}
