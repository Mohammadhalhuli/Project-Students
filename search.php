<?php include "parts/_header.php" ?>
<?php
//echo $student_major;
//echo $student_city;
?>
<?php if ($_SERVER['REQUEST_METHOD'] == "POST"){
  //find
      header("Location: students.php?major=".$_POST['search_student']."&city=".$_POST['city']);
}
?>
 <?php include "parts/_footer.php" ?>