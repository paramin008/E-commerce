<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['edit_coupon'])){

    $edit_id = $_GET['edit_coupon'];
    $edit_coupon = "select * from coupons where coupon_id='$edit_id'";
    $run_edit_coupon = mysqli_query($con,$edit_coupon);
    $row_edit_coupon = mysqli_fetch_array($run_edit_coupon);

    $coup_id = $row_edit_coupon['coupon_id'];
    $coup_title = $row_edit_coupon['coupon_title'];
    $coup_price = $row_edit_coupon['coupon_price'];
    $coup_code = $row_edit_coupon['coupon_code'];
    $coup_limit = $row_edit_coupon['coupon_limit'];
    $coup_used = $row_edit_coupon['coupon_used'];
    $prod_id = $row_edit_coupon['product_id'];

    $get_products = "select * from products where product_id='$prod_id'";
    $run_products = mysqli_query($con,$get_products);
    $row_products = mysqli_fetch_array($run_products);

    $product_id = $row_products['product_id'];
    $product_title = $row_products['product_title'];

}

?>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> ควบคุม / แก้ไขคูปอง
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> แก้ไขคูปอง 
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ชื่อคูปอง </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $coup_title; ?>" name="coupon_title" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ราคาคูปอง </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $coup_price; ?>" name="coupon_price" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> จำนวนคูปอง </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="coupon_limit" type="number" class="form-control" value="<?php echo $coup_limit; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> เลือกสินค้าที่ใช้คูปอง </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="product_id" class="form-control" required>
                          
                            <option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>

                            <?php 
                            
                                $get_p = "select * from products";
                                $run_p = mysqli_query($con,$get_p);

                                while($row_p = mysqli_fetch_array($run_p)){

                                    $p_id = $row_p['product_id'];
                                    $p_title = $row_p['product_title'];

                                    echo "<option value='$p_id'>$p_title</option>";

                                }
                            
                            ?>
                          
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> รหัสคูปอง </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $coup_code; ?>" name="coupon_code" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="update" value="แก้ไขคูปอง" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>

<?php 

if(isset($_POST['update'])){

    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];
    $coupon_pro_id = $_POST['product_id'];

    $update_coupon = "update coupons set product_id='$coupon_pro_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$coup_used' where coupon_id='$coup_id'";
    $run_update_coupon = mysqli_query($con,$update_coupon);

    if($run_update_coupon){

        echo "<script>alert('คูปองได้รับการอัปเดตแล้ว')</script>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";

    }


}

?>

<?php } ?>