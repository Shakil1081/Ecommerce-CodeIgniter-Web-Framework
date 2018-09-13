<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class add_shipping extends CI_Controller {
    public function index() {
        $data = array(); 
        $data['title']=" Add shipping area"; 
        $data['allcity'] = $this->am->ViewData("city", "*");        
        $data["content"] = $this->load->view("admin/product_shipping", $data, TRUE);
        $this->load->view("master", $data);
    }
 public function insert() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('amount', 'amount', 'trim|required|integer');
        //$this->form_validation->set_rules('price', 'Price', 'trim|required|integer');
       // $this->form_validation->set_rules('price', 'Price', 'trim|required|integer');
        
        

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allcity'] = $this->am->ViewData("city", "*");
            $data["content"] = $this->load->view("admin/product_shipping", $data, TRUE);
            $this->load->view("master", $data);
        } else {            
            $data = array(
            "area" => $this->input->post("city"),
            "amount" => $this->input->post("amount")
            );
           
            print_r($data);    
        if ($this->am->InsertData("shipping", $data)) {
            $sdata['success'] = 'Action complete';
            } else { 
             $sdata['error'] = "Already price set";
             
            }  
             $this->session->set_userdata($sdata);
            redirect(base_url() . "add_shipping", "refresh");
            
        }
    }
    
      public function view() {
        $data = array();
        //$data['allcity']= $this->am->ViewData("city", "*");
        //$data['allshipping'] = $this->am->ViewData("shipping", "*");
        $data['shippingdata'] = $this->am->shipping_view("");
        print_r($data);
       $data["content"] = $this->load->view("admin/shipping_view", $data, TRUE);       
       $this->load->view("master", $data);
    }

    
   public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['allCat'] = $this->am->ViewData("city", "*");
        print_r($data);        
        $data['selPdt'] = $this->am->ViewDataWhere("shipping", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/shipping_edit", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('area', 'Area', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/shipping_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "area" => $this->input->post("area"),
                "amount" => $this->input->post("amount")
            );
            $id = $data['id'];
            print_r($data);
            if ($this->am->UpdateData("shipping", $data, array("id" => $id))) {
                $sdata['success'] = 'Update Successfull....!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "add_shipping/view", "refresh");
        }
    }
    
     public function delete() {
        $id = $this->uri->segment(3);
        $data = $this->am->ViewDataWhere("shipping", "*", array("id" => $id));
        if ($this->am->DeleteData("shipping", array("id" => $id))) {
            redirect(base_url() . "add_shipping/view", "refresh");
            $sdata['error'] = "Delete Successfull...!";
        } else {
            $sdata['error'] = "Server Too Busy ....!";
        }
    }

}