<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shopper</title>
        <link href="<?php echo base_url(); ?>front-end/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>front-end/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>front-end/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>front-end/css/price-range.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>front-end/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>front-end/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>front-end/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="<?php echo base_url(); ?>front-end/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>front-end/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>front-end/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>front-end/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>front-end/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i>+8801722878226</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> shakilaust81@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="index.html"><img src="<?php echo base_url(); ?>front-end/images/home/logo.png" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        Bangladesh
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Bangladesh</a></li>
                                        <li><a href="#">USA</a></li>
                                        <li><a href="#">UK</a></li>
                                        <li><a href="#">Australia</a></li>
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        Taka
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Taka</a></li>
                                        <li><a href="#">Dollar</a></li>
                                        <li><a href="#">Pound</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo base_url() ?>dashbord"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                    <li><a href="<?php echo base_url(); ?>ecommerce/Checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li class="dropdown">
                                        <a href="<?php echo base_url(); ?>ecommerce/cart"><i class="fa fa-shopping-cart"></i> Cart</a>
                                        <ul role="menu" class="sub-menu whit">
                                            <div class="table-responsive cart_info">




                                                <div class="row">
                                                    <div class="col-xs-2 ct">Pic</div>
                                                    <div class="col-xs-6 ct">Title</div>
                                                    <div class="col-xs-2 ct">price</div>
                                                    <div class="col-xs-1 ct">QUT</div>
                                                    <div class="col-xs-1 ct">action</div>
                                                </div>
                                                <div class="row" id="scart">
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
                                                            echo "<div class='pdt-par-{$pid[$i]}'>";
                                                            echo "<div class='col-xs-2'><img src='" . base_url() . "images/60X36/product_{$pid[$i]}.{$pic[$i]}" . "' class='img-responsive' /></div>
                                                    <div class='col-xs-6 ct'>{$tit[$i]}</div>
                                                    <div class='col-xs-2 ct'>{$prid[$i]}</div>
                                                    <div class='col-xs-1 ct'>{$qid[$i]}</div>
                                                    <div class='col-xs-1 ct'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true' id='pdt-{$pid[$i]}'></span></div><br class='clear' />";
                                                            echo "</div>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-2"></div>
                                                    <div class="col-xs-6"><span class="pull-right">Total Price:</span></div>
                                                    <div class="col-xs-2 ct">$<span id="totalPrice"><?php echo $total; ?></span></div>
                                                    <div class="col-xs-1 ct"></div>
                                                    <div class="col-xs-1 ct"></div>
                                                </div>

                                            </div>

                                        </ul>
                                    </li>
                                    <?php
                                    $myid = $this->session->userdata("myid");
                                    if ($myid != NULL) {
                                        ?>
                                        <li><a href="<?php echo base_url() ?>Sign_up"><i class="fa fa-lock"></i> Logout</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li><a href="<?php echo base_url() ?>Sign_up"><i class="fa fa-lock"></i> Login</a></li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="<?php echo base_url(); ?>ecommerce" class="active">Home</a></li>
                                    <li class="dropdown"><a href="<?php echo base_url(); ?>ecommerce/shop">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li> 
                                            <li><a href="checkout.html">Checkout</a></li> 
                                            <li><a href="<?php echo base_url(); ?>ecommerce/cart">Cart</a></li> 
                                            <li><a href="login.html">Login</a></li> 
                                        </ul>
                                    </li>
                                    <li><a href="#">What's New</a></li>
                                    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li> 
                                    <li><a href="#">About</a></li>
                                    <li><a href="<?php echo base_url(); ?>Pages/contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <?php
        if (isset($extra)) {
            echo $extra;
        }



        if (isset($shopicon)) {
            echo $shopicon;
        }

        if (isset($content)) {
            echo $content;
        }

        if (isset($cart)) {
            echo $cart;
        }
        ?>

        <footer id="footer"><!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>e</span>-shopper</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="<?php echo base_url(); ?>front-end/images/home/iframe1.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="<?php echo base_url(); ?>front-end/images/home/iframe2.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="<?php echo base_url(); ?>front-end/images/home/iframe3.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="<?php echo base_url(); ?>front-end/images/home/iframe4.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="<?php echo base_url(); ?>front-end/images/home/map.png" alt="" />
                                <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Online Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Change Location</a></li>
                                    <li><a href="#">FAQ’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quock Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">T-Shirt</a></li>
                                    <li><a href="#">Mens</a></li>
                                    <li><a href="#">Womens</a></li>
                                    <li><a href="#">Gift Cards</a></li>
                                    <li><a href="#">Shoes</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privecy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Billing System</a></li>
                                    <li><a href="#">Ticket System</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Company Information</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Store Location</a></li>
                                    <li><a href="#">Affillate Program</a></li>
                                    <li><a href="#">Copyright</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>

                    </div>
                </div>
            </div>

        </footer><!--/Footer-->



        <script src="<?php echo base_url(); ?>front-end/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>front-end/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>front-end/js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo base_url(); ?>front-end/js/price-range.js"></script>
        <script src="<?php echo base_url(); ?>front-end/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>
        <script>
            $(document).ready(function() {
                $(".sub").click(function() {
                    var id = $(this).attr("id");
                    var form_data = {id: $(this).attr("id"), qty: $(".bcb-" + id).val()};
                    $.ajax({
                        url: "<?php echo base_url() . "cart/update" ?>",
                        type: 'POST',
                        data: form_data,
                        success: function(data) {
                            alert("Product Updated");
                        }
                    });
                    return false;
                });

                $("#atc").click(function() {
                    var qty = $("#qty").val();
                    if (parseInt(qty) != qty) {
                        alert("Invalid Fromat");
                    } else {
                        var form_data = {id: $("#pid").val(), qty: $("#qty").val()};
                        $.ajax({
                            url: "<?php echo base_url() . "cart/add_new" ?>",
                            type: 'POST',
                            data: form_data,
                            success: function(data) {
                                if (data['msg'] == "1") {
                                    var display = '<div class="col-xs-2 ct"><img src="<?php echo base_url() . "images/60X36/product_" ?>' + $("#pid").val() + "." + data['picture'] + '" class="img-responsive" /></div>';
                                    display += '<div class="col-xs-6">' + data['title'] + '</div>';
                                    display += '<div class="col-xs-2">' + data['price'] + '</div>';
                                    display += '<div class="col-xs-1">' + $("#qty").val() + '</div>';
                                    display += '<div class="col-xs-1 ct"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true" id="pdt-' + $("#pid").val() + '"></span></div>'
                                    $("#scart").append(display);
                                }
                                else {
                                    alert(data['msg']);
                                }
                            }
                        });
                    }
                    return false;
                });
                $(".glyphicon-remove-circle").click(function() {
                    var id = $(this).attr("id");
                    id = parseInt(id.substr(4));
                    $(".pdt-par-" + id).hide(500);
                    var form_data = {id: id};
                    $.ajax({
                        url: "<?php echo base_url() . "cart/remove" ?>",
                        type: 'POST',
                        data: form_data,
                        success: function(data) {
                            //var pp = Number($("#totalPrice").text() - data);
                            $("#totalPrice").text(Number($("#totalPrice").text() - data));
                        }
                    });
                });


                $("#reload").click(function() {
                    $.ajax({
                        type: 'POST',
                        data: "",
                        url: "<?php echo base_url() ?>ecommerce/captcha_generator",
                        success: function(data) {
                            $("#cap_img").attr("src", "<?php echo base_url() . "captcha/"; ?>" + data["cap_name"]);
                        }
                    });
                });
            });





        </script>
        <!-- Lets load up prefixfree to handle CSS3 vendor prefixes -->
        <script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
        <!-- You can download it from http://leaverou.github.com/prefixfree/ -->

        <!-- Time for jquery action -->
        <script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>

        <style>
            .sub-menu.whit {
                background: white none repeat scroll 0 0;
                border: 1px solid gray;
                border-radius: 5px;
                margin-left: -450px !important;
                width: 600px !important;
            }
            br.clear{
                clear: both;
            }
        </style>
    </body>
</html>

