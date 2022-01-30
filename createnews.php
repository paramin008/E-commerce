<?php 
    
    $active='บอร์ดสนทนา';
    include("includes/header.php");
include('includes/db.php');

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li>
                    <a href="index.php">หน้าแรก</a>
                </li>
                <li>
                บอร์ดสนทนา
                </li>
            </ul>

        </div>


    </div>
</div>
<div id="hot">

    <div class="box3">

        <div class="container">

            <div class="col-md-12">
<center>
                <h3>
                   ตั้งกระทู้ใหม่
                </h3>
                </center>
            </div>

        </div>

    </div>


</div>
<div id="content" class="container">

<div class="row">

<div class='col-md-12'>
        
        <div class='product'>
        <p class='col-md-12'>
                
              

            </p>
  
<?php 
 if(isset($_GET["Action"]))
{
    if($_GET["Action"] == "Save")

$sql = "INSERT INTO webboard ";
$sql .="(CreateDate,Question,Details,Name) ";
$sql .="VALUES ";
$sql .="('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
$query = mysqli_query($con,$sql);

    if($query){
        echo "<script>alert('เรียบร้อย')</script>";
        echo "<script>window.open('news.php','_self')</script>";
    }

}
?>

    <form action="createnews.php?Action=Save" method="post" name="frmMain" enctype="multipart/form-data" id="frmMain">
        <table class='table'> 
            <tr class='text-dark'>
                <td>หัวข้อ</td>
                <td><input name="txtQuestion" type="text" class="form-control" id="txtQuestion" > </td>
            </tr>
            <tr class='text-dark'>
                <td>รายละเอียด</td>
                <td>
                <textarea name="txtDetails" class="form-control" id="txtDetails"></textarea>
                </td>
            <tr class='text-dark'>
            <td>ชื่อ</td>
                <td><input name="txtName" type="text" class="form-control" id="txtName" > </td>
            </tr>
            </tr>
        </table>
        <center>  <input name="btnSave" class="btn btn-primary" type="submit" id="btnSave" value="บันทึก"></center>  
    </form>
    
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