<?php
	//echo $_GET['requested_by'];
	//echo $_SESSION['student_id'];
?>
<?php include "parts/_header.php" ?>
<!-- class reject -->
<?php
$req=$_GET['requested_by']
//sql
$mysql = "select c.id from company c 
		where c.name='".$req."'";
		//execut
		$exe = $pdo->prepare($mysql);
		//
		//
		//
		$exe->execute();
		//fetch in sql
        $company_id=$exe->fetch();
?>
<?php             
$mysql = "update students_applications 
			set application_status=0 
			where company_id=".$company_id['id']." 
			and student_id=".$_SESSION['student_id'];
			//execut
			$exe = $pdo->prepare($mysql);
			//
			//

			$exe->execute();
			//to Location
            header("Location:/");//log in use
?>


<?php include "parts/_footer.php" ?>