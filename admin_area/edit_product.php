<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $p_title = $row_edit['product_title'];
        
        $p_url = $row_edit['product_url'];
        
        $p_cat = $row_edit['p_cat_id'];
        
        $cat = $row_edit['cat_id'];

        $m_id = $row_edit['manufacturer_id'];
        
        $p_image1 = $row_edit['product_img1'];
        
        $p_image2 = $row_edit['product_img2'];
        
        $p_image3 = $row_edit['product_img3'];
        
        $p_price = $row_edit['product_price'];
        
        $p_sale = $row_edit['product_sale'];
        
        $p_keywords = $row_edit['product_keywords'];
        
        $p_desc = $row_edit['product_desc'];
        
        $p_label = $row_edit['product_label'];

        $p_features = $row_edit['product_features'];

        $p_video = $row_edit['product_video'];
        
    }
        
        $get_manufacturer = "select * from manufacturers where manufacturer_id='$m_id'";
        
        $run_manufacturer = mysqli_query($con,$get_manufacturer);
        
        $row_manufacturer = mysqli_fetch_array($run_manufacturer);
        
        $manufacturer_id = $row_manufacturer['manufacturer_id'];
        
        $manufacturer_title = $row_manufacturer['manufacturer_title'];
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $get_cat = "select * from categories where cat_id='$cat'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> ควบคุม / แก้ไขสินค้า
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> แก้ไขสินค้า
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ชื่อสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">  Url สินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_url" type="text" class="form-control" required value="<?php echo $p_url; ?>">

                            <br>

                            <p style="font-weight:bold;font-style:italic;font-size:16px;"> ใช้เครื่องหมาย '-' for url. | Example: ขนมหมา-น้อย </p>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ผู้ผลิต </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="manufacturer" class="form-control">

                              <option disabled value="Select Manufacturer">เลือกผู้ผลิต</option>
                              
                              <option selected value="<?php echo $manufacturer_id; ?>"> <?php echo $manufacturer_title; ?> </option>
                              
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

                              <option disabled value="Select Product Category">เลือกประเภทสินค้า</option>       
                              
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              
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

                              <option disabled value="Select Category">เลือกประเภท</option>
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
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
                       
                      <label class="col-md-3 control-label"> รูปภาพที่ 1 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img1" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> รูปภาพที่ 2 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> รูปภาพที่ 3 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ราคาสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ลดราคา </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_sale" type="text" class="form-control" required value="<?php echo $p_sale; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> คำสำคัญสินค้า </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
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
                                    <?php echo $p_desc; ?>
                                </textarea>
                            
                            </div> 

                            <div class="tab-pane fade in" id="features"> 

                                <textarea name="product_features" id="features_editor" class="form-control">
                                    <?php echo $p_features; ?>
                                </textarea>

                            </div> 

                            <div class="tab-pane fade in" id="videos"> 

                                <textarea rows="10" name="product_video" id="videos" class="form-control">
                                    <?php echo $p_video; ?>
                                </textarea>

                            </div> 

                        </div>

                        
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> ป้ายสินค้า </label> 
                      
                      <div class="col-md-6">

                        <select name="product_label">
                        
                              <option disabled> Select Label Product </option>
                              
                              <option value="<?php echo $p_label; ?>"> <?php echo $p_label; ?> </option>
                              
                                <option value="new">New</option>

                                <option value="sale">Sale</option> 

                        </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="update" value="อัปเดตสินค้า" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#desc_editor, #features_editor'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $product_url = $_POST['product_url'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_sale = $_POST['product_sale'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_label = $_POST['product_label'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];

    if(is_uploaded_file($_FILES['file']['tmp_name'])){

           
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
        
        $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',date=NOW(),product_title='$product_title',product_url='$product_url',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc',product_sale='$product_sale',product_label='$product_label',product_features='$product_features',product_video='$product_video' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('สินค้าได้รับการอัปเดตเรียบร้อยแล้ว')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
        
    }else{

        
        $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',date=NOW(),product_title='$product_title',product_url='$product_url',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc',product_sale='$product_sale',product_label='$product_label',product_features='$product_features',product_video='$product_video' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('สินค้าได้รับการอัปเดตเรียบร้อยแล้ว')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
    }
    
}

?>


<?php } ?>