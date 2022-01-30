<?php
include('db.php');
if(isset($_GET["Action"]))
	{
		if($_GET["Action"] == "Save")
	
	$sql = "INSERT INTO reply ";
	$sql .="(QuestionID,CreateDate,Details,Name) ";
	$sql .="VALUES ";
	$sql .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$query = mysqli_query($con,$sql);
	

	$sql = "UPDATE webboard ";
	$sql .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	$query = mysqli_query($con,$sql);	
    if($query){
        echo "<script>alert('เรียบร้อย')</script>";
        echo "<script>window.open('viewnews.php?'".$_GET["QuestionID"]."'','_self')</script>";
    }

}
?>
<?php

$sql = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$query = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
$result = mysqli_fetch_array($query);


$sql = "UPDATE webboard ";
$sql .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$query = mysqli_query($con,$sql)	
	
?>


<table   cellpadding="1"  class="table table-bordered" cellspacing="1">
  <tr>
    <td colspan="2"><center><h3><div class='text-dark'>เรื่อง : <?php echo $result["Question"];?></h3></center></td></div>
  </tr>
  <tr>
    <td  colspan="2"><div class='text-dark'>รายละเอียด : <?php echo nl2br($result["Details"]);?> </td></div>
  </tr>
  <tr class='text-dark'>
    <td>ชื่อ : <?php echo $result["Name"];?> เวลาตั้งกระทู้ : <?php echo $result["CreateDate"];?></td>
    <td >คนดู : <?php echo $result["View"];?> การตอบกลับ : <?php echo $result["Reply"];?></td>
  </tr>
</table>
<br>
<br>
<?php
$intRows = 0;
$sql2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$query2 = mysqli_query($con,$sql2) or die ("Error Query [".$strSQL."]");
while($result2 = mysqli_fetch_array($query2))
{
	$intRows++;
?> <div class='text-dark'>No : <?php echo $intRows;?></div>
<table cellpadding="1" class="table table-bordered border-primary" cellspacing="1">
  <tr class='text-dark'>
    <td colspan="2"><?php echo  ($result2["Details"]);?></td>
  </tr>
  <tr class='text-dark'>
    <td>ชื่อ :
        <?php echo $result2["Name"];?>      </td>
    <td>เวลาที่ตอบกระทู้ :
    <?php echo $result2["CreateDate"];?></td>
  </tr>
</table><br>
<?php
}
?>
<br>
 <br>
<br>
<form action="viewnews.php?QuestionID=<?php echo $_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
  <table  cellpadding="1" class="table table-bordered" cellspacing="1">
    <tr class='text-dark'>
      <td width="78">รายละเอียด</td>
      <td><textarea name="txtDetails"   class="form-control" cols="10" rows="2" id="txtDetails"></textarea></td>
    </tr>
    <tr class='text-dark'>
      <td width="78">ชื่อ</td>
      <td width="347"><input name="txtName"  class='col-md-4'    type="text" id="txtName"  value="" ></td>
    </tr>
  </table>
  
  <center><input name="btnSave"  class="btn btn-primary" type="submit" id="btnSave" value="ยืนยัน"></center>
</form>
