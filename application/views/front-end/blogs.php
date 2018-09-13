<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <?php foreach ($allPdt as $pdt) { ?>
  <div class="blog-post-area">
                     <div class="single-blog-post">
                        <h3><?php echo $pdt->title ?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> Mac Doe</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </span>
                        </div>
                        <a href="">
                           <img src="<?php echo base_url() ?>images/original/product_<?php echo $pdt->id . "." . $pdt->picture; ?>" alt="" />
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a  class="btn btn-primary" href="">Read More</a>
                    </div>
                    <?php } ?></div>
                 <ul class="pagination">
                            <li><a href="" class="active">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                
                </div>
            </div>
        </div>
    </div>
</section>