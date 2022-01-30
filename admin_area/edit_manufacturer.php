<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php  

        if(isset($_GET['edit_manufacturer'])){

            $edit_manufacturer = $_GET['edit_manufacturer'];
            $get_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer'";
            $run_manufacturer = mysqli_query($con,$get_manufacturer);
            $row_manufacturer = mysqli_fetch_array($run_manufacturer);

            $m_id = $row_manufacturer['manufacturer_id'];
            $m_title = $row_manufacturer['manufacturer_title'];
            $m_top = $row_manufacturer['manufacturer_top'];
            $m_image = $row_manufacturer['manufacturer_image'];

        }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม /อัปเดตผู้ผลิต
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> อัปเดตผู้ผลิต
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                       ขื่อผู้ผลิต
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="manufacturer_name" type="text" class="form-control" value="<?php echo $m_title; ?>">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        เลือกเป็นผู้ผลิตชั้นนำ
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="manufacturer_top" type="radio" value="yes"

                                <?php 
                                
                                    if($m_top=='no'){}else{echo "checked='checked'";}
                                
                                ?>
                            
                            >
                            <label>ใช่</label>
                        
                            <input name="manufacturer_top" type="radio" value="no"
                            
                                <?php 
                                
                                    if($m_top=='no'){echo "checked='checked'";}
                                
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
                        
                            <input type="file" name="manufacturer_image" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="other_images/<?php echo $m_image; ?>" alt="<?php echo $m_image; ?>">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"></label>
                        
                        <div class="col-md-6">
                        
                            <input type="submit" name="update" value=" อัปเดตผู้ผลิต
" class="btn btn-primary form-control">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

    if(isset($_POST['update'])){
        
        $manufacturer_name = $_POST['manufacturer_name'];
        
        $manufacturer_top = $_POST['manufacturer_top'];

        if(is_uploaded_file($_FILES['manufacturer_image']['tmp_name'])){
        
            $manufacturer_image = $_FILES['manufacturer_image']['name'];
            
            $temp_name = $_FILES['manufacturer_image']['tmp_name'];
                
            move_uploaded_file($temp_name,"other_images/$manufacturer_image");
            
            $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top',manufacturer_image='$manufacturer_image'where manufacturer_id='$m_id'" ;
            
            $run_manufacturer = mysqli_query($con,$update_manufacturer);

            if($run_manufacturer){
            
                echo "<script>alert('ผู้ผลิตได้รับการอัปเดตแล้ว')</script>";
                
                echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

            }

        }else{
            
            $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top' where manufacturer_id='$m_id'" ;
            
            $run_manufacturer = mysqli_query($con,$update_manufacturer);

            if($run_manufacturer){
            
                echo "<script>alert('ผู้ผลิตได้รับการอัปเดตแล้ว')</script>";
                
                echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

            }

        }
        
    }

?>

<?php } ?>