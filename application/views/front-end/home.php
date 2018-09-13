
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>

        <?php foreach ($allItem[2] as $pdt) {
            ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?php echo base_url() ?>images/300X180/product_<?php echo $pdt['id'] . "." . $pdt['picture']; ?>" alt="" />
                            <h2><?php echo $pdt['price'] ?></h2>
                            <p><?php echo $pdt['title'] ?></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2><?php echo $pdt['price'] ?></h2>
                                <p><?php echo $pdt['title'] ?></p>
                                <form action="<?php echo base_url() ?>cart/add_new" method="post">                         
                                    <input type="hidden" name="id" value="<?php echo $pdt['id']; ?>" id="pid" />
                                    <button type="submit" btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?php echo base_url() . "ecommerce/details/{$pdt['id']}/" . Replace($pdt['title']); ?>"><i class="fa fa-plus-square"></i>Details</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div><!--features_items-->

    <?php
    if (isset($otheritems)) {
        echo $otheritems;
    }
    ?>


    <ul class="pagination">
        <li class="active"><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">&raquo;</a></li>
    </ul>

</div>

