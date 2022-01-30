<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / เพิ่มหมวดหมู่สินค้า
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> เพิ่มหมวดหมู่สินค้า
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        ชื่อหมวดหมู่สินค้า
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input name="p_cat_title" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                           เลือกเป็นชั้นนำ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input name="p_cat_top" type="radio" value="yes">
                            <label>ใช่</label>
                        
                            <input name="p_cat_top" type="radio" value="no">
                            <label>ไม่</label>
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        รูปภาพ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input type="file" name="p_cat_image" class="form-control">
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input value="ยืนยัน" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['submit'])){
              
              $p_cat_title = $_POST['p_cat_title'];
              
              $p_cat_top = $_POST['p_cat_top'];
              
              $p_cat_image = $_FILES['p_cat_image']['name'];
              
              $temp_name = $_FILES['p_cat_image']['tmp_name'];

              move_uploaded_file($temp_name,"other_images/$p_cat_image");
              
              $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_top,p_cat_image) values ('$p_cat_title','$p_cat_top','$p_cat_image')";
              
              $run_p_cat = mysqli_query($con,$insert_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('เพิ่มหมวดหมู่สินค้าเรียบร้อยเเล้ว')</script>";
                  
                  echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 