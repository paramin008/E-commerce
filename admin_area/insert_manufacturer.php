<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / เพิ่มผู้ผลิต
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> เพิ่มผู้ผลิต
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                            ชื่อผู้ผลิต 
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input name="manufacturer_name" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                             เลือกเป็นผู้ผลิตชั้นนำ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input name="manufacturer_top" type="radio" value="yes">
                            <label>ใช่</label>
                        
                            <input name="manufacturer_top" type="radio" value="no">
                            <label>ไม่</label>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        รูปภาพ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input type="file" name="manufacturer_image" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        <div class="col-md-6">
                        
                            <input type="submit" name="submit" value="ยืนยัน" class="btn btn-primary form-control">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

    if(isset($_POST['submit'])){
        
        $manufacturer_name = $_POST['manufacturer_name'];
        
        $manufacturer_top = $_POST['manufacturer_top'];
        
        $manufacturer_image = $_FILES['manufacturer_image']['name'];
        
        $temp_name = $_FILES['manufacturer_image']['tmp_name'];
            
        move_uploaded_file($temp_name,"other_images/$manufacturer_image");
        
        $insert_manufacturer = "insert into manufacturers (manufacturer_title,manufacturer_top,manufacturer_image) values ('$manufacturer_name','$manufacturer_top','$manufacturer_image')";
        
        $run_manufacturer = mysqli_query($con,$insert_manufacturer);
        
        echo "<script>alert('เพิ่มผู้ผลิตเรียบร้อย')</script>";
        
        echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
        
    }

?>

<?php } ?>