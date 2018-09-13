<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index() {
        $this->session->unset_userdata("id");
        $this->session->unset_userdata("type");
        redirect(base_url(), "refresh");
    }

}
