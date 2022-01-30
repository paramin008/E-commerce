<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_cat'])){
        
        $edit_cat_id = $_GET['edit_cat'];
        
        $edit_cat_query = "select * from categories where cat_id='$edit_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $cat_id = $row_edit['cat_id'];
        
        $cat_title = $row_edit['cat_title'];
        
        $cat_top = $row_edit['cat_top'];
        
        $cat_image = $row_edit['cat_image'];
        
    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / แก้ไขหมวดหมู่
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> แก้ไขหมวดหมู่
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        ชื่อหมวดหมู่  
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="<?php echo $cat_title; ?>" name="cat_title" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        เลือกเป็นผู้ผลิต
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                        <input name="cat_top" type="radio" value="yes"

                            <?php 
                            
                                if($cat_top=='no'){}else{echo "checked='checked'";}
                            
                            ?>
                        
                        >
                        <label>ใช่</label>
                    
                        <input name="cat_top" type="radio" value="no"
                        
                            <?php 
                            
                                if($cat_top=='no'){echo "checked='checked'";}
                            
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
                        
                            <input type="file" name="cat_image" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="other_images/<?php echo $cat_image; ?>" alt="<?php echo $cat_image; ?>">
                        
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="อัปเดตหมวดหมู่" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['update'])){
              
              $cat_title = $_POST['cat_title'];
              
              $cat_top = $_POST['cat_top'];

              if(is_uploaded_file($_FILES['cat_image']['tmp_name'])){
              
                $cat_image = $_FILES['cat_image']['name'];
                
                $temp_name = $_FILES['cat_image']['tmp_name'];
                
                $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top',cat_image='$cat_image' where cat_id='$cat_id'";
                
                $run_cat = mysqli_query($con,$update_cat);
                
                if($run_cat){
                    
                    echo "<script>alert('หมวดหมู่ได้รับการอัปเดต')</script>";
                    
                    echo "<script>window.open('index.php?view_cats','_self')</script>";
                    
                }

              }else{
                
                $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top' where cat_id='$cat_id'";
                
                $run_cat = mysqli_query($con,$update_cat);
                
                if($run_cat){
                    
                    echo "<script>alert('หมวดหมู่ได้รับการอัปเดต')</script>";
                    
                    echo "<script>window.open('index.php?view_cats','_self')</script>";
                    
                }

              }
              
          }

?>



<?php } ?> 