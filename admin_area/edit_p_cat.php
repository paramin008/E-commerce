<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_p_cat'])){
        
        $edit_p_cat_id = $_GET['edit_p_cat'];
        
        $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_p_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_cat_id = $row_edit['p_cat_id'];
        
        $p_cat_title = $row_edit['p_cat_title'];
        
        $p_cat_top = $row_edit['p_cat_top'];
        
        $p_cat_image = $row_edit['p_cat_image'];
        
    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / แก้ไขหมวดหมู่สินค้า
            
            </li>
        </ol> 
    </div> 
</div>

<div class="row"> 
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> แก้ไขหมวดหมู่สินค้า
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        ชื่อหมวดหมู่สินค้า
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input value=" <?php echo $p_cat_title; ?> " name="p_cat_title" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        เลือกเป็นผู้ผลิตชั้นนำ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                        <input name="p_cat_top" type="radio" value="yes"

                            <?php 
                            
                                if($p_cat_top=='no'){}else{echo "checked='checked'";}
                            
                            ?>
                        
                        >
                        <label>ใช่</label>
                    
                        <input name="p_cat_top" type="radio" value="no"
                        
                            <?php 
                            
                                if($p_cat_top=='no'){echo "checked='checked'";}
                            
                            ?>
                        
                        >
                        <label>ไม่</label>
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        รูปภาพ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input type="file" name="p_cat_image" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="other_images/<?php echo $p_cat_image; ?>" alt="<?php echo $p_cat_image; ?>">
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input value="อัปเดตหมวดหมู่สินค้า" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['update'])){
              
              $p_cat_title = $_POST['p_cat_title'];
              
              $p_cat_top = $_POST['p_cat_top'];

              if(is_uploaded_file($_FILES['p_cat_image']['tmp_name'])){
              
                $p_cat_image = $_FILES['p_cat_image']['name'];
                
                $temp_name = $_FILES['p_cat_image']['tmp_name'];
                
                $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_top='$p_cat_top',p_cat_image='$p_cat_image' where p_cat_id='$p_cat_id'";
                
                $run_p_cat = mysqli_query($con,$update_p_cat);
                
                if($run_p_cat){
                    
                    echo "<script>alert('หมวดหมู่สินค้าได้รับการอัปเดต')</script>";
                    
                    echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                    
                }

              }else{
                
                $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_top='$p_cat_top' where p_cat_id='$p_cat_id'";
                
                $run_p_cat = mysqli_query($con,$update_p_cat);
                
                if($run_p_cat){
                    
                    echo "<script>alert('หมวดหมู่สินค้าได้รับการอัปเดต')</script>";
                    
                    echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                    
                }

              }
              
          }

?>



<?php } ?> 