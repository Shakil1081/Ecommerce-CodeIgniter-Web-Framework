<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="input-group" id="adv-search">
                <form action="<?php echo base_url() . "search/result" ?>" method="post">
                    <input type="text" name="title" /><br /><br />
                    <input type="text" name="price1" /><br /><br />
                    <input type="text" name="price2" /><br /><br />
                    <select name="cat">
                        <option value="0">All Category</option>
                        <?php
                            foreach ($allCat as $c){
                                echo "<option value=\"{$c->id}\">{$c->name}</option>";
                            }
                        ?>
                    </select><br /><br />
                    <select name="scat">
                        <option value="0">All Sub Category</option>
                        <?php
                            foreach ($allSCat as $c){
                                echo "<option value=\"{$c->id}\">{$c->name}</option>";
                            }
                        ?>
                    </select><br /><br />
                    <input type="submit" />
                </form>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .dropdown.dropdown-lg .dropdown-menu {
        margin-top: -1px;
        padding: 6px 20px;
    }
    .input-group-btn .btn-group {
        display: flex !important;
    }
    .btn-group .btn {
        border-radius: 0;
        margin-left: -1px;
    }
    .btn-group .btn:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .btn-group .form-horizontal .btn[type="submit"] {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .form-horizontal .form-group {
        margin-left: 0;
        margin-right: 0;
    }
    .form-group .form-control:last-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .dropdown-menu.dropdown-menu-right.col-md-5 {
        width: 408px;
    }
</style>