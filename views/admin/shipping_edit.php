   <h2> Shipping Edit </h2>
   <div class="col-lg-4">  
        <div class="form">
    <?php
    $suc = $this->session->userdata("success");
    if ($suc != NULL) {
        echo "<p style='color:green;'>{$suc}</p>";
        $this->session->unset_userdata("success");
    }
    $err = $this->session->userdata("error");
    if ($err != NULL) {
        echo "<p style='color:red;'>{$err}</p>";
        $this->session->unset_userdata("error");
    }            
    
    echo validation_errors();
    $this->load->helper("form");
    foreach ($selPdt as $pdt) {
        $data = array("name" => "myform", "enctype" => "multipart/form-data");
        echo form_open("add_shipping/update", $data);

        $data = array(
            "name" => "id",
            "id" => "id",
            "class" => "form-control",
            "value" => $pdt->id,
            "type" => "hidden"
        );
        echo form_input($data);
              
        $data = array();
            //$data[0] = "Select Unit";
             foreach ($allCat as $u) {
                $data[$u->id] = $u->name;
            }
    echo form_dropdown("area", $data, $pdt->id, "class='form-control'");
      
        echo form_label("Shipping Amount<br />");
        $data = array(
            "name" => "amount",
            "id" => "id",
            "class" => "form-control",
            "value" => $pdt->amount
        );
        echo form_input($data);

        $data = array(
            "name" => "reset",
            "id" => "id",
            "class" => "submit",
            "type" => "reset",
            "value" => "Reset"
        );
        echo form_reset($data);


        echo form_label("");
        $data = array(
            "name" => "sub",
            "id" => "id",
            "class" => "submit",
            "value" => "Update"
        );
        echo form_submit($data);
    }
    ?>

</div>
        </div>