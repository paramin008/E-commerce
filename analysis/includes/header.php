<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

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
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
   
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
               <a href="../checkout.php">  สินค้าในตะกร้าทั้งหมด <?php items(); ?> | ราคารวม: <?php total_price(); ?> </a>
               
           </div>
           
           <div class="col-md-6">
               
               <ul class="menu">
                   
                   <li>
                       
                   <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='../customer_register.php'>สมัครสมาชิก</a>";

                               }
                           
                           ?>        
                   </li>
                   <li>
                       <a href="../customer/my_account.php">บัญชี</a>
                   </li>
                   <li>
                       <a href="../cart.php">ตะกร้าสินค้า</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='../checkout.php'> เข้าสู่ระบบ </a>";

                               }else{

                                echo " <a href='../logout.php'> ออกจากระบบ </a> ";

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
              <img src="../images/logo.png" width="80" style="vertical-align:middle;margin:-15px 0px" class="hidden-xs">
                   <img src="../images/logo.png" width="80" style="vertical-align:middle;margin:-15px 0px" class="visible-xs"> 
                   
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
                           <a href="../index.php">หน้าแรก</a>
                       </li>
                       <li class="<?php if($active=='สินค้า') echo"active"; ?>">
                           <a href="../shop.php">สินค้า</a>
                       </li>
                       <li class="<?php if($active=='บัญชี') echo"active"; ?>">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='../checkout.php'>บัญชี</a>";
                               
                           }else{
                               
                              echo"<a href='../customer/my_account.php?my_orders'>บัญชี</a>"; 
                               
                           }
                           
                           ?>
                          
                       </li>
                       <li class="<?php if($active=='ตะกร้าสินค้า') echo"active"; ?>">
                           <a href="../cart.php">ตะกร้าสินค้า</a>
                       </li>
                       <li class="<?php if($active=='บริการวิเคราะห์คุณภาพปุ๋ยทางเคมี') echo"active"; ?>">
                           <a href="../analysis.php">บริการวิเคราะห์คุณภาพปุ๋ยทางเคมี</a>
                       </li>
                       <li class="<?php if($active=='ติดต่อเรา') echo"active"; ?>">
                           <a href="../contact.php">ติดต่อเรา</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>สินค้าในตะกร้าทั้งหมด <?php items(); ?></span>
                   
               </a>
               
           
               
               
               
           </div>
           
       </div>
       
   </div>