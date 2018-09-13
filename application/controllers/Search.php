<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {   
    public function index() {       
        $data = array();
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        
        $data["content"] = $this->load->view("front-end/Search", $data, TRUE);
        $this->load->view("front-end/master", $data);
    }
    
    public function result(){
        $r = $this->am->SearchResult($this->input->post("title"), $this->input->post("price1"), $this->input->post("price2"), $this->input->post("cat"), $this->input->post("scat"));
        print_r($r);
    }

}
