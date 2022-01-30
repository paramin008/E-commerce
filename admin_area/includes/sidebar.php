<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            
            <span class="sr-only"></span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        
        <a href="index.php?dashboard" class="navbar-brand">ระบบจัดการหลังบ้าน</a>
        
    </div>
    
    <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>
                
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        
                        <i class="fa fa-fw fa-user"></i> ข้อมูลส่วนตัว
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_products">
                        
                        <i class="fa fa-fw fa-envelope"></i>สินค้า
                        
                        <span class="badge"><?php echo $count_products; ?></span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_customers">
                        
                        <i class="fa fa-fw fa-users"></i> ลูกค้า
                        
                        <span class="badge"><?php echo $count_customers; ?></span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_cats">
                        
                        <i class="fa fa-fw fa-gear"></i>หมวดหมู่สินค้า
                        
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                        
                    </a>
                </li>
                
                <li class="divider"></li>
                
                <li>
                    <a href="logout.php">
                        
                        <i class="fa fa-fw fa-power-off"></i> ออกจากระบบ
                        
                    </a>
                </li>
                
            </ul>
            
        </li>
        
    </ul>
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                        
                        <i class="fa fa-fw fa-dashboard"></i> ควบคุม
                        
                </a>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        
                        <i class="fa fa-fw fa-tag"></i> สินค้า
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product"> เพิ่มสินค้า </a>
                    </li>
                    <li>
                        <a href="index.php?view_products"> ดูสินค้า </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#manufacturer">
                        
                        <i class="fa fa-fw fa-star"></i> ผู้ผลิต
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="manufacturer" class="collapse">
                    <li>
                        <a href="index.php?insert_manufacturer"> เพิ่มผู้ผลิต </a>
                    </li>
                    <li>
                        <a href="index.php?view_manufacturers"> ดูผู้ผลิต </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                        
                        <i class="fa fa-fw fa-edit"></i> หมวดหมู่สินค้า
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat"> เพิ่มหวดหมู่สินค้า </a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats"> ดูหมวดหมู่สินค้า </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                        
                        <i class="fa fa-fw fa-book"></i> ประเภท
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat"> เพิ่มประเภท </a>
                    </li>
                    <li>
                        <a href="index.php?view_cats"> ดูประเภท </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                        
                        <i class="fa fa-fw fa-gear"></i> สไลค์
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide"> เพิ่มสไลด์ </a>
                    </li>
                    <li>
                        <a href="index.php?view_slides"> ดูสไลด์ </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#boxes">
                        
                        <i class="fa fa-fw fa-dropbox"></i> กล่องข้อความ
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="boxes" class="collapse">
                    <li>
                        <a href="index.php?insert_box"> เพิ่มกล่องข้อความ </a>
                    </li>
                    <li>
                        <a href="index.php?view_boxes"> ดูกล่องข้อความ </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#coupon">
                        
                        <i class="fa fa-fw fa-book"></i> คูปอง
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="coupon" class="collapse">
                    <li>
                        <a href="index.php?insert_coupon"> เพิ่มคูปอง </a>
                    </li>
                    <li>
                        <a href="index.php?view_coupons"> ดูคูปอง </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#terms">
                        
                        <i class="fa fa-fw fa-table"></i> ข้อกำหนด
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="terms" class="collapse">
                    <li>
                        <a href="index.php?insert_terms"> เพิ่มข้อกำหนด </a>
                    </li>
                    <li>
                        <a href="index.php?view_terms"> ดูข้อกำหนด </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> ลูกค้า
                </a>
            </li>
            
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> ยอดสั่งซื้อ
                </a>
            </li>
            
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> การชำระเงิน
                </a>
            </li>
            
            <li>
                <a href="index.php?edit_css">
                    <i class="fa fa-fw fa-pencil"></i> ปรับแต่ง CSS 
                </a>
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                        
                        <i class="fa fa-fw fa-users"></i> ผู้ใช้
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> เพิ่มผู้ใช้ </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> ดูผู้ใช้ </a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> แก้ไขข้อมูลส่วนตัว </a>
                    </li>
                </ul>
             
            </li>
          
            <li>
                <a href="index.php?view_news">
                    <i class="fa fa-newspaper-o"></i>&nbsp; จัดการกระทู้
                </a>
            </li>
            
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> ออกจากระบบ
                </a>
            </li>
            
        </ul>
    </div>
    
</nav>


<?php } ?>