<?php  

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_url='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);

    $check_product = mysqli_num_rows($run_product);

    if($check_product == 0){

        echo "<script>window.open('index.php','_self')</script>";

    }else{
    
    $row_products = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_products['p_cat_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];

    $pro_sale_price = $row_products['product_sale'];
    
    $pro_desc = $row_products['product_desc'];
        
    $pro_features = $row_products['product_features'];
        
    $pro_video = $row_products['product_video'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_img2 = $row_products['product_img2'];
    
    $pro_img3 = $row_products['product_img3'];
        
    $pro_label = $row_products['product_label'];

    if($pro_label == ""){

    }else{

        $product_label = "
        
            <a href='#' class='label $pro_label'>
            
                <div class='theLabel'> $pro_label </div>
                <div class='labelBackground'>  </div>
            
            </a>
        
        ";

    }
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>spcworm</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div id="top">
       
       <div class="container">
           
           <div class="col-md-6 offer">
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "ยินดีต้อนรับ: บุคคลทั่วไป";
                       
                   }else{
                       
                       echo "ยินดีต้อนรับ: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
               <a href="checkout.php">สินค้าในตะกร้าทั้งหมด <?php items(); ?>  | ราคารวม: <?php total_price(); ?> </a>
               
           </div>
           
           <div class="col-md-6">
               
               <ul class="menu">
                   
                   <li>
                   <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                            echo "<a href='customer_register.php'>สมัครสมาชิก</a>";

                               }
                           
                           ?>
                   </li>
                   <li>
                       <a href="customer/my_account.php">บัญชี</a>
                   </li>
                   <li>
                       <a href="cart.php">ตะกร้าสินค้า</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> เข้าสู่ระบบ </a>";

                               }else{

                                echo " <a href='logout.php'> ออกจากระบบ </a> ";

                               }
                           
                           ?>
                           
                       </a>
                   </li>
                   
               </ul>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       
       <div class="container">
           
           <div class="navbar-header">
               
               <a href="index.php" class="navbar-brand home">
                   
               <img src="images/logo.png" width="80" style="vertical-align:middle;margin:-15px 0px" class="hidden-xs">
                   <img src="images/logo.png" width="80" style="vertical-align:middle;margin:-15px 0px" class="visible-xs"> 
                   
               </a>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only"></span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
              
               
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               
               <div class="padding-nav">
                   
                   <ul class="nav navbar-nav left">
                       
                       <li class="<?php if($active=='หน้าแรก') echo"active"; ?>">
                           <a href="index.php">หน้าแรก</a>
                       </li>
                       <li class="<?php if($active=='สินค้า') echo"active"; ?>">
                           <a href="shop.php">สินค้า</a>
                       </li>
                       <li class="<?php if($active=='บัญชี') echo"active"; ?>">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>บัญชี</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>บัญชี</a>"; 
                               
                           }
                           
                           ?>
                           
                       </li>
                       <li class="<?php if($active=='ตะกร้าสินค้า') echo"active"; ?>">
                           <a href="cart.php">ตะกร้าสินค้า</a>
                       </li>
                       <li class="<?php if($active=='บริการวิเคราะห์คุณภาพปุ๋ยทางเคมีสภาพดิน') echo"active"; ?>">
                           <a href="analysis.php">บริการวิเคราะห์คุณภาพปุ๋ยทางเคมี</a>
                       <li class="<?php if($active=='ติดต่อเรา') echo"active"; ?>">
                           <a href="contact.php">ติดต่อเรา</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="cart.php" class="btn navbar-btn btn-primary right">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>สินค้าในตะกร้าทั้งหมด <?php items(); ?> ชิ้น </span>
                   
               </a>
              
               
              
                       </div>
                       
                   </form>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">หน้าแรก</a>
                   </li>
                   <li>
                       สินค้า
                   </li>
                   
                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul>
               
           </div>
           
           <div class="col-md-12">
               <div id="productMain" class="row">
                   <div class="col-sm-6">
                       <div id="mainImage">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                               <ol class="carousel-indicators">
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol>
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">ก่อนหน้า</span>
                               </a>
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">ถัดไป</span>
                               </a>
                               
                           </div>
                       </div>

                           <?php echo $product_label; ?>

                   </div>
                   
                   <div class="col-sm-6">
                       <div class="box">
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                           
                           <form class="form-horizontal" method="post">
                               <div class="form-group">
                                   <label for="" class="col-md-5 control-label">จำนวนสินค้า</label>
                                   
                                   <div class="col-md-7">
                                          <select name="product_qty" id="" class="form-control">
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select>
                                   
                                    </div>
                                   
                               </div>
                               
                               <div class="form-group">
                                   <label class="col-md-5 control-label">ขนาดสินค้า</label>
                                   
                                   <div class="col-md-7">
                                       
                                       <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('กรุณาเลือกจำนวน')"><!-- form-control Begin -->
                                          
                                           <option value="" disabled selected>เลือกขนาด</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select>
                                       
                                   </div>
                               </div>
                               
                               <?php 

                                    if($pro_label == "sale"){

                                        echo "

                                            <p class='price'>

                                            ราคา: <del>$pro_price บาท</del><br/>

                                            ขาย:$pro_sale_price บาท

                                            </p>

                                        ";

                                    }else{

                                        echo "

                                            <p class='price'>

                                            ราคา:$pro_price บาท

                                            </p>

                                        ";

                                    }
                               
                               ?>
                               
                               <p class="text-center buttons"><button type="submit" name="add_cart" class="btn btn-primary i fa fa-shopping-cart"> ใส่ตะกร้าสินค้า</button></p>
                               
                           </form>

                           <?php 
                           
                           if(isset($_POST['add_cart'])){
        
                            $ip_add = getRealIpUser();
        
                            $pro_id = $row_products['product_id'];
                            
                            $p_id = $pro_id;
                            
                            $product_qty = $_POST['product_qty'];
                            
                            $product_size = $_POST['product_size'];
        
                            $pro_url = $row_products['product_url'];
                            
                            $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
                            
                            $run_check = mysqli_query($con,$check_product);
                            
                            if(mysqli_num_rows($run_check)>0){
                                
                                echo "<script>alert('This product has already added in cart')</script>";
                                echo "<script>window.open('$pro_url','_self')</script>";
                                
                            }else{
                    
                                $get_price ="select * from products where product_id='$p_id'";
                    
                                $run_price = mysqli_query($con,$get_price);
                    
                                $row_price = mysqli_fetch_array($run_price);
                    
                                $pro_price = $row_price['product_price'];
                    
                                $pro_sale = $row_price['product_sale'];
                    
                                $pro_label = $row_price['product_label'];
                    
                                if($pro_label == "sale"){
                    
                                    $product_price = $pro_sale;
                    
                                }else{
                    
                                    $product_price = $pro_price;
                    
                                }
                                
                                $query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";
                                
                                $run_query = mysqli_query($con,$query);
                                
                                echo "<script>window.open('$pro_url','_self')</script>";
                                
                            }
                            
                        }
                           
                           ?>
                           
                       </div>
                       
                       <div class="row" id="thumbs">
                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a>
                           </div>
                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a>
                           </div>
                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a>
                           </div>
                           
                       </div>
                       
                   </div>
                   
                   
               </div>
               
               <div class="box" id="details">
                   
                    <a data-toggle="tab" href="#descriptions" class="btn btn-primary tab">
                    
                       คำอธิบายสินค้า
                    
                    </a>
                    <a data-toggle="tab" href="#features" class="btn btn-primary tab">
                    
                    คุณสมบัติของสินค้า
                    
                    </a>
                    <a data-toggle="tab" href="#videos" class="btn btn-primary tab">
                    
                    วิดีโอสินค้า
                    
                    </a>   
                   

                    <hr style="margin-top:25px;">

                   

                    <div class="tab-content">

                        <div class="tab-pane fade in active" id="descriptions"> 
                        
                            <p class="product_descriptions">
                            
                                <?php echo $pro_desc; ?>
                            
                            </p>
                        
                        </div> 

                        <div class="tab-pane fade in" id="features"> 

                            <p class="product_features">
                            
                                <?php echo $pro_features; ?>
                            
                            </p>

                        </div> 

                        <div class="tab-pane fade in embed-responsive embed-responsive-16by9"   id="videos"> 

                            <p class="product_videos">
                            
                                <?php echo $pro_video; ?>
                            
                            </p>

                        </div> 

                    </div>

                   

               </div>
               
               
               
           </div>
       </div>
   </div>
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<?php } ?>