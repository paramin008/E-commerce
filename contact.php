<?php 
    
    $active='ติดต่อเรา';
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
                    ติดต่อเรา
                </li>
            </ul>

        </div>

        <div class="col-md-12">

            <div class="box">

                <div class="box-header">




                    <form class="well form-horizontal" action="contact.php" method="post" id="contact_form">
                        <fieldset>

                            <legend>
                                <center>
                                    <h3>
                                        ติดต่อเรา
                                    </h3>

                                </center>
                            </legend><br>


                            <div class="form-group">
                                <label class="col-md-4 control-label">ชื่อ</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="bi bi-person"></i></span>
                                        <input name="name" required class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">อีเมล</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="bi bi-envelope"></i></span>
                                        <input name="email" required class="form-control" type="email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">หัวข้อ</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="bi bi-pencil"></i></span>
                                        <input name="subject" required class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ข้อความ</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="bi bi-file-earmark-font"></i></span>
                                        <textarea name="message" class="form-control" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">

                                <button type="submit" name="submit" class="btn btn-primary">

                                    <i class="fa fa-user-md"></i> ส่งข้อความ

                                </button>

                            </div>

                        </fieldset>
                    </form>

                    </form>

                    <?php 
                       
                       if(isset($_POST['submit'])){
                           
                          
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "Spcworm222@gmail.com";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           
                           
                           $email = $_POST['email'];
                           
                           $subject = "ยินดีต้อนรับสู่เว็บไซต์";
                           
                           $msg = "ขอบคุณที่ส่งข้อความถึงเรา โดยเร็วเราจะตอบกลับข้อความของคุณ";
                           
                           $from = "";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'> ข้อความของคุณส่งสำเร็จแล้ว </h2>";
                           
                       }
                       
                       ?>

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
</body>

</html>