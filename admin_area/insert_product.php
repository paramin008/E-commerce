<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> ควบคุม / เพิ่มสินค้า
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> เพิ่มสินค้า 
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ชื่อสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_title" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Product Url </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_url" type="text" class="form-control" required>

                          <br>

                          <p style="font-weight:bold;font-style:italic;font-size:16px;"> Use Dash '-' for url </p>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ผู้ผลิต </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="manufacturer" class="form-control">
                              
                              <option selected disabled> เลือกผู้ผลิต </option>
                              
                              <?php 
                              
                              $get_manufacturer = "select * from manufacturers";
                              $run_manufacturer = mysqli_query($con,$get_manufacturer);
                              
                              while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                                  
                                  $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                  $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                  
                                  echo "
                                  
                                  <option value='$manufacturer_id'> $manufacturer_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ประเภทสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="product_cat" class="form-control">
                              
                              <option selected disabled> เลือกประเภทสินค้า </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ประเภท </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="cat" class="form-control">
                              
                              <option selected disabled> เลือกประเภท </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">รูปที่ 1 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img1" type="file" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">  รูปที่ 2 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> รูปที่ 3 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ราคาสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_price" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ลดราคา </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_sale" type="text" class="form-control">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> คำสำคัญสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_keywords" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   
                   <div class="form-group">
                       
                       <label class="col-md-3 control-label"> คำอธิบายสินค้า </label> 
                       
                       <div class="col-md-6">
                           
                           <ul class="nav nav-tabs">
                             <li class="active">
                                 <a data-toggle="tab" href="#descriptions" class="tab_link">
                                 คำอธิบายสินค้า
                                 </a>
                             </li>
                             <li>
                                 <a data-toggle="tab" href="#features" class="tab_link">
                                 คุณสมบัติของสินค้า
                                 </a>
                             </li>
                             <li>
                                 <a data-toggle="tab" href="#videos" class="tab_link">
                                 วิดีโอสินค้า
                                 </a>
                                 
                             </li>
                         </ul>
 
                         
 
                         <div class="tab-content">
 
                             <div class="tab-pane fade in active" id="descriptions"> 
 
                                 <textarea name="product_desc" id="desc_editor" class="form-control">
                                  
                                 </textarea>
                             
                             </div> 
 
                             <div class="tab-pane fade in" id="features"> 
 
                                 <textarea name="product_features" id="features_editor" class="form-control">
                                     
                                 </textarea>
 
                             </div> 
 
                             <div class="tab-pane fade in" id="videos"> 
 
                                 <textarea rows="10" name="product_video" id="videos" class="form-control">
                                    
                                 </textarea>
 
                             </div> 
 
                         </div>
 
                         
                           
                       </div>
                        
                    </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ป้ายสินค้า </label> 
                      
                      <div class="col-md-6">

                        <select name="product_label">
                        
                            <option selected disabled> เลือก </option>
                        
                            <option value="new">New Product</option>
                        
                            <option value="sale">Sale Product</option> 

                        </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="ยืนยัน" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $product_title = $_POST['product_title'];
    $product_url = $_POST['product_url'];
    $product_cat = $_POST['product_cat'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_sale = $_POST['product_sale'];
    $product_label = $_POST['product_label'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    $insert_product = "insert into products (
        p_cat_id,
        cat_id,
        manufacturer_id,
        date,product_title,
        product_url,
        product_img1,
        product_img2,
        product_img3,
        product_price,
        product_keywords,
        product_desc,
        product_label,
        product_sale,
        product_features,
        product_video
        ) 

    values (
        '$product_cat',
        '$cat',
        '$manufacturer_id'
        ,NOW(),
        '$product_title',
        '$product_url',
        '$product_img1',
        '$product_img2',
        '$product_img3',
        '$product_price',
        '$product_keywords',
        '$product_desc',
        '$product_label',
        '$product_sale',
        '$product_features',
        '$product_video'
        )";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('เพิ่มสินค้าเรียบร้อย')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
    }
    
}

?>


<?php } ?>