<div class="col-lg-10"><span class=""></span> </div><div class="col-lg-2"><a href="<?php echo base_url()?>add_subcategary/view" class="btn btn-default fa fa-plus-square" style="margin: 17px;"> view UNit list </a></div> <div class="row">

 
    <div class="row">
<div class="col-lg-12">

<h1 class="page-header"> <?php
$suc = $this->session->userdata("success");
if ($suc != NULL) {
    echo "<p class='fa fa-check-circle animated bounce' style='color:green;'> {$suc}</p>";
    $this->session->unset_userdata("success");
}
$err = $this->session->userdata("error");
if ($err != NULL) {
    echo "<p class='fa fa-times-circle animated bounce' style='color:red;'> {$err}</p>";
    $this->session->unset_userdata("error");
}?>
</h1>
<p class="fa fa-plus-square"> Sub-category</p>
  </div>
</div>
<div class="col-lg-4">    
<?php
 echo validation_errors();
    $this->load->helper("form");
    foreach ($selPdt as $pdt) {
        $data = array("name" => "myform", "enctype" => "multipart/form-data");
        echo form_open("add_subcategary/update", $data);


        $data = array(
            "name" => "id",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->id,
            "type" => "hidden"
        );
        echo form_input($data);

        echo form_label("Sub-Category Title :");
        $data = array(
            "name" => "name",
            "id" => "id",
            "class" => "textInput",
            "value" => $pdt->name
        );
        echo form_input($data);

        echo form_label("<br/><br/>Product Category :");
        $data = array();
        $data[0] = "Select Category";
        foreach ($allCat as $cat) {
            $data[$cat->id] = $cat->name;
        }
        echo form_dropdown("categoryid", $data, $pdt->categoryid);


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

