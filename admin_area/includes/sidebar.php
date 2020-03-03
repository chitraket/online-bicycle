<?php
 
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
     ?>
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Dashboard</li>

            <li>
                <a href="index.php" class="waves-effect">
                   
                    <span>Dashboard</span>
                </a>
            </li>

           <!-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-layout"></i>
                    <span> Product</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="layouts-horizontal.html">Add Product</a></li>
                    <li><a href="layouts-light-sidebar.html">View Product</a></li>
                    
                </ul>
            </li>-->

            <li class="menu-title">Product</li>

<!--<li>
                <a href="calendar.html" class=" waves-effect">
                    <i class="bx bx-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li>-->

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-store"></i>
                    <span>Product</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-product.php">Add Products</a></li>
                    <li><a href="view-product.php">View Products</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-envelope"></i>
                    <span>Product Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-product-category.php">Add Product Category</a></li>
                    <li><a href="view-product-category.php">View Product Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span>Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-category.php">Add Category</a></li>
                    <li><a href="view-category.php">view Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-briefcase-alt-2"></i>
                    <span>Slider</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-slider.php">Add slider</a></li>
                    <li><a href="view-slider.php">View slider</a></li>
                </ul>
            </li>

            <li>
                <a href="view-customer.php" >
                    <i class="bx bx-task"></i>
                    <span>View customer</span>
                </a>
               
            </li>

            <li>
                <a href="view-order.php" >
                    <i class="bx bx-task"></i>
                    <span>View Orders</span>
                </a>
               
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bxs-user-detail"></i>
                    <span>Boxs</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-box.php">Add Boxs</a></li>
                    <li><a href="view-box.php">View Boxs </a></li>
                   
                </ul>
            </li>

            <!--<li class="menu-title">Pages</li>-->

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-user-circle"></i>
                    <span>Terms & Conditions</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-terms.php">Add Terms & Conditions</a></li>
                    <li><a href="view-terms.php">View Terms & Conditions</a></li>
                   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span>Utility</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="pages-starter.html">Starter Page</a></li>
                    <li><a href="pages-maintenance.html">Maintenance</a></li>
                    <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                    <li><a href="pages-timeline.html">Timeline</a></li>
                    <li><a href="pages-faqs.html">FAQs</a></li>
                    <li><a href="pages-pricing.html">Pricing</a></li>
                    <li><a href="pages-404.html">Error 404</a></li>
                    <li><a href="pages-500.html">Error 500</a></li>
                </ul>
            </li>

            <li class="menu-title">Components</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-tone"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="ui-alerts.html">Alerts</a></li>
                    <li><a href="ui-buttons.html">Buttons</a></li>
                    <li><a href="ui-cards.html">Cards</a></li>
                    <li><a href="ui-carousel.html">Carousel</a></li>
                    <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                    <li><a href="ui-grid.html">Grid</a></li>
                    <li><a href="ui-images.html">Images</a></li>
                    <li><a href="ui-lightbox.html">Lightbox</a></li>
                    <li><a href="ui-modals.html">Modals</a></li>
                    <li><a href="ui-rangeslider.html">Range Slider</a></li>
                    <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                    <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                    <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-video.html">Video</a></li>
                    <li><a href="ui-general.html">General</a></li>
                    <li><a href="ui-colors.html">Colors</a></li>
                    <li><a href="ui-rating.html">Rating</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="bx bxs-eraser"></i>
                    <span class="badge badge-pill badge-danger float-right">6</span>
                    <span>Forms</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="form-elements.html">Form Elements</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-advanced.html">Form Advanced</a></li>
                    <li><a href="form-editors.html">Form Editors</a></li>
                    <li><a href="form-uploads.html">Form File Upload</a></li>
                    <li><a href="form-xeditable.html">Form Xeditable</a></li>
                    <li><a href="form-repeater.html">Form Repeater</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-mask.html">Form Mask</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-list-ul"></i>
                    <span>Tables</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="tables-basic.html">Basic Tables</a></li>
                    <li><a href="tables-datatable.html">Data Tables</a></li>
                    <li><a href="tables-responsive.html">Responsive Table</a></li>
                    <li><a href="tables-editable.html">Editable Table</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bxs-bar-chart-alt-2"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="charts-apex.html">Apex charts</a></li>
                    <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                    <li><a href="charts-flot.html">Flot Chart</a></li>
                    <li><a href="charts-tui.html">Toast UI Chart</a></li>
                    <li><a href="charts-knob.html">Jquery Knob Chart</a></li>
                    <li><a href="charts-sparkline.html">Sparkline Chart</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-aperture"></i>
                    <span>Icons</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="icons-boxicons.html">Boxicons</a></li>
                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-map"></i>
                    <span>Maps</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="maps-google.html">Google Maps</a></li>
                    <li><a href="maps-vector.html">Vector Maps</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-share-alt"></i>
                    <span>Multi Level</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                    <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<?php
 
 }?>