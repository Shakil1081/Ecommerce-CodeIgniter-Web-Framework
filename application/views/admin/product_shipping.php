<div class="col-lg-10"><span class=""></span> </div><div class="col-lg-2"><a href="<?php echo base_url()?>add_shipping/view" class="btn btn-default fa fa-plus-square" style="margin: 17px;"> view Shipping area list </a></div> <div class="row">

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
<p class="fa fa-plus-square"> Shipping</p>
  </div>
</div>
<div class="col-lg-4">    
<?php
$this->load->library('form_validation');
echo validation_errors();
$this->load->helper("form");
$data = array("name" => "myform","enctype"=>"multipart/formdata");
echo form_open("add_shipping/insert",$data);
?>
 <select class="form-control" name="city">
                    <option value="0">Choose City</option>
                    <?php
                        foreach ($allcity as $cat){
                            echo "<option value=\"{$cat->id}\">{$cat->name}</option>";    
                        }
                    ?>                    
</select>
    <?php
$data = array(
    "name" => "amount",
    "id" => "id",
    "class" => "form-control",
    "value" => set_value("amount"),
    "placeholder" => "amount"
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