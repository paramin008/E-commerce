<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

         
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

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> ควบคุม / หมวดหมู่
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-tags fa-fw"></i> จัดการกระทู้
                
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr>
                                <th> ลำดับ </th>
                                <th> หัวข้อ </th>
                                <th> ผู้ลง </th>
                                <th> เวลา </th>
                                <th> จำนวนคนดู </th>
                                <th> จำนวนคนตอบกลับ </th>
                                <th> ลบกระทู้ </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                        <?php
while($result = mysqli_fetch_array($query))    
{
?>
                            
                            <tr>
          <td class='text-dark'><p> <?php echo $result["QuestionID"]; ?></p> </td>
          <td> <a class='text-primary' href="index.php?QuestionID=<?php echo $result["QuestionID"] ?>"> <?php echo $result["Question"]; ?></a> </td>
          <td class='text-dark'><?php echo $result["Name"]; ?></td>
          <td class='text-dark'><?php echo $result["CreateDate"]; ?></td>
          <td class='text-dark'><?php echo $result["View"]; ?></td>
          <td class='text-dark'><?php echo $result["Reply"]; ?></td>
          <td align="center">

         
	<a href="index.php?delete_news=<?php echo $result["QuestionID"];?>"><i class="fa fa-trash"></i> ลบ</a>
      </tr>
                            <?php } ?>
                        
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php } ?>