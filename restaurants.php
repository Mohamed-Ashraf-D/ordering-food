<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
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
                            
                            <li class="nav-item"> <a class="nav-link active" href="https://www.facebook.com/profile.php?id=100009627915689"><b>اتصل بنا </b> <span class="sr-only"></span></a> </li>

							<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active"><b>تسجيل الدخول </b></a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active"><b>إنشاء حساب</b></a> </li>
                              ';
							}
						else
							{
									//if user is login
									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active"> <img class="img-rounded" src="images\29.png"  height ="23.6px" width="27px" alt=""> </a> </li>';
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
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose shop</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images\img\555.jpeg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                          
                          
                        <div class="widget clearfix">
                                <!-- /widget heading -->
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 ماذا تريد ان تطلب 
                              </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget-body">
                                    <ul class="tags">
                                        <li> <a href="#" class="tag">
                                    بيتزا
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    مستلزمات طبية 
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    مستلزمات المدرسة 
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    بقالة 
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    حلوى 
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    مستلزمات التنظيف 
                                    </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end:Widget -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
																<ul class="list-inline">
																	<li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
																	<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		<div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																		<p> 245 Reviews</p> <a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
						
						
						?>
                                    
                                </div>
                                <!--end:row -->
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
            <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                                    <figure> <img src="images/47.png" alt="Right Image" class="img-fluid"> </figure>
                                </div>
                                <div class="col-xs-12 col-sm-6 left-text">
                                <h3>قريباً اكتشف تطبيق وصلي</h3>
                                    <p>احصل على كل ما تحتاجه، متى ما تحتاجه</p>

                                    <a href="#"> <img src="images\65.png" height="53px" width="160px" alt="Footer logo"> </a> 
                                    
                                
                                    <a href="#"> <img src="images\67.png" height="53px" width="160px" alt="Footer logo"> </a> 
                                    
                                        </a>
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
                        <a href="#"> <img src="images\25.png" height="90px" width="180px" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span> </div>
                        <div class="col-xs-12 col-sm-2 about color-gray">
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
                            <h5>Popular locations</h5>
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
                            <h5> <a href="#"> <img src="images/255.png"  height ="50px" width="170px"  alt="socialmedia"> </a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            
                        </div>
                    </div>
                </div>
                    <!-- bottom footer ends -->
                </div>
            </footer>
            <!-- end:Footer -->
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