<div class="col-lg-10"><span class=""></span> </div><div class="col-lg-2"><a href="<?php echo base_url() ?>stock/view" class="btn btn-default fa fa-plus-square" style="margin: 17px;"> view stock </a></div> <div class="row">
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
            }
            ?>
        </h1>
        <p class="fa fa-plus-square"> Stock</p>
    </div>
</div>
<div class="col-lg-4">    
    <?php
    $this->load->library('form_validation');
    echo validation_errors();
    $data = array("enctype" => "multipart/form-data", "name" => "myform");
    echo form_open(base_url() . "stock/insert", $data);
    $options = array('' => 'Choose Category');
    foreach ($allCat as $cat) {
        $options[$cat->id] = $cat->name;
    }
    echo form_dropdown("cat", $options, "", "required onchange=CatScat(document.myform)");

    $options = array('' => 'Choose Category First');
    echo form_dropdown("scat", $options, "", "required onchange=ScatPdt(document.myform)");


    $options = array('' => 'Choose Sub Category First');
    echo form_dropdown("pdt", $options, "", "required");

    $data = array(
        "name" => "stock",
        "id" => "id",
        "class" => "form-control",
        "value" => set_value("stock"),
        "placeholder" => "add stock"
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
<div class="col-lg-8">  </div>

<script type="text/javascript">
    function CatScat(data) {
        data.scat.options.length = 0;
        var cat = data.cat.options[data.cat.selectedIndex].value;
        if (cat == "" || cat == "0") {
            data.scat.options[data.scat.length] = new Option("Select Category First", "");
        }
<?php
foreach ($allCat as $cat) {
    echo "else if(cat == {$cat->id}){";
    foreach ($allSCat as $scat) {
        if ($scat->categoryid == $cat->id) {
            echo "data.scat.options[data.scat.length] = new Option(\"{$scat->name}\", {$scat->id});";
        }
    }
    echo "}";
}
?>
    }


    function ScatPdt(data) {
        data.pdt.options.length = 0;
        var scat = data.scat.options[data.scat.selectedIndex].value;
        if (scat == "" || scat == "0") {
            data.pdt.options[data.pdt.length] = new Option("Select Category First", "");
        }
<?php
foreach ($allSCat as $scat) {
    echo "else if(scat == {$scat->id}){";
    foreach ($allPdt as $pdt) {
        if ($pdt->subcategoryid == $scat->id) {
            echo "data.pdt.options[data.pdt.length] = new Option(\"{$pdt->title}\", {$pdt->id});";
        }
    }
    echo "}";
}
?>
    }
</script>