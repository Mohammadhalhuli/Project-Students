<?php include "parts/_header.php" ?>

<?php
//in accept class
$mysql = "select c.id from company 
c where c.name='".$_GET['requested_by']."'";//my sql
$acc_stmt = $pdo->prepare($sql);//exete sql
$acc_stmt->execute();//exete sql
$company_id=$acc_stmt->fetch();//exete sql
               
$mysql = "update students_applications 
set application_status=1 
 where company_id=".$company_id['id']."
  and student_id=".$_SESSION['student_id'];//my sql
$acc_stmt = $pdo->prepare($sql);//exete sql
$acc_stmt->execute();//exete sql
 header("Location:/");//to locatin
?>


<?php include "parts/_footer.php" ?>