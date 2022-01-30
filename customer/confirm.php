<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ขายของจ้า</title>
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
                       
                       echo "ยินดีต้นรับ: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>
               <a href="checkout.php">สินค้าในตะกร้าทั้งหมด <?php items(); ?> | ราคารวม: <?php total_price(); ?> </a>
               
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
                   
               <img src="images/ecom-store-logo.jpg" width="70"  class="hidden-xs">
                   <img src="images/ecom-store-logo.jpg" width="50" class="visible-xs">
                   
               </a>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only"></span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only"></span>
                   
                   <i class="fa fa-search"></i>
                   
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
                   
                   <span>สินค้าในตะกร้าทั้งหมด <?php items(); ?> </span>
                   
               </a>
               
               <div class="navbar-collapse collapse right">
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       
                       <span class="sr-only"></span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button>
                   
               </div>
               
               <div class="collapse clearfix" id="search">
                   
                   <form method="get" action="results.php" class="navbar-form">
                       
                       <div class="input-group">
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn">
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary">
                               
                               <i class="fa fa-search"></i>
                               
                           </button>
                           
                           </span>
                           
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
                      บัญชี
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3">
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div>
           
           <div class="col-md-9">
               
               <div class="box">
                   
                   <h1 align="center"> ยืนยันการชำระเงิน</h1>
                   
                   <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                       
                       <div class="form-group">
                           
                         <label> เลขที่ใบแจ้งหนี้: </label>
                          
                          <input type="text" class="form-control" name="invoice_no" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> จำนวนเงินที่โอน: </label>
                          
                          <input type="text" class="form-control" name="amount_sent" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> เลือกโหมดการชำระเงิน: </label>
                          
                          <select name="payment_mode" class="form-control">
                              
                              <option> เลือกโหมดการชำระเงิน </option>
                              <option> Back Code </option>
                              <option> Paypall </option>
                              <option> Payoneer </option>
                              <option> Western Union </option>
                              
                          </select>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> รหัสธุรกรรม / อ้างอิง: </label>
                          
                          <input type="text" class="form-control" name="ref_no" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> รหัส Paypall / Payoneer / Western Union: </label>
                          
                          <input type="text" class="form-control" name="code" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> วันชำระ: </label>
                          
                          <input type="text" class="form-control" name="date" required>
                           
                       </div>
                       
                       <div class="text-center">
                           
                           <button class="btn btn-primary btn-lg" name="confirm_payment">
                               
                               <i class="fa fa-user-md"></i> ยืนยันการชำระเงิน
                               
                           </button>
                           
                       </div>
                       
                   </form>
                   
                   <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('ขอบคุณสำหรับการซื้อคำสั่งซื้อของคุณจะเสร็จสิ้นภายใน 1000 ชั่วโมง')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>
                   
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