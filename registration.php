<!DOCTYPE html>
<html lang="en">
<?php

session_start(); //temp session
error_reporting(0); // hide undefine index
include("connection/connect.php"); // connection
if(isset($_POST['submit'] )) //if submit btn is pressed
{
     if(empty($_POST['firstname']) ||  //fetching and find if its empty
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
		//cheching username & email if already present
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  //matching passwords
       	$message = "Password not match";
    }
	elseif(strlen($_POST['password']) < 6)  //cal password length
	{
		$message = "Password Must be >=6";
	}
	elseif(strlen($_POST['phone']) < 10)  //cal phone length
	{
		$message = "invalid phone number!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$message = "Invalid email address please type a valid email!";
    }
	elseif(mysqli_num_rows($check_username) > 0)  //check username
     {
    	$message = 'username Already exists!';
     }
	elseif(mysqli_num_rows($check_email) > 0) //check email
     {
    	$message = 'Email Already exists!';
     }
	else{
       
	 //inserting values into db
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		
		
		
		
		 header("refresh:5;url=login.php"); // redireted once inserted success
    }
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
     
         <!--header starts-->
         <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" href="index.php"><img class="img-rounded" src="images\24.png"  height ="30px" width="150px" alt=""> </a>
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

                       '
                       ;
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
							 
                        </ul>
                  </div>
               </div>
            </nav>
            <!-- /.navbar -->
         </header>
         <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">اسم المستخدم</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="UserName"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">الإسم الأول</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="First Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">إسم العائلة</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Last Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">البريد الإلكتروني</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">رقم الهاتف</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Phone"> <small class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">الرقم السري </label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">تاكيد الرقم السري</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Password"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">العنوان</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                      
                                       <p class="text-xs-center"> <input type="submit" value="تسجيل " name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                     <!-- WHY? -->
                     <div class="col-md-4">
                        <h4>سجل الأن</h4>
                        <p>عملية التسجيل سريعة وسهلة</p>
                        <hr>
                        
                        <p></p>
                        <div class="panel">
                           <div class="panel-heading">
                           </div>
                           
                        <!-- end:panel -->
                        <div class="panel">
                           <div class="panel-heading">
                           </div>
                           <div class="panel-collapse collapse" id="faq2" aria-expanded="true" role="article">
                              <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                           </div>
                        </div>
                        <!-- end:Panel -->
                        <h4 class="m-t-20">اتصل بدعم العملاء</h4>
                        <p> إذا كنت تبحث عن المزيد من المساعدة أو لديك سؤال لتطرحه، من فضلك </p>
                        <p> <a href="contact.html" class="btn theme-btn m-t-15">  تواصل معنا  </a> </p>
                     </div>
                     <!-- /WHY? -->
                  </div>
               </div>
            </section>
            <section class="app-section">
               <div class="app-wrap">
                  <div class="container">
                     <div class="row text-img-block text-xs-left">
                        <div class="container">
                           <div class="col-xs-12 col-sm-6  right-image text-center">
                              <figure> <img src="images/47.png" alt="Right Image"> </figure>
                           </div>
                           <div class="col-xs-12 col-sm-6 left-text">
                           <h3>قريباً اكتشف تطبيق ابحث أُطلبلي</h3>
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
                     </div>
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
                     <h5>العناوين المشهورة </h5>
                        <ul>
                            <li><a href="#">'طلخا</a> </li>
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