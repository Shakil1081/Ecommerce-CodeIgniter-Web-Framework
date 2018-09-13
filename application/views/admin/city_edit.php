<h2> City Edit </h2>
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
        echo form_open("add_city/update", $data);

        $data = array(
            "name" => "id",
            "id" => "id",
            "class" => "form-control",
            "value" => $pdt->id,
            "type" => "hidden"
        );
        echo form_input($data);

        $data = array(
            "name" => "name",
            "id" => "id",
            "class" => "form-control",
            "value" => $pdt->name
        );
        echo form_input($data);


        $data = array();
        $data[0] = "Select Country";
        foreach ($allCat as $u) {
            $data[$u->id] = $u->name;
        }
        echo form_dropdown("cat", $data, $pdt->countryid);

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



    <script type="text/javascript">
        function CatScat(data) {
            data.scat.options.length = 0;
            var cid = data.cat.options[data.cat.selectedIndex].value;
            if (cid == 0) {
                data.scat.options[0] = new Option("Choose Category first", 0);
            }
<?php
foreach ($allCat as $cat) {
    echo "else if(cid == {$cat->id}){";
    foreach ($allSCat as $scat) {
        if ($scat->categoryid == $cat->id) {
            echo "data.scat.options[data.scat.options.length] = new Option(\"{$scat->name}\", {$scat->id});";
        }
    }
    echo "}";
}
?>
        }
    </script>

</div>