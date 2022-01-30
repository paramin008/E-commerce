<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content–Type"content="text/html ; charset= utf–8" />
    <meta neme="Description" content="เว็บไซต์ขายปุ๋ย SCP Worm| SPC Worm" />
    <meta name="keywords" content="ปุ๋ย SPCWorm, SPC Worm,spc worm,ศรีประจันต์,ขายปุ๋ยศรีประจันต์,ปุ๋ย" />
    <meta name="author" content="SPC Worm" />
    <meta name="robots" content="index,follow" />
    
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
                       
                       echo "ยินดีต้อนรับ: ผู้เยี่ยมชม";
                       
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
                       <a href="../customer_register.php">สมัครสมาชิก</a>
                   </li>
                   <li>
                       <a href="my_account.php">บัญชี</a>
                   </li>
                   <li>
                       <a href="../cart.php">ตะกร้าสินค้า</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                       
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
               
               <a href="../index.php" class="navbar-brand home">
                   
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
                       
                       <li>
                           <a href="../index.php">หน้าแรก</a>
                       </li>
                       <li>
                           <a href="../shop.php">สินค้า</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">บัญชี</a>
                       </li>
                       <li>
                           <a href="../cart.php">ตะกร้าสินค้า</a>
                       </li>
                      
                       <li>
                           <a href="../contact.php">ติดต่อเรา</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>สินค้าในตะกร้าทั้งหมด<?php items(); ?> </span>
                   
               </a>
               
              
               
             
               
           </div>
           
       </div>
       
   </div>