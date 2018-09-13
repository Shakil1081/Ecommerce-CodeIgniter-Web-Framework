<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class stock extends CI_Controller {

   public function index() {
        $this->load->helper("form");
        $data = array();
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        $data['allPdt'] = $this->am->ViewData("product", "*");
        $data["content"] = $this->load->view("admin/add_stock", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function insert() {
        $this->load->helper(array('form', "url"));
        echo validation_errors();
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data["content"] = $this->load->view("admin/add_stock", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(                
                "productid" => $this->input->post("pdt"),
                "stock" => $this->input->post("stock"),
               "date" => date("l jS \of F Y h:i:s A")
            );
            print_r($data);
            if ($this->am->InsertData("newproduct", $data)) {
                $sdata['success'] = 'yahooooo';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "stock", "refresh");
        }
    }

  public function view() {
        $data = array();
        $data['allcat'] = $this->am->ViewData("product", "*");
        $data['allScat'] = $this->am->ViewData("newproduct", "*");
        //$data['allpdt'] = $this->am->new_product("");
        $data['stoclview'] = $this->am->stock_view(""); 
       // echo '<pre>';
        // print_r($data['a']);

        $data["content"] = $this->load->view("admin/stock_view", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        if ($this->am->DeleteData("newproduct", array("id" => $id))) {
            $sdata['success'] = 'Delete complete';
        } else {
            $sdata['error'] = "Sorry! Server is busy";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "stock/view", "refresh");
    }
    
   public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['stoclview'] = $this->am->stock_view(""); 
        print_r($data);
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        $data['allPdt'] = $this->am->ViewData("product", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("newproduct", "*", array("id" => $id));
        $data["content"] = $this->load->view("admin/stock_edit", $data, TRUE);
        $this->load->view("master", $data);
    }
    
     public function update() {
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('stock', 'stock', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("country", "*");
            $data["content"] = $this->load->view("admin/city_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "productid" => $this->input->post("pdt"),
                "stock" => $this->input->post("stock")
            );
            $id = $data['id'];
            if ($this->am->UpdateData("newproduct", $data, array("id" => $id))) {
             $sdata['success'] = 'Update Successfull..!';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "stock/view", "refresh");
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
      } */
}
