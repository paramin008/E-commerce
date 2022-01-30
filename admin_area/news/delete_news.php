<?php 

 if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('../login.php','_self')</script>";
    
}else{

?>

<?php 

include('../includes/db.php');

$delete_news = null;

        if (isset($_GET["delete_news"]))
    {
        $delete_news = $_GET["delete_news"];
    }
        $sql = "delete from webboard where QuestionID = '".$delete_news."' ";

        

        $query = mysqli_query($con,$sql);

        if($query){
            
            echo "<script>alert('ลบกระทู้เรียบร้อยแล้ว')</script>";
            
            echo "<script>window.open('index.php?view_news','_self')</script>";
            
        }
       
?>




<?php } ?>