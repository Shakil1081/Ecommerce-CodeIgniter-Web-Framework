<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class add_catogary extends CI_Controller {

    public function index() {
        $data = array();
        $data['title'] = " Add catogary";
        $data["content"] = $this->load->view("admin/product_category", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function insert() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/product_category", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "name" => $this->input->post("name")
            );

            //print_r($data);
            if ($this->am->InsertData("category", $data)) {
                $sdata['success'] = 'Action complete';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_catogary", "refresh");
        }
    }

  public function view() {
        $data = array();
        $data['catagoryname'] = $this->am->ViewData("category", "*");
        print_r($data);
        $data["content"] = $this->load->view("admin/caragory_view", $data, TRUE);
        $this->load->view("master", $data);
    }
        public function delete() {
        $id = $this->uri->segment(3);
        if($this->am->DeleteData("category", array("id"=>$id))){
           $sdata['success'] = 'Delete complete';
        }
        else{
           $sdata['error'] = "You need to delete Subcatagpry 1st";
        }
        $this->session->set_userdata($sdata);
         redirect(base_url() . "add_catogary/view", "refresh");
    }
    
    
    
       public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("category", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/category_edit", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/category_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "name" => $this->input->post("name")
            );
            $id = $data['id'];
            if ($this->am->UpdateData("category", $data, array("id" => $id))) {
                //$id = $this->am->Id;
                $sdata['success'] = 'Save Successfull!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_catogary/view", "refresh");
        }
    }
    /*
     public function delete() {
        $id = $this->uri->segment(3);
        if($this->am->DeleteData("category", array("id" => $id))){
           $sdata['success'] = 'Delete complete';
        }
        else{
           $sdata['error'] = "Sorry! Server too busy...";
        }
       $this->session->set_userdata($sdata);
       redirect(base_url() . "add_catogary/view", "refresh");
    }
*/
    /*
      public function insert() {
      $data = array(
      "name" => $this->input->post("name")
      );
      print_r($data);
      if ($this->am->InsertData("category", $data)) {
      echo 'yahooooo';
      } else {
      echo"hoy nierrrrrrrrr";
      }
      } */
}
