<?php 

 if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('../login.php','_self')</script>";
    
}else{

?>

<?php 

include('../includes/db.php');

$delete_comment = null;

    if(isset($_GET["delete_comment"]))
    {

    $delete_comment = $_GET["delete_comment"];

    }

    $sql = "DELETE  FROM reply WHERE ReplyID = '".$delete_comment."' ";     

    $query = mysqli_query($con,$sql);

        if($query){
            
            echo "<script>alert('ลบCommentเรียบร้อย')</script>";
            
            echo "<script>window.open('index.php?view_news','_self')</script>";
            
        }
       
?>




<?php } ?>