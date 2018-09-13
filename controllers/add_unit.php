<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class add_unit extends CI_Controller {

    public function index() {
        $data = array(); 
        $data['title']=" Add Unit"; 
        $data["content"] = $this->load->view("admin/product_unit", $data, TRUE);
        $this->load->view("master", $data);
    }
 public function insert() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/product_unit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "name" => $this->input->post("name")
            );

            //print_r($data);
            if ($this->am->InsertData("unit", $data)) {
                $sdata['success'] = 'Action complete';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_unit", "refresh");
        }
    }
    
   public function view() {
        $data = array();
        $data['allunit'] = $this->am->ViewData("unit", "*");
        print_r($data);
        $data["content"] = $this->load->view("admin/unit_view", $data, TRUE);
        $this->load->view("master", $data);
    }
       public function delete() {
          $id = $this->uri->segment(3);
        if($this->am->DeleteData("unit", array("id"=>$id))){
           $sdata['success'] = 'Delete complete';
        }
        else{
           $sdata['error'] = "Sorry! Server is busy";
        }
        $this->session->set_userdata($sdata);
    redirect(base_url() . "add_unit/view", "refresh");
    }
    
    
   /* public function insert() {
        $data = array(
            "name" => $this->input->post("name"),
        );        
        print_r($data);
        if ($this->am->InsertData("unit", $data)) {
            echo 'yahooooo';
        } else {
            echo"hoy nierrrrrrrrr";
        }
    }*/
    
    
    
        public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['allUnit'] = $this->am->ViewData("unit", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("unit", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/unit_edit", $data, TRUE);
        $this->load->view("master", $data);
    }


    public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/unit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "name" => $this->input->post("name")
            );
            
            $id = $data['id'];
            
            if ($this->am->UpdateData("unit", $data, array("id" => $id))) {
                //$id = $this->am->Id;
                write_file("./files/unit_{$id}.txt", $this->input->post("descr"));
                $sdata['success'] = 'Save Successfull...!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_unit/view", "refresh");
        }
    }
    
    
   
}
