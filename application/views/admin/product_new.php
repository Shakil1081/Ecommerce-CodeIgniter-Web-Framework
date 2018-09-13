<div class="row ">
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
                echo "<p class='glyphicon glyphicon-ok-circle animated bounce' style='color:red;'> {$err}</p>";
                $this->session->unset_userdata("error");
            }
            ?>
        </h1>        
    </div>
</div>
 <div class="col-lg-10"><span class="fa fa-plus-square"> Product</span> </div><div class="col-lg-2">
 <a href="<?php echo base_url()?>product_management/view" class="btn btn-default fa fa-eye" style="margin-bottom: 17px;">  View All product's</a></div>
<div class="col-lg-12">
    <div class="row">
        <?php
        echo validation_errors();
        $this->load->helper("form");
        $data = array("name" => "myform", "enctype" => "multipart/form-data");
        echo form_open("product_management/insert", $data);
        ?>
        <div class="col-lg-4">
            <?php
            $data = array(
                "name" => "title",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("title"),
                "placeholder" => "Product Title"
            );
            echo form_input($data);
            $data = array(
                "name" => "descr",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("form-control"),
                "placeholder" => "Product descr"
            );
            echo form_textarea($data);

            $data = array(
                "name" => "price",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("price"),
                "placeholder" => "Product price"
            );
            echo form_input($data);
            ?>
        </div>
        <div class="col-lg-4">

            <?php
            $data = array(
                "name" => "size",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("size"),
                "placeholder" => "Product size"
            );
            echo form_input($data);
            $data = array(
                "name" => "vat",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("vat"),
                "placeholder" => "Product vat"
            );
            echo form_input($data);

            $data = array(
                "name" => "dis",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("dis"),
                "placeholder" => "Product discpunt"
            );
            echo form_input($data);
            $data = array(
                "name" => "stock",
                "id" => "id",
                "class" => "form-control",
                "value" => set_value("stock"),
                "placeholder" => "Product stock"
            );
            echo form_input($data);
            ?>

        </div>
        <div class="col-lg-4">

            <div class="form-group">

                <select class="form-control" name="cat" onchange="CatScat(document.myform)">
                    <option value="0">Choose Category</option>
                    <?php
                    foreach ($allCat as $cat) {
                        echo "<option value=\"{$cat->id}\">{$cat->name}</option>";
                    }
                    ?>                    
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="scat"></select>
            </div>
            <div class="form-group"><?php
                $data = array();
                $data[0] = "Select Unit";
                foreach ($allunit as $u) {
                    $data[$u->id] = $u->name;
                }
                echo form_dropdown("unit", $data, 0, "class='form-control'");
                $data = array(
                    "name" => "pic",
                    "id" => "id"
                );
                echo form_upload($data);
                ?>
            </div>


            <?php
            $data = array(
                "name" => "sub",
                "id" => "id",
                "class" => "btn btn-success",
                "value" => " Add New product "
            );
            echo form_submit($data);
            $data = array(
                'name' => 'button',
                'id' => 'button',
                'class' => 'btn btn-danger',
                'value' => 'true',
                'type' => 'reset',
                'content' => 'Reset current value'
            );
            echo form_button($data);
            ?>    
        </div>
    </div>
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

    <br>
</div>




