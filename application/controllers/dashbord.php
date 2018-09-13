<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class dashbord extends CI_Controller {

    public function index() {
       $data = array();
       $data['title']="welcome to your shop management ";
       $data["content"] = $this->load->view("dashbodrq", "", TRUE);
       $this->load->view("master", $data);
    }

}

