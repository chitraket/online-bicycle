 <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">categories</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                      <?php 
                                        getPCats();
                                       ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">price</h5>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="1" data-max="2000"></div>
                                        <div class="range-slider">
                                            <form action="#" class="d-flex align-items-center justify-content-between">
                                                <div class="price-input">
                                                <input type="hidden" id="hidden_minimum_price" value="0" />
                                                <input type="hidden" id="hidden_maximum_price" value="65000" />    
                                                <p id="price_show">1000 - 65000</p>
                                                <div id="price_range"></div>
                                                   
                                                </div>
                                                <button class="filter-btn">filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                              <!-- single sidebar start -->
                              <div class="sidebar-single">
                                <h5 class="sidebar-title">Manufacturers</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                    <?php 
                                         $get_cats="select * from manufacturers where manufacturer_top='yes'";
                                         $run_cats=mysqli_query($db,$get_cats);
                                         while($row_cats=mysqli_fetch_array($run_cats))
                                         {
                                             $manufacturer_id=$row_cats['manufacturer_id'];
                                             $manufacturer_title=$row_cats['manufacturer_title'];
                                             echo"
                                            <li>
                                             <div class='custom-control custom-checkbox'>
                                                 <input type='checkbox' class='custom-control-input' id='$manufacturer_id' name='ma'  value='$manufacturer_id'>
                                                 <label class='custom-control-label' for='$manufacturer_id'><a href='shop.php?manufacturer_id=$manufacturer_id'>$manufacturer_title</a></label>
                                             </div>
                                             </li>
                                             
                                             ";
                                         }
                                         $get_cats="select * from manufacturers where manufacturer_top='no'";
                                         $run_cats=mysqli_query($db,$get_cats);
                                         while($row_cats=mysqli_fetch_array($run_cats))
                                         {
                                             $manufacturer_id=$row_cats['manufacturer_id'];
                                             $manufacturer_title=$row_cats['manufacturer_title'];
                                             echo"
                                            <li>
                                             <div class='custom-control custom-checkbox'>
                                                 <input type='checkbox' class='custom-control-input' id='chit' value='$manufacturer_id'>
                                                 <label class='custom-control-label' for='chit'><a href='shop.php?manufacturer_id=$manufacturer_id'>$manufacturer_title</a></label>
                                             </div>
                                             </li>
                                             
                                             ";
                                         }
                                    ?>
                                     
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">Filter</h5>
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
                                <h5 class="sidebar-title">color</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">size</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck111">
                                                <label class="custom-control-label" for="customCheck111">S (4)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck222">
                                                <label class="custom-control-label" for="customCheck222">M (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck333">
                                                <label class="custom-control-label" for="customCheck333">L (7)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck444">
                                                <label class="custom-control-label" for="customCheck444">XL (3)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
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
