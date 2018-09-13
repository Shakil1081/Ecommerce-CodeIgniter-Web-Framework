<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function index() {
        redirect(base_url(), "refresh");
    }

    public function update() {   
        $pid = $this->session->userdata("pdtid");
        $qid = $this->session->userdata("qtyid");
        $prid = $this->session->userdata("priceid");
        $pic = $this->session->userdata("picid");
        $tit = $this->session->userdata("titid");
        if ($pid) {
            for ($i = 0; $i < count($pid); $i++) {
                if ($pid[$i] != $this->input->post("id")) { 
                    $data["pdtid"][] = $pid[$i];
                    $data["qtyid"][] = $qid[$i];
                    $data["priceid"][] = $prid[$i];
                    $data["picid"][] = $pic[$i];
                    $data["titid"][] = $tit[$i];
                }
                else{
                    $data["pdtid"][] = $pid[$i];
                    $data["qtyid"][] = $this->input->post("qty");
                    $data["priceid"][] = $prid[$i];
                    $data["picid"][] = $pic[$i];
                    $data["titid"][] = $tit[$i];
                }
            }
            $this->session->set_userdata($data);
            echo 1;
        }
    }
    
    public function remove() {   
        $pid = $this->session->userdata("pdtid");
        $qid = $this->session->userdata("qtyid");
        $prid = $this->session->userdata("priceid");
        $pic = $this->session->userdata("picid");
        $tit = $this->session->userdata("titid");
        if ($pid) {
            for ($i = 0; $i < count($pid); $i++) {
                if ($pid[$i] != $this->input->post("id")) { 
                    $data["pdtid"][] = $pid[$i];
                    $data["qtyid"][] = $qid[$i];
                    $data["priceid"][] = $prid[$i];
                    $data["picid"][] = $pic[$i];
                    $data["titid"][] = $tit[$i];
                }
                else{
                    $price = $qid[$i] * $prid[$i]; 
                }
            }
            $this->session->set_userdata($data);
            echo $price;
        }
    }

    public function add_new() {
        header("Content-Type: application/json; charset=UTF-8");
        $id = $this->input->post("id");
        $qty = $this->input->post("qty");

        $pdt = $this->am->ViewProduct(array("p.id" => $id));
        foreach ($pdt as $p) {
            if (($p->stock + $p->tStock) >= ($p->tSale + $qty)) {
                $pid = $this->session->userdata("pdtid");
                $qid = $this->session->userdata("qtyid");
                $prid = $this->session->userdata("priceid");
                $pic = $this->session->userdata("picid");
                $tit = $this->session->userdata("titid");
                $c = 0;

                if ($pid) {
                    for ($i = 0; $i < count($pid); $i++) {
                        if ($pid[$i] == $id) {
                            $c++;
                            break;
                        }
                        $data["pdtid"][] = $pid[$i];
                        $data["qtyid"][] = $qid[$i];
                        $data["priceid"][] = $prid[$i];
                        $data["picid"][] = $pic[$i];
                        $data["titid"][] = $tit[$i];
                    }
                }
                if ($c == 0) {
                    $data["pdtid"][] = $id;
                    $data['qtyid'][] = $qty;
                    $data['priceid'][] = $p->price - $p->discount + $p->vat;
                    $data["picid"][] = $p->picture;
                    $data["titid"][] = $p->title;
                    $this->session->set_userdata($data);

                    $jdata["msg"] = 1;
                    $jdata["title"] = $p->title;
                    $jdata["price"] = $p->price - $p->discount + $p->vat;
                    $jdata["picture"] = $p->picture;
                } else {
                    $jdata["msg"] = "Product already exist";
                }
            } else {
                $jdata["msg"] = "Product Out of stock";
                ;
            }
            echo json_encode($jdata);
        }
    }

    public function test() {
        header("Content-Type: application/json; charset=UTF-8");
        $data["p"] = $this->input->post("pdtid");
        $data["q"] = $this->input->post("qty");
        echo json_encode($data);
    }

}
