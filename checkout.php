<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						
														mysqli_query($db,$SQL);
														
														$success = "Thankyou! Your Order Placed successfully!";

														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
    
    <div class="site-wrapper">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images\24.png"  height ="30px" width="150px" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php"><b>الرئيسية</b> <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php"><b>المتاجر</b> <span class="sr-only"></span></a> </li>
                            
                           
							<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active"><b>تسجيل الدخول </b></a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active"><b>إنشاء حساب</b></a> </li>';
							}
						else
							{
									//if user is login
									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active"> <img class="img-rounded" src="images\29.png"  height ="23.6px" width="30px" alt=""> </a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">تسجيل خروج </a> </li>';
							}

						?>
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
			
                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4><b>سلة مشترياتك</b></h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>المجموع الفرعي </td>
                                                        <td> <?php echo "$".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>رسوم التوصيل </td>
                                                        <td>مجاناً</td>
                                                    </tr>
                                                     <tr>
                                                        <td>رسوم الخدمة </td>
                                                        <td>مجاناً</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>الإجمالي</strong></td>
                                                        <td class="text-color"><strong> <?php echo "$".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">نقداً <img src="images/2.jpg" alt="" width="90"></span>
                                                    </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description"> بطاقات الائتمان   <img src="images/pngegg.png" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
            <section class="app-section">
            <div class="app-wrap">
                <div class="container">
                    <div class="row text-img-block text-xs-left">
                        <div class="container">
                            <div class="col-xs-12 col-sm-5 right-image text-center">
                                <figure> <img src="images/47.png" alt="Right Image" class="img-fluid"> </figure>
                            </div>
                            <div class="col-xs-12 col-sm-7 left-text">
                            <h3>قريباً اكتشف تطبيق أُطلبلي</h3>
                                    <p>احصل على كل ما تحتاجه، متى ما تحتاجه</p>
                                
                                <a href="#"> <img src="images\65.png" height="53px" width="160px" alt="Footer logo"> </a> 
                                    
                                <a href="#"> <img src="images\67.png" height="53px" width="160px" alt="Footer logo"> </a> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start: FOOTER -->
        <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"> <img src="images\25.png" height="90px" width="180px" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span>
                    <br>
                    <a href="https://www.facebook.com/profile.php?id=100067037925992"> GTP </a> 
                    </span> </div>
                    
                    <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                        <h5>متاجر شائعة</h5>
                        <ul>
                        <li><a href="#">اوكازيون</a> </li>
                            <li><a href="#">الريان</a> </li>
                            <li><a href="#">فتح الله </a> </li>
                            <li><a href="#">مترو</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>مطاعم</h5>
                        <ul>
                            <li><a href="#">ماكدونالز</a> </li>
                            <li><a href="#">كنتاكي </a> </li>
                            <li><a href="#">بازوكا </a> </li>
                            <li><a href="#">اولاد المحله </a> </li>
                            <li><a href="#">الزين السوري </a> </li>
                            
                        </ul>
                    </div><div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>صيدليات</h5>
                        <ul>
                            <li><a href="#">مجموعة صيدليات د/محمد سعد</a> </li>
                            <li><a href="#">المسيري</a> </li>
                            <li><a href="#">صيدليات د/كمال السعيد</a> </li>
                            <li><a href="#">صيدلية</a> </li>
                            <li><a href="#">صيدلية</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                        <h5>العناوين المشهورة </h5>
                        <ul>
                            <li><a href="#">طلخا</a> </li>
                            <li><a href="#">نبروة</a> </li>
                            <li><a href="#">بهوت</a> </li>
                            <li><a href="#">بيلا</a> </li>
                            <li><a href="#">نشا</a> </li>
                            <li><a href="#">تيرة</a> </li>
                            <li><a href="#">درين</a> </li>
                            <li><a href="#">الدروتين </a> </li>
                            <li><a href="#">كفرالجنينة</a> </li>
                            <li><a href="#">الطيبة</a> </li>
                            <li><a href="#">كفر بهوت </a> </li>
                            <li><a href="#">كفر الحصة </a> </li>
                        </ul>
                    </div>
                
                    </div>
                    <!-- top footer ends -->
                    <!-- bottom footer statrs -->
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                <h5>خيارات الدفع</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/88.png"height ="52px" width="60px" alt="cash"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/pngegg.png"  height ="30px" width="100px"  alt="Mastercard"> </a>
                                </li>
                               
                               
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            
                        <h5>للحصول على المساعدة </h5>
                                    <p>يمكنك التواصل معنا من خلال المحادثة المباشرة</p>
                            <h5>Phone: <a href="tel:201096148019">01096148019</a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            
                        </div>
                    </div>
                </div>
                    <!-- bottom footer ends -->
                </div>
            </footer>
            <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
         </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>
