<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $mytype = $this->session->userdata("mytype");
        if ($mytype != 'a' && $mytype != 'o') {
            redirect(base_url(), "refresh");
        }
    }

    public function index() {
        $this->load->helper("form");
        $data = array();
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        $data['allunit'] = $this->am->ViewData("unit", "*");
        $data["content"] = $this->load->view("admin/product_new", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function insert() {
        if ($_FILES['pic']['name'] != "") {
            $ext = pathinfo($_FILES['pic']['name']);
            $ext = strtolower($ext['extension']);

            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = "";
            }
        } else {
            $ext = "";
            echo "Uploadd image";
        }
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('descr', 'descr', 'trim|required');
        $this->form_validation->set_rules('price', 'price', 'trim|required|integer');
        $this->form_validation->set_rules('size', 'size', 'trim|required');
        $this->form_validation->set_rules('vat', 'vat', 'trim|required|integer');
        $this->form_validation->set_rules('unit', 'unit', 'trim|required');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required|integer');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("category", "*");
            $data['allSCat'] = $this->am->ViewData("subcategory", "*");
            $data['allunit'] = $this->am->ViewData("unit", "*");
            $data["content"] = $this->load->view("admin/product_new", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "title" => $this->input->post("title"),
                "price" => $this->input->post("price"),
                "size" => $this->input->post("size"),
                "subcategoryid" => $this->input->post("scat"),
                "vat" => $this->input->post("vat"),
                "discount" => $this->input->post("dis"),
                "stock" => $this->input->post("stock"),
                "unitid" => $this->input->post("unit"),
                "picture" => $ext
            );

            if ($this->am->InsertData("product", $data)) {
                $id = $this->am->Id;
                write_file("./files/product_{$id}.txt", $this->input->post("descr"));
                if ($ext != "") {
                    $config['upload_path'] = './images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '1024';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';
                    $config['file_name'] = "product_{$id}.{$ext}";
                    $this->load->library('upload', $config);
                    $this->upload->do_upload("pic");
                    $this->am->ImageCrop("images/product_{$id}.{$ext}", "images/original/product_{$id}.{$ext}", 5, 3);
                    $this->am->ImageResize("images/original/product_{$id}.{$ext}", "images/300X180/product_{$id}.{$ext}", 300, 180);
                    $this->am->ImageResize("images/original/product_{$id}.{$ext}", "images/100X60/product_{$id}.{$ext}", 100, 60);
                    $this->am->ImageResize("images/original/product_{$id}.{$ext}", "images/60X36/product_{$id}.{$ext}", 60, 36);
                    unlink("images/product_{$id}.{$ext}");
                }

                $sdata['success'] = 'Action complete';
            } else {
                $sdata['error'] = "Server too busy...";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "product_management", "refresh");
        }
    }

    public function view() {
        $data = array();
        $data['allPdt'] = $this->am->ViewProduct("");
        $data["content"] = $this->load->view("admin/product_view", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function edit() {
        $this->load->helper("form");
        $data = array();
        $id = $this->uri->segment(3);
        $data['allCat'] = $this->am->ViewData("category", "*");
        $data['allSCat'] = $this->am->ViewData("subcategory", "*");
        $data['allunit'] = $this->am->ViewData("unit", "*");
        $data['selPdt'] = $this->am->ViewDataWhere("product", "*", array("id" => $id));
        $data['allunit'] = $this->am->ViewData("unit", "*");
        $data["content"] = $this->load->view("admin/product_edit", $data, TRUE);
        $this->load->view("master", $data);
    }

    public function update() {
        if ($_FILES['pic']['name'] != "") {
            $ext = pathinfo($_FILES['pic']['name']);
            $ext = strtolower($ext['extension']);

            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = "";
            }
        } else {
            $ext = "";
            echo "Uploadd image";
        }

        echo $ext;
        $this->load->helper(array('form', "url"));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('descr', 'descr', 'trim|required');
        $this->form_validation->set_rules('price', 'price', 'trim|required');
        $this->form_validation->set_rules('size', 'size', 'trim|required');
        $this->form_validation->set_rules('vat', 'vat', 'trim|required');
        $this->form_validation->set_rules('unitid', 'unitid', 'trim|required');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['allCat'] = $this->am->ViewData("category", "*");
            $data['allSCat'] = $this->am->ViewData("subcategory", "*");
            $data['allunit'] = $this->am->ViewData("unit", "*");
            $data["content"] = $this->load->view("admin/product_edit", $data, TRUE);
            $this->load->view("master", $data);
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "title" => $this->input->post("title"),
                "price" => $this->input->post("price"),
                "size" => $this->input->post("size"),
                "subcategoryid" => $this->input->post("scat"),
                "vat" => $this->input->post("vat"),
                "discount" => $this->input->post("dis"),
                "stock" => $this->input->post("stock"),
                "unitid" => $this->input->post("unitid"),
                "picture" => $ext
            );
            $id = $data[id];
            echo $id . "this sis is";

            $adata = $this->am->ViewDataWhere("product", "*", array("id" => $id));
            foreach ($adata as $d) {

                if (file_exists("images/original/product_{$d->id}.{$d->picture}")) {
                    unlink("images/original/product_{$d->id}.{$d->picture}");
                }
                if (file_exists("images/300X180/product_{$d->id}.{$d->picture}")) {
                    unlink("images/300X180/product_{$d->id}.{$d->picture}");
                }
                if (file_exists("images/100X60/product_{$d->id}.{$d->picture}")) {
                    unlink("images/100X60/product_{$d->id}.{$d->picture}");
                }
                if (file_exists("images/60X36/product_{$d->id}.{$d->picture}")) {
                    unlink("images/60X36/product_{$d->id}.{$d->picture}");
                }
                if (file_exists("files/product_{$id}.txt")) {
                    unlink("files/product_{$id}.txt");
                }
            }

            write_file("./files/product_{$id}.txt", $this->input->post("descr"));
            if ($ext != "") {
                $config['upload_path'] = './images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1024';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                $config['file_name'] = "product_{$id}.{$ext}";
                $this->load->library('upload', $config);
                $this->upload->do_upload("pic");
                $this->am->ImageCrop("images/product_{$id}.{$ext}", "images/original/product_{$id}.{$ext}", 5, 3);
                $this->am->ImageResize("images/original/product_{$id}.{$ext}", "images/300X180/product_{$id}.{$ext}", 300, 180);
                $this->am->ImageResize("images/original/product_{$id}.{$ext}", "images/100X60/product_{$id}.{$ext}", 100, 60);
                $this->am->ImageResize("images/original/product_{$id}.{$ext}", "images/60X36/product_{$id}.{$ext}", 60, 36);
                unlink("images/product_{$id}.{$ext}");
            }
        }
        echo $id;
        print_r($data);


        $this->db->where('id', $data['id']);
        if ($this->db->update('product', $data)) {
            $sdata['success'] = 'Update  complete';
        } else {
            $sdata['error'] = "Sorry! Server too busy...";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "product_management/view", "refresh");
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $data = $this->am->ViewDataWhere("product", "*", array("id" => $id));
        foreach ($data as $d) {
            if (file_exists("images/original/product_{$d->id}.{$d->picture}")) {
                unlink("images/original/product_{$d->id}.{$d->picture}");
            }
            if (file_exists("images/300X180/product_{$d->id}.{$d->picture}")) {
                unlink("images/300X180/product_{$d->id}.{$d->picture}");
            }
        }
        if (file_exists("files/product_{$id}.txt")) {
            unlink("files/product_{$id}.txt");
        }

        if ($this->am->DeleteData("product", array("id" => $id))) {
            $sdata['success'] = 'Delete complete';
        } else {
            $sdata['error'] = "Sorry! Server too busy...";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "product_management/view", "refresh");
    }

}
