<h2> Customer Edit </h2>
<h3><a href="<?php echo base_url(); ?>sign_up">Add New Customer</a></h3>
<h3><a href="<?php echo base_url(); ?>sign_up/view">View All Customer Entry</a></h3>
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
        echo form_open("sign_up/update", $data);

        $data = array(
            "name" => "id",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->id,
            "type" => "hidden"
        );
        echo form_input($data);

        echo form_label("Customer Name :");
        $data = array(
            "name" => "name",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->name
        );
        echo form_input($data);

        echo form_label("<br/><br/>Email :");
        $data = array(
            "name" => "email",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->email
        );
        echo form_input($data);

        echo form_label("<br/><br/>Password :");
        $data = array(
            "name" => "password",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->password
        );
        echo form_input($data);
        ?>

        <?php
        echo form_label("<br/><br/>City:");
        $data = array();
        $data[0] = "Select City";
        foreach ($allct as $u) {
            $data[$u->id] = $u->name;
        }
        echo form_dropdown("cityid", $data);

        echo form_label("<br/><br/>Contact :");
        $data = array(
            "name" => "contact",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->contact
        );
        echo form_input($data);
        ?>
        <br /><br />Gender:
        <input type="radio" name="gender" value="m" <?php echo set_radio('radio', '1', TRUE); ?> />Male
        <input type="radio" name="gender" value="f" <?php echo set_radio('radio', '2'); ?> />Female

        <br /><br />Type:
        <input type="radio" name="type" value="c" <?php echo set_radio('radio', '1', TRUE); ?> />Customer
        <input type="radio" name="type" value="a" <?php echo set_radio('radio', '2'); ?> />Admin

        <?php
        /* echo form_label("<br/><br/>Product Unit :");
          $data = array();
          $data[0] = "Select Unit";
          foreach ($allUnit as $u) {
          $data[$u->id] = $u->name;
          }
          echo form_dropdown("unitid", $data); */
        echo form_label("<br/><br/>Status :");
        $data = array(
            "name" => "status",
            "id" => "id",
            "class" => "textInput",
            "value" => set_value("status"),
            "placeholder" => "Status"
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