<h1 align="center"> เปลี่ยนรหัสผ่าน </h1>


<form action="" method="post">
    
    <div class="form-group">
        
        <label> รหัสผ่านก่อนหน้า: </label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> รหัสผ่านใหม่: </label>
        
        <input type="text" name="new_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> ยืนยันรหัสผ่านอีกครั้ง: </label>
        
        <input type="text" name="new_pass_again" class="form-control" required>
        
    </div>
    
    <div class="text-center">
        
        <button type="submit" name="submit" class="btn btn-primary">
            
            <i class="fa fa-user-md"></i> ยืนยัน
            
        </button>
        
    </div>
    
</form>


<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = MD5 ($_POST['old_pass']);
    
    $c_new_pass = MD5 ($_POST['new_pass']);
    
    $c_new_pass_again = MD5 ($_POST['new_pass_again']);
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('ขออภัยรหัสผ่านปัจจุบันของคุณไม่ถูกต้อง กรุณาลองอีกครั้ง')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('ขออภัยรหัสผ่านใหม่ของคุณไม่ตรงกัน')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('อัปเดตรหัสผ่านของคุณแล้ว')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>