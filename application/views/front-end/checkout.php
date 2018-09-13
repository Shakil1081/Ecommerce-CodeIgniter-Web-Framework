<section id="cart_items">
    <div class="container">
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $pid = $this->session->userdata("pdtid");
                    $qid = $this->session->userdata("qtyid");
                    $prid = $this->session->userdata("priceid");
                    $pic = $this->session->userdata("picid");
                    $tit = $this->session->userdata("titid");
                    if ($pid) {
                        for ($i = 0; $i < count($pid); $i++) {
                            $total += $prid[$i] * $qid[$i];
                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src='" . base_url() . "images/60X36/product_{$pid[$i]}.{$pic[$i]}" . "' class='img-responsive' /></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""><?php echo $tit[$i] ?></a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>$59</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form>
                                        <input class="cart_quantity_input bcb-<?php echo $pid[$i]; ?>" type="text" name="quantity" value="<?php echo $qid[$i] ?>" autocomplete="off" size="2">
                                        <input type="submit" class="sub" id="<?php echo $pid[$i] ?>" value="update" />
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$59</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
                $myid = $this->session->userdata("myid");
                if($myid != NULL){
            ?>
            <form action="<?php echo base_url() . "customer/purchase" ?>" method="post">
                
                <input type="submit" value="Confirm?" />
            </form>
            <?php 
                }else{
                    echo "<h3>For purchase, Please Login</h3>";
                }
            ?>
            
        </div>
        <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div>
    </div>
</section> <!--/#cart_items-->