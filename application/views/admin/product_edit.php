<h2> Product Entry </h2>
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
    ?>

    <div class="col-lg-4">  
        <?php
        $this->load->helper("form");
        foreach ($selPdt as $pdt) {
            $data = array("name" => "myform", "enctype" => "multipart/form-data");
            echo form_open("product_management/update", $data);

            $data = array(
                "name" => "id",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->id,
            );
            echo form_input($data);

            echo form_label("Product Title");
            $data = array(
                "name" => "title",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->title,
            );
            echo form_input($data);
            echo form_label("Product Description");
            $data = array(
                "name" => "descr",
                "id" => "id",
                "class" => "form-control",
                "value" => read_file("files/product_{$pdt->id}.txt")
            );
            echo form_textarea($data);

            echo form_label("Product price");
            $data = array(
                "name" => "price",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->price
            );
            echo form_input($data);
            ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo form_label("Product Size");
            $data = array(
                "name" => "size",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->size
            );
            echo form_input($data);

            echo form_label("Product vat");
            $data = array(
                "name" => "vat",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->vat
            );
            echo form_input($data);
            echo form_label("Product discount");
            $data = array(
                "name" => "dis",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->discount
            );
            echo form_input($data);
            echo form_label("Stock");
            $data = array(
                "name" => "stock",
                "id" => "id",
                "class" => "form-control",
                "value" => $pdt->stock
            );
            echo form_input($data);
            ?>
        </div>

        <div class="col-lg-4">
            <?php
            echo form_label(" Unit");
            $data = array();
            $data[0] = "Select Unit";
            foreach ($allunit as $u) {
                $data[$u->id] = $u->name;
            }
            echo form_dropdown("unitid", $data, $pdt->unitid, "class='form-control'");


            foreach ($allSCat as $scat) {
                if ($scat->id == $pdt->subcategoryid) {
                    $cid = $scat->categoryid;
                    break;
                }
            }
            ?>
            <div class="form-group">
                <label> Category</label>
                <select class="form-control" name="cat" onchange="CatScat(document.myform)">
                    <option value="0">Choose Category</option>
                    <?php
                    foreach ($allCat as $cat) {
                        if ($cid == $cat->id) {
                            echo "<option selected value=\"{$cat->id}\">{$cat->name}</option>";
                        } else {
                            echo "<option value=\"{$cat->id}\">{$cat->name}</option>";
                        }
                    }
                    ?>                    
                </select>
            </div>

            <div class="form-group">
                <label> Sub Category</label>
                <select class="form-control" name="scat">
                    <?php
                    foreach ($allSCat as $scat) {
                        if ($scat->categoryid == $cid) {
                            if ($scat->id == $pdt->subcategoryid) {
                                echo "<option selected value=\"{$scat->id}\">{$scat->name}</option>";
                            } else {
                                echo "<option value=\"{$scat->id}\">{$scat->name}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-9"> 
    <?php
    $data = array(
        "name" => "pic",
        "id" => "id"
    );
    echo form_upload($data);
    ?>
                </div>
                <div class="col-lg-3 row"> 
                    <?php
                    if ($pdt->picture == "") {
                        echo '<img src="' . base_url() . 'images/60X36/notfound.jpg"/>';
                    } else {
                        ?>
                        <img src="<?php echo base_url() ?>images/60X36/product_<?php echo $pdt->id . "." . $pdt->picture; ?>"/>
    <?php } ?>
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
    </div>