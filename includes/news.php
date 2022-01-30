
<?php 
    include ('db.php');
    $sql = "select * from webboard";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_array($query);
    $num_row = mysqli_num_rows($query);

        $per_page = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            }
            else
            {
                $page = 1;
            }

            $Prev_Page = $page-1;
            $Next_Page = $page+1;

            $page_Start = (($per_page*$page)-$per_page);
            if($num_row<=$per_page)
            {
                $Num_Pages = 1;
            }
            else if (($num_row % $per_page)==0)
            {
                $Num_Pages = ($num_row/$per_page);
            }
            else
            {
                $Num_Pages = ($num_row/$per_page)+1;
                $Num_Pages = (int)$Num_Pages;
            }

    $sql .= " order by QuestionID DESC LIMIT  $page_Start , $per_page";
 
    
    $query = mysqli_query($con,$sql);
?> 

            <table class='table'>
                <tbody>
                    <tr class='text-dark'>
                        <td>ลำดับ</td>
                        <td>หัวข้อ</td>
                        <td>ผู้ลง</td>
                        <td>เวลา</td>
                        <td>จำนวนคนดู</td>
                        <td>จำนวนคนตอบ</td>
                    </tr>
                    <?php
while($result = mysqli_fetch_array($query))    
{
?>
      <tr>
          <td class='text-dark'> <?php echo $result["QuestionID"]; ?> </td>
          <td> <a class='text-primary' href="viewnews.php?QuestionID=<?php echo $result["QuestionID"] ?>"> <?php echo $result["Question"]; ?></a> </td>
          <td class='text-dark'><?php echo $result["Name"]; ?></td>
          <td class='text-dark'><?php echo $result["CreateDate"]; ?></td>
          <td class='text-dark'><?php echo $result["View"]; ?></td>
          <td class='text-dark'><?php echo $result["Reply"]; ?></td>
      </tr>
      <?php } ?>
  </tbody>
</table>