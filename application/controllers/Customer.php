<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('asia/dhaka');
        $type = $this->session->userdata("mytype");
        if ($type == NULL) {
            redirect(base_url(), "refresh");
        }
    }

    public function purchase() {
        $data = array(
            "datetime" => date("Y-m-d H:i:s"),
            "customerid" => $this->session->userdata("myid"),
            "shippingid" => 1
        );
        if ($this->am->InsertData("sale", $data)) {
            $id = $this->am->Id;
            $pid = $this->session->userdata("pdtid");
            $qid = $this->session->userdata("qtyid");
            for ($i = 0; $i < count($pid); $i++) {
                $r = $this->am->ViewDataWhere("product", "discount, vat", array("id" => $pid[$i]));
                foreach ($r as $v) {
                    $sdata['vat'] = $v->vat;
                    $sdata['discount'] = $v->discount;
                }
                $sdata['saleid'] = $id;
                $sdata['productid'] = $pid[$i];
                $sdata['qty'] = $qid[$i];
                $this->am->InsertData("saledetails", $sdata);
            }
            $this->session->unset_userdata("pdtid");
            $this->session->unset_userdata("qtyid");
            $this->session->unset_userdata("priceid");
            $this->session->unset_userdata("picid");
            $this->session->unset_userdata("titid");
            redirect(base_url(), "refresh");
        }
    }

}
