<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class add_subcategary extends CI_Controller {

    public function index() {
        $data = array(); 
        $data['title']=" Add Subcategary"; 
        $data['allCat'] = $this->am->ViewData("category", "*");        
        $data["content"] = $this->load->view("admin/product_subcategory", $data, TRUE);
        $this->load->view("master", $data);
        //print_r ($data);
    }
 public function insert() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('cat', 'cat', 'trim|required');
        //$this->form_validation->set_rules('price', 'Price', 'trim|required|integer');
       // $this->form_validation->set_rules('price', 'Price', 'trim|required|integer');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("category", "*");
            $data["content"] = $this->load->view("admin/product_subcategory", $data, TRUE);
            $this->load->view("master", $data);
        } else {            
            $data = array(
                "name" => $this->input->post("name"),
                "categoryid" => $this->input->post("cat")
            );
           
   if ($this->am->InsertData("subcategory", $data)) {
            $sdata['success'] = 'Action complete';
            } else { $sdata['error'] = "Server too busy...";}  
             $this->session->set_userdata($sdata);
            redirect(base_url() . "add_subcategary", "refresh");
            
        }
    }
       
    public function view() {
        $data = array();
        $data['allsubcategory'] = $this->am->ViewData("subcategory", "*");
        print_r($data);
        $data["content"] = $this->load->view("admin/subcategory_view", $data, TRUE);
        $this->load->view("master", $data);
    }
       public function delete() {
          $id = $this->uri->segment(3);
        if($this->am->DeleteData("subcategory", array("id"=>$id))){
           $sdata['success'] = 'Delete complete';
        }
        else{
           $sdata['error'] = "Sorry! Server is busy";
        }
        $this->session->set_userdata($sdata);
    redirect(base_url() . "add_subcategary/view", "refresh");
    }
    
    
    
    
    
       public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("subcategory", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/subcategory_edit", $data, TRUE);
        $this->load->view("master", $data);
    }
    
    
public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('categoryid', 'Categoryid', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("category", "*");
            $data["content"] = $this->load->view("admin/subcategory_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "name" => $this->input->post("name"),
                "categoryid" => $this->input->post("categoryid")
            );
            $id = $data['id'];
            if ($this->am->UpdateData("subcategory", $data, array("id" => $id))) {
                $sdata['success'] = 'Save Successfull...!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_subcategary/view", "refresh");
        }
    }
  
}
