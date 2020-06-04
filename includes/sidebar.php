<div class="col-lg-3 order-2 order-lg-1">


    <aside class="sidebar-wrapper">
        <!-- single sidebar start -->
        <div class="sidebar-single">
            <h5 class="sidebar-title">categories</h5>
            <div class="sidebar-body">
                <ul class="checkbox-container categories-list">
                    <?php 
                                        getPCats();
                                       ?>
                </ul>
            </div>
        </div>
        <div class="sidebar-single">
            <h5 class="sidebar-title">price</h5>
            <div class="sidebar-body">
                <div class="price-range-wrap">
                    <div id="price_range" class="price-range" data-min="1000" data-max="250000"></div>
                    <div class="range-slider">
                        <form action="#" class="d-flex align-items-center justify-content-between">
                            <div class="price-input">
                                <input type="hidden" id="hidden_minimum_price" value="1000" />
                                <input type="hidden" id="hidden_maximum_price" value="250000" />
                                <p id="price_show">1000 - 250000</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- single sidebar end -->
        <!-- single sidebar start -->
        <div class="sidebar-single">
            <h5 class="sidebar-title">Color</h5>
            <div class="sidebar-body">
                <ul class="checkbox-container categories-list">

                    <?php 
                                        getcolor();
                                    ?>

                </ul>
            </div>
        </div>
        <!-- single sidebar end -->
        <div class="sidebar-single">
            <h5 class="sidebar-title">Frame Size</h5>
            <div class="sidebar-body">
                <ul class="checkbox-container categories-list">

                    <?php 
                                        getsize();
                                    ?>

                </ul>
            </div>
        </div>
        <!-- single sidebar start -->
        <!-- single sidebar start -->
        <div class="sidebar-single">
            <h5 class="sidebar-title">Manufacturers</h5>
            <div class="sidebar-body">
                <ul class="checkbox-container categories-list">
                    <?php
                                    getMCats();
                                   ?>
                </ul>
            </div>
        </div>
        <!-- single sidebar end -->

        <!-- single sidebar start -->
        <div class="sidebar-single">
            <h5 class="sidebar-title">Age</h5>
            <div class="sidebar-body">
                <ul class="checkbox-container categories-list">

                    <?php 
                                        getCats();
                                    ?>

                </ul>
            </div>
        </div>


        <!-- single sidebar end -->

        <!-- single sidebar start -->
        <div class="sidebar-single">
            <h5 class="sidebar-title">Sale</h5>
            <div class="sidebar-body">
                <ul class="checkbox-container categories-list">

                    <?php 
                                        getSale();
                                    ?>

                </ul>
            </div>
        </div>

        
        <!-- single sidebar end -->


        <!--<div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div>-->
        <!-- single sidebar end -->

    </aside>

</div>