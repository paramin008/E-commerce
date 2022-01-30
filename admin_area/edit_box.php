<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_box'])){
        
        $edit_box_id = $_GET['edit_box'];
        
        $edit_box_query = "select * from boxes_section where box_id='$edit_box_id'";
        
        $run_edit_box = mysqli_query($con,$edit_box_query);
        
        $row_edit_box = mysqli_fetch_array($run_edit_box);
        
        $box_id = $row_edit_box['box_id'];
        
        $box_title = $row_edit_box['box_title'];
        
        $box_desc = $row_edit_box['box_desc'];
        
    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / แก้ไขกล่องข้อความ
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> แก้ไขกล่องข้อความ
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        ชื่อกล่องข้อความ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input value=" <?php echo $box_title; ?> " name="box_title" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        คำอธิบายกล่องข้อความ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="box_desc" class="form-control"><?php echo $box_desc; ?></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                             
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="Update Box" name="update_box" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['update_box'])){
              
              $box_title = $_POST['box_title'];
              
              $box_desc = $_POST['box_desc'];
              
              $update_box = "update boxes_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";
              
              $run_box = mysqli_query($con,$update_box);
              
              if($run_box){
                  
                  echo "<script>alert('กล่องข้อความได้รับการอัปเดตแล้ว')</script>";
                  
                  echo "<script>window.open('index.php?view_boxes','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 