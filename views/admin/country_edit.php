<h2> Country Edit </h2>

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
        echo form_open("add_country/update", $data);

        $data = array(
            "name" => "id",
            "id" => "id",
            "class" => "form-control",
            "value" => $pdt->id,
            "type" => "hidden"
        );
        echo form_input($data);

        echo form_label("Country Name<br />");
        $data = array(
            "name" => "name",
            "id" => "id",
            "class" => "form-control",
            "value" => $pdt->name
        );
        echo form_input($data);


        echo form_label("<br /><br/>");
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