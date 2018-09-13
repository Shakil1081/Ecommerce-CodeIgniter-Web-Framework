<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

    public function index() {
        $data = array();
        /*
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        $data['allPdt'] = $this->am->ViewData("product", "*");
         * 
         */
        $data['allItem'] = $this->am->homePage();
        //print_r($data['allItem'][0]);
        
        $data["extra"] = $this->load->view("front-end/slider", $data, TRUE);
        $data["otheritems"] = $this->load->view("front-end/otheritems", $data, TRUE);
        $data["subPage"] = $this->load->view("front-end/home", $data, TRUE);
        $data["content"] = $this->load->view("front-end/content", $data, TRUE);
        $this->load->view("front-end/master", $data);
    }

    public function shop() {
        $data = array();
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        $data['allPdt'] = $this->am->ViewData("product", "*");
        $data['shopicon'] = $this->load->view("front-end/shop", $data, TRUE);
        $data["subPage"] = $this->load->view("front-end/home", $data, TRUE);
        $data["content"] = $this->load->view("front-end/content", $data, TRUE);
        $this->load->view("front-end/master", $data);
    }

    public function details() {
        $id = $this->uri->segment(3);
        $data['captcha'] = $this->am->MyCaptche();
        $r = $this->am->ViewProduct(array("p.id" => $id));
        if ($r) {
            $data['selPdt'] = $r;
            $data['allCat'] = $this->am->ViewData("category", "*");
            $data['allSCat'] = $this->am->ViewData("subcategory", "*");
            $data["subPage"] = $this->load->view("front-end/details", $data, TRUE);
            $data["content"] = $this->load->view("front-end/content", $data, TRUE);
            $this->load->view("front-end/master", $data);
        } else {
            redirect(base_url(), "refresh");
        }
    }

    public function cart() {
        $data = array();
        $data['cart'] = $this->load->view("front-end/cart", $data, TRUE);
        $this->load->view("front-end/master", $data);
    }

    public function checkout() {
        $data = array();
        $data['cart'] = $this->load->view("front-end/checkout", $data, TRUE);
        $this->load->view("front-end/master", $data);
    }

    public function captcha_generator() {
        header('Content-type: application/json');
        $data = $this->am->MyCaptche();
        echo json_encode($data);
    }

}
