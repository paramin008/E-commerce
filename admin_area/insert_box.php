<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / ใส่กล่องข้อความใหม่
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> ใส่กล่องข้อความใหม่
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                            ชื่อกล่องข้อความ
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <input name="box_title" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                            รายละเอียด
                        
                        </label> 
                        
                        <div class="col-md-6">
                        
                            <textarea name="box_desc" type="text" class="form-control" rows="6" cols="18"></textarea>
                        
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
        
        $box_title = $_POST['box_title'];
        $box_desc = $_POST['box_desc'];

        $insert_box ="insert into boxes_section (box_title,box_desc) values ('$box_title','$box_desc')";
        $run_box = mysqli_query($con,$insert_box);

        echo "<script>alert('ใส่กล่องข้อความใหม่แล้ว')</script>";
        echo "<script>window.open('index.php?view_boxes','_self')</script>";
        
    }

?>

<?php } ?>