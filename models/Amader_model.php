<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Amader_model extends CI_Model {   // am declare

    public $Id;

    public function InsertData($table, $data) {

        if ($this->db->insert($table, $data)) {
            $this->Id = $this->db->insert_id();
            return true;
        } else {
            return FALSE;
        }
    }

    public function UpdateData($table, $data, $where) {
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
            $this->Id = $this->db->insert_id();
            return true;
        } else {
            return FALSE;
        }
    }
    
    public function homePage(){
        return $this->GetMultipleQueryResult("CALL home()");
    }

    public function Update($table, $sel, $where) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select($sel);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function ViewData($table, $sel) {
        $this->db->select($sel);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function ViewDataWhere($table, $sel, $where) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select($sel);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function ViewProduct($where) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select("p.*, sc.name scname, c.name cname, u.name uname, (select sum(np.stock) from newproduct as np where np.productid=p.id) tStock, (select sum(sd.qty) from saledetails as sd where sd.productid=p.id) tSale");
        $this->db->from("product as p");
        $this->db->join("subcategory sc", "sc.id=p.subcategoryid");
        $this->db->join("category c", "sc.categoryid=c.id");
        $this->db->join("unit u", "p.unitid=u.id");
        $this->db->join("newproduct np", "np.productid=p.id", "left");
        $this->db->join("saledetails sd", "sd.productid=p.id", "left");
        $this->db->group_by("p.id");
        return $this->db->get()->result();
    }

    public function TwoTable($table1, $table2, $sel, $where, $rel) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select($sel);
        $this->db->from($table1);
        $this->db->join($table2, $rel);
        return $this->db->get()->result();
    }

    public function new_product($where) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select("np.id, p.title, sc.name scname, c.name cname");
        $this->db->from("product p");
        $this->db->join("subcategory sc", "sc.id=p.subcategoryid");
        $this->db->join("category c", "c.id=sc.categoryid");
        $this->db->join("newproduct np", "np.productid=p.id");
        return $this->db->get()->result();
    }

    public function stock_view($where) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select("np.id, p.title, np.stock, np.date");
        $this->db->from("product p");
        $this->db->join("newproduct np", "np.productid=p.id");
        return $this->db->get()->result();
    }

    public function shipping_view($where) {
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->select("np.id, p.name, np.amount");
        $this->db->from("city p");
        $this->db->join("shipping np", "np.area=p.id");
        return $this->db->get()->result();
    }

    public function SearchResult($title, $minP, $maxP, $catid, $scatid) {
        if ($title != "") {
            $this->db->like("p.title", $title);
        }

        if ($maxP > 0 && $minP > 0) {
            $this->db->where("p.price <=", $maxP);
            $this->db->where("p.price >=", $minP);
        } else if ($maxP > 0) {
            $this->db->where("p.price", $maxP);
        } else if ($minP > 0) {
            $this->db->where("p.price", $minP);
        }

        if ($scatid > 0) {
            $this->db->where("sc.id", $scatid);
        } else if ($catid > 0) {
            $this->db->where("c.id", $catid);
        }

        $this->db->select("p.*, sc.name scname, c.name cname, u.name uname, (select sum(np.stock) from newproduct as np where np.productid=p.id) tStock, (select sum(sd.qty) from saledetails as sd where sd.productid=p.id) tSale");
        $this->db->from("product as p");
        $this->db->join("subcategory sc", "sc.id=p.subcategoryid");
        $this->db->join("category c", "sc.categoryid=c.id");
        $this->db->join("unit u", "p.unitid=u.id");
        $this->db->join("newproduct np", "np.productid=p.id", "left");
        $this->db->join("saledetails sd", "sd.productid=p.id", "left");
        $this->db->group_by("p.id");
        return $this->db->get()->result();
    }

    public function DeleteData($table, $where) {
        if ($where != "") {
            $this->db->where($where);
        }
        if ($this->db->delete($table)) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function ImageCrop($source, $dest, $rw, $rh) {
        $img = getimagesize($source);
        $width = $img[0];
        $height = $img[1];
        $ratio = $rw / $rh;
        if ($width / $height >= $ratio) {
            $new_width = $height * $ratio;
            $new_height = $height;
        } else {
            $new_width = $width;
            $new_height = $width * $rh / $rw;
        }

        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $new_width;
        $config['height'] = $new_height;
        $config['x_axis'] = ($width - $new_width) / 2;
        $config['y_axis'] = ($height - $new_height) / 2;
        $config['new_image'] = "./{$dest}";
        $this->image_lib->initialize($config);
        $this->image_lib->crop();
        $this->image_lib->clear();
    }

    public function ImageResize($source, $dest, $width, $height) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['new_image'] = "./{$dest}";
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
    
    public function MyCaptche() {
        $this->load->helper('captcha');
        $word = RandString(6);
        $captcha = array(
            'word' => $word,
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => './fonts/DJB Speak the Truth Boldly.ttf',
            'img_width' => '150',
            'img_height' => '34',
            'expiration' => '600',
            'time' => time()
        );
       
        $expire = $captcha['time'] - $captcha['expiration'];
        $this->db->where('time < ', $expire);
        $this->db->select("img_name");
        $r = $this->db->get("captcha")->result();
        foreach ($r as $v) {
            unlink("captcha/" . $v->img_name);
        }

        $this->db->where('time < ', $expire);
        $this->db->delete('captcha');         

        $img = create_captcha($captcha);
        $value = array(
            'time' => $captcha['time'],
            'word' => $captcha['word'],
            'img_name' => $img['time'] . ".jpg"
        );
        $this->db->insert('captcha', $value);
        $data['id'] = $this->db->insert_id();
        $data['cap_name'] = $img['time'] . ".jpg";
        return $data;        
    }
    
    public function GetMultipleQueryResult($queryString) {
        if (empty($queryString)) {
            return false;
        }
        $index = 0;
        $ResultSet = array();
        if (mysqli_multi_query($this->db->conn_id, $queryString)) {
            do {
                if (false != $result = mysqli_store_result($this->db->conn_id)) {
                    $rowID = 0;
                    while ($row = $result->fetch_assoc()) {
                        $ResultSet[$index][$rowID] = $row;
                        $rowID++;
                    }
                }
                $index++;
            } while (mysqli_next_result($this->db->conn_id));
        }
        return $ResultSet;
    }


}
