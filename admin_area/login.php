<?php 
    session_start();
    include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
</head>

<body>

    <div class="wrapper fadeInDown">

        <div id="formContent">
            <div class="fadeIn first">

                <i class="fa fa-user fa-4x"></i>

                <br>

            </div>

            <form action="" class="form-login" method="post">

                <input type="email" id="login" class="fadeIn second" placeholder="อีเมล" name="admin_email" required=""
                    oninvalid="this.setCustomValidity('กรุณาใส่อีเมล')" oninput="setCustomValidity('')">

                <input type="password" id="password" class="fadeIn third" placeholder="รหัสผ่าน" name="admin_pass"
                    required="" oninvalid="this.setCustomValidity('กรุณาใส่รหัสผ่าน')" oninput="setCustomValidity('')">

                <input type="submit" class="fadeIn fourth" value="เข้าสู่ระบบ" name="admin_login">

            </form>


            <div id="formFooter">

                <a class="underlineHover" href="../">กลับ</a>

            </div>

        </div>

    </div>

</body>

</html>


<?php 

    if(isset($_POST['admin_login'])){
        
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        
        $admin_pass = mysqli_real_escape_string($con,md5 ($_POST['admin_pass']));
        
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('ยินดีต้อนรับ')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('ตรวจสอบอีเมล์หรือรหัสผ่านใหม่ !')</script>";
            
        }
        
    }

?>