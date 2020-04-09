<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Bikes Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <link rel="stylesheet" href="assets/js/plugins/jquery.min.js">
    <link rel="stylesheet" href="assets/js/main.js">
    <link rel="stylesheet" href="assets/js/plugins/jqueryui.min.js">
    <link rel="stylesheet" href="assets/js/jquerys.min.js">
    <link rel="stylesheet" href="assets/js/bootstrap.min.js">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--sweet alert-->
    <script src="assets/js/sweetalert.min.js"></script>

</head>

</html>
<?php
include("includes/db.php");

$email=$_GET['email'];
$update_registree="update customers set customer_status='yes' where customer_email='$email'";
$run_update=mysqli_query($con,$update_registree);
if($run_update)
{
    ?>
     <script type="text/javascript">
                    swal({
                        title: "Registration successful.",
                        text: "",
                        icon: "success",
                        buttons:[,"OK"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('customer/customer_login.php','_self');
                        } else {
                        
                        }
                });
                    </script>
    <?php 
}

?>