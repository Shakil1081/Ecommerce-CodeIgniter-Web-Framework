<div class="row">
 <div class="col-lg-10"><span class=""></span> </div><div class="col-lg-2">
 <a href="<?php echo base_url()?>product_management" class="btn btn-default fa fa-plus-square" style="margin: 17px;">  Add new product</a></div>
</div>
  <div class="col-lg-12">
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
    </div>           <!-- /.row -->
            <div class="row">               
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <span class="fa fa-list-ul"></span> Product Liste
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                        <td>Catagory</td>
                         <td>Subcatagory</td>
                        <th>Price</th>
                        <th>Vat</th>
                        <th>Discount</th>
                         <td>size</td>
                        <th>Stock</th>
                        <th>Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($allPdt as $pdt) { ?>
                        <tr class="gradeU">
                            <td><?php echo $pdt->title ?></td>
                            <td><?php echo $pdt->cname ?></td>
                               <td><?php echo $pdt->scname ?></td>
                            <td class="center"><?php echo $pdt->price ?></td>
                            <td class="center"><?php echo $pdt->vat ?></td>
                            <td class="center"><?php echo $pdt->discount ?></td>
                             <td class="center"><?php echo $pdt->size ?></td>
                            <td class="center"><?php echo $pdt->stock + $pdt->tStock . " " . $pdt->uname ?></td>
                            <td>
                            <?php if($pdt->picture == ""){
                                echo '<img src="'. base_url().'images/60X36/notfound.jpg"/>';
                                
                            }else{?>
                                <img src="<?php echo base_url() ?>images/60X36/product_<?php echo $pdt->id. "." . $pdt->picture; ?>"/>
                            <?php } ?>
                            </td>
                            <td><a href="<?php echo base_url() . "product_management/edit/{$pdt->id}" ?>">Edit</a></td>
                            <td><a href="<?php echo base_url() . "product_management/delete/{$pdt->id}" ?>"  onclick="return deletechecked();">Delete</a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>

                            </div>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>