
     
      
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
               
               <h4>หน้า</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="cart.php">ตะกร้าสินค้า</a></li>
                    <li><a href="contact.php">ติดต่อเรา</a></li>
                    <li><a href="shop.php">สินค้า</a></li>
                    <li><a href="customer/my_account.php">บัญชี</a></li>
                </ul>
                
                <hr>
                
                <h4>ส่วนของผู้ใช้</h4>
                
                <ul>
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>เข้าสู่ระบบ</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>บัญชี</a>"; 
                               
                           }
                           
                           ?>
                    
                    <li><a href="customer_register.php">สมัครสมาชิก</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                </ul>
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>
            
            <div class="com-sm-6 col-md-3">
                
                <h4>สินค้ายอดนิยม</h4>
                
                <ul>
                    <?php 
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                
                </ul>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                
                <h4>ติดต่อ</h4>
                
                <p>
                    <strong>SPC WORM</strong>
                    <br/>0928195249
                    <br/>Spcworm222@gmail.com
                    
                    
                </p>
                
                <a href="contact.php">ติดต่อเรา</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                
                <h4>รับข่าวสาร</h4>
                
                
                <p class="social">
                <br>
                    <a href="https://www.facebook.com/SriPrachonworm" class="fa fa-facebook"></a>
            
                </p>
                
                <hr>
            
            </div>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            
            <p class="pull-left">&copy; 2021 Paramin All Rights Reserve</p>
            
        </div>
        <div class="col-md-6">
            
       
            
        </div>
    </div>
</div>
<!-- Messenger ปลั๊กอินแชท Code -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your ปลั๊กอินแชท code -->
      <div class="fb-customerchat"
        attribution="page_inbox"
        page_id="103214215255803">
      </div>