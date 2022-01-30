<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['edit_term'])){

    $edit_id = $_GET['edit_term'];
    $get_term = "select * from terms where term_id='$edit_id'";
    $run_term = mysqli_query($con,$get_term);
    $row_term = mysqli_fetch_array($run_term);
    $term_id = $row_term['term_id'];
    $term_title = $row_term['term_title'];
    $term_desc = $row_term['term_desc'];
    $term_link = $row_term['term_link'];

}

?>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> ควบคุม / แก้ไขข้อกำหนด
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> แก้ไขข้อกำหนด
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ชื่อข้อกำหนด </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $term_title; ?>" name="term_title" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Term Link </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $term_link; ?>" name="term_link" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> คำอธิบายข้อกำหนด </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="term_desc" cols="19" rows="6" class="form-control">
                          
                          <?php echo $term_desc; ?>
                          
                          </textarea>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="update" value="อัปเดตข้อกำหนด" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>

<?php 

if(isset($_POST['update'])){

    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc'];
    $update_term = "update terms set term_title='$term_title',term_link='$term_link',term_desc='$term_desc' where term_id='$term_id'";
    $run_term = mysqli_query($con,$update_term);

    if($run_term){

        echo "<script>alert('ข้อกำหนดได้รับการอัปเดตแล้ว')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";

    }
    
}

?>

    <?php } ?>
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>