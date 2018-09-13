<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class add_country extends CI_Controller {

    public function index() {
        $data = array();
        $data['title']=" Add Country";         
        $data["content"] = $this->load->view("admin/countery", $data, TRUE);
        $this->load->view("master", $data);
    }

       
    public function insert() {
        $this->load->helper(array('form', "url")); 
         $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/country", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "name" => $this->input->post("name")
            );

            //print_r($data);
            if ($this->am->InsertData("country", $data)) {
                $sdata['success'] = 'Action complete';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_country", "refresh");
        }
    }
    
       public function view() {
        $data = array();
        $data['allcountry'] = $this->am->ViewData("country", "*");
        print_r($data);
        $data["content"] = $this->load->view("admin/country_view", $data, TRUE);
        $this->load->view("master", $data);
    }
    public function delete() {
          $id = $this->uri->segment(3);
        if($this->am->DeleteData("country", array("id"=>$id))){
           $sdata['success'] = 'Delete complete';
        }
        else{
           $sdata['error'] = "You need to delete U 1st";
        }
        $this->session->set_userdata($sdata);
    redirect(base_url() . "add_country/view", "refresh");
    }
    
      public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        //$data['allCat'] = $this->am->ViewData("country", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("country", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/country_edit", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/country_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "name" => $this->input->post("name")
            );
            $id = $data['id'];
            if ($this->am->UpdateData("country", $data, array("id" => $id))) {
                $id = $this->am->Id;
                write_file("./files/country_{$id}.txt", $this->input->post("descr"));
                $sdata['success'] = 'Update Successfull...!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_country/view", "refresh");
        }
    }
}
