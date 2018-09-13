<div class="col-lg-10"><span class=""></span> </div><div class="col-lg-2"><a href="<?php echo base_url()?>add_catogary/view" class="btn btn-default fa fa-plus-square" style="margin: 17px;"> view Category list </a></div> <div class="row">

 
    <div class="row">
    <div class="col-lg-12">
<h1 class="page-header">
    <?php
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

        <div class="col-lg-10"><p class="fa fa-plus-square"> product Category</p></div>
     <div class="col-lg-2"></div><a href="<?php echo base_url()?>add_catogary/view" class="btn btn-default fa fa-plus-square" style="margin: 17px;"> Category list</a></div>
  </div>
<div class="col-lg-6"> 
<?php
 $this->load->library('form_validation');
    echo validation_errors();
?>
<?php
$this->load->helper("form");
$data = array("name" => "myform","enctype"=>"multipart/formdata");
echo form_open("add_catogary/insert",$data);
$data = array(
    "name" => "name",
    "id" => "id",
    "class" => "form-control",
    "value" => set_value("name"),
    "placeholder" => "Catagory name"
);
echo form_input($data);

$data = array(
    "name" => "sub",
    "id" => "id",
    "class" => "btn btn-default",
    "value" => "Save"
);
echo form_submit($data);
$data = array(
    'name' => 'button',
    'id' => 'button',
    'value' => 'true',
    'type' => 'reset',
    'content' => 'Reset'
);
?>                
</div>

