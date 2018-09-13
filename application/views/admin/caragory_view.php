<div class="row">
 <div class="col-lg-10"><span class=""></span> </div><div class="col-lg-2">
 <a href="<?php echo base_url()?>add_catogary" class="btn btn-default fa fa-plus-square" style="margin: 17px;"> Add new Category</a></div>
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
                           <span class="fa fa-list-ul"></span> Category Liste
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Category Name </th> 
                         <th>Edit </th> 
                          <th>Delete </th> 
                    </tr>
                </thead>
                <tbody>
                    

                    <?php 
                      foreach ($catagoryname as $pdt) {?>
                        <tr class="gradeU">
                            <td><?php echo $pdt->name ?></td>  
                             <td><a href="<?php echo base_url() . "add_catogary/edit/{$pdt->id}" ?>">Edit</a></td>   
                  <td><a href="<?php echo base_url() . "add_catogary/delete/{$pdt->id}" ?>" onclick="return deletechecked();">Delete</a></td> 
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