<?php 

    $active='ตะกร้าสินค้า';
    include("includes/header.php");

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li>
                    <a href="index.php">หน้าแรก</a>
                </li>
                <li>
                    ตะกร้าสินค้า
                </li>
            </ul>

        </div>

        <div id="cart" class="col-md-9">

            <div class="box">

                <form action="cart.php" method="post" enctype="multipart/form-data">

                    <h1>ตะกร้าสินค้า</h1>

                    <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>

                    <p class="text-muted">คุณมีสินค้าในตะกร้าทั้งหมด <?php echo $count; ?></p>

                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th colspan="2">สินค้า</th>
                                    <th>จำนวน</th>
                                    <th>ราคาต่อชิ้น</th>
                                    <th>ขนาด</th>
                                    <th colspan="1">ลบ</th>
                                    <th colspan="2">ราคารวม</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_size = $row_cart['size'];
                                       
                                     $pro_qty = $row_cart['qty'];

                                     $pro_sale = $row_cart['p_price'];
                                       
                                       $get_products = "select * from products where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_img1 = $row_products['product_img1'];
                                           
                                           $only_price = $row_products['product_price'];
                                           
                                           $pro_url = $row_products['product_url'];
                                           
                                           $sub_total = $pro_sale*$pro_qty;

                                           $_SESSION['pro_qty'] = $pro_qty;
                                           
                                           $total += $sub_total;
                                           
                                   ?>

                                <tr>

                                    <td>

                                        <img class="img-responsive"
                                            src="admin_area/product_images/<?php echo $product_img1; ?>"
                                            alt="Product 3a">

                                    </td>

                                    <td>

                                        <a href="<?php echo $pro_url; ?>"> <?php echo $product_title; ?> </a>

                                    </td>

                                    <td>

                                        <input type="text" name="quantity" data-product_id="<?php echo $pro_id; ?>"
                                            value="<?php echo $_SESSION['pro_qty']; ?>" class="quantity form-control">

                                    </td>

                                    <td>

                                        <?php echo $pro_sale; ?>

                                    </td>

                                    <td>

                                        <?php echo $pro_size; ?>

                                    </td>

                                    <td>

                                        <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

                                    </td>

                                    <td>

                                        $<?php echo $sub_total; ?>

                                    </td>

                                </tr>

                                <?php } } ?>

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th colspan="5">ราคารวม</th>
                                    <th colspan="2">$<?php echo $total; ?></th>

                                </tr>

                            </tfoot>

                        </table>

                        <div class="form-inline pull-right">
                            <div class="form-group">

                                <label> คูปอง: </label>
                                <input type="text" name="code" class="form-control">
                                <input type="submit" class="btn btn-primary" value="ใช้คูปอง" name="apply_coupon">

                            </div>
                        </div>

                    </div>

                    <div class="box-footer">

                        <div class="pull-left">

                            <a href="index.php" class="btn btn-default">

                                <i class="fa fa-chevron-left"></i> กลับไปหน้าซื้อสินค้า

                            </a>

                        </div>

                        <div class="pull-right">

                            <button type="submit" name="update" value="Update Cart" class="btn btn-default">

                                <i class="fa fa-refresh"></i> อัปเดตตะกร้าสินค้า


                            </button>

                            <a href="checkout.php" class="btn btn-primary">

                                ชำระสินค้า <i class="fa fa-chevron-right"></i>

                            </a>

                        </div>

                    </div>

                </form>

            </div>

            <?php 
               
                    if(isset($_POST['apply_coupon'])){

                        $code = $_POST['code'];

                        if($code == ""){

                        }else{

                            $get_coupons = "select * from coupons where coupon_code='$code'";
                            $run_coupons = mysqli_query($con,$get_coupons);
                            $check_coupons = mysqli_num_rows($run_coupons);

                            if($check_coupons == "1"){

                                $row_coupons = mysqli_fetch_array($run_coupons);

                                $coupon_pro_id = $row_coupons['product_id'];
                                $coupon_price = $row_coupons['coupon_price'];
                                $coupon_limit = $row_coupons['coupon_limit'];
                                $coupon_used = $row_coupons['coupon_used'];

                                if($coupon_limit == $coupon_used){

                                    echo "<script>alert('คูปองของคุณหมดอายุแล้ว')</script>";

                                }else{

                                    $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                                    $run_cart = mysqli_query($con,$get_cart);
                                    $check_cart = mysqli_num_rows($run_cart);

                                    if($check_cart == "1"){

                                        $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                                        $run_used = mysqli_query($con,$add_used);
                                        $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                                        $run_update_cart = mysqli_query($con,$update_cart);

                                        echo "<script>alert('คูปองของคุณถูกนำไปใช้แล้ว')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";

                                    }else{

                                        
                                        echo "<script>alert('คูปองของคุณไม่ตรงกับสินค้าของคุณในตะกร้าสินค้าของคุณ')</script>";

                                    }

                                }

                            }else{

                                echo "<script>alert('คูปองของคุณไม่ถูกต้อง')</script>";

                            }

                        }

                    }
               
               ?>

            <?php 
               
                function update_cart(){
                    
                    global $con;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>

           
        </div>

        <div class="col-md-3">

            <div id="order-summary" class="box">

                <div class="box-header">

                    <h3>สรุปคำสั่งซื้อ</h3>

                </div>

                <p class="text-muted">

                    ค่าขนส่งและค่าใช้จ่ายเพิ่มเติมคำนวณตามมูลค่าที่คุณป้อน

                </p>

                <div class="table-responsive">

                    <table class="table">

                        <tbody>

                            <tr>

                                <td> สั่งซื้อผลรวมย่อยทั้งหมด </td>
                                <th> <?php echo $total; ?> บาท </th>

                            </tr>

                            <tr>

                                <td> ค่าขนส่ง </td>
                                <td> 0 บาท </td>

                            </tr>

                            <tr>

                                <td> ภาษีมูลค่าเพิ่ม </td>
                                <th> 0 บาท </th>

                            </tr>

                            <tr class="total">

                            <p>    <td> รวมเป็นเงิน </td>
                                <th> <?php echo $total; ?> บาท </th></p>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
</div>

<?php 
    
    include("includes/footer.php");
    
    ?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

<script>
$(document).ready(function(data) {

    $(document).on('keyup', '.quantity', function() {

        var id = $(this).data("product_id");
        var quantity = $(this).val();

        if (quantity != '') {

            $.ajax({

                url: "change.php",
                method: "POST",
                data: {
                    id: id,
                    quantity: quantity
                },

                success: function() {
                    $("body").load("cart_body.php");
                }

            });

        }

    });

});
</script>


</body>

</html>