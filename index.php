<?php include "parts/_header.php" ?>
<main>
	
<?php 
    if(isset($_SESSION['user_id'])):
		if($_SESSION['user_type']==0):
	?>
	<h2>Companies Application:</h2>
	<a href=""></a>
	<img src="" alt="">
	<p></p>
	<?php  endif; ?>
	<?php	else:
	?>
    <h2 class ="ll" id="ll">
		Login page </h2>
	<?php 
		endif;
		?>
    <body>
	<div>
	<?php 
	//find in the id ueser
    if(isset($_SESSION['user_id'])):
		//find in the id student 
		if(isset($_SESSION['student_id'])){
			// my sql in show all display_name and application_status
        $mysql = "select u.display_name,a.application_status
					 from students_applications a,student s,users u 
					 where s.user_id=$_SESSION[user_id] 
					 and a.student_id=$_SESSION[student_id] 
					 and u.id=a.requested_by ";
        //input mysql
		$exe=$pdo->prepare($mysql); 
		//exu mysql
        $exe->execute(); 
		
		$table_stu_app=$exe->fetchAll();
		if($table_stu_app){
			//
		for($i=0; $i<count($table_stu_app); $i++){
			//
			$j=0;
			//
			echo $table_stu_app[$i][$j]."<br>";
			//
			$j++;
			$x=$j-1;
			//
			if($table_stu_app[$i][$j]=='0'){
				//
				echo "Rejected!";
				//
			}
			else 
			if($table_stu_app[$i][$j]==null){
				echo "<a href=reject.php?requested_by=".$table_stu_app[$i][$x].">Reject</a>"." &nbsp;&nbsp; <a href=accept.php?requested_by=".$students_applications[$i][$x].">Accept</a>";
			}else{
				echo "Accepted!";
			}
		}
	}
}
	
	if($_SESSION['user_type']==1){
		echo "You are a company";
	}
?>

</div>
<?php else : ?>
		<?php 
		if(isset($_GET['wrong_pass'])){
			echo "<h3 style='color:red'>Ops the error in login , try again
			 </h3><br><p style='color:red'>Wrong Password or username</p>";
	}
		
		?>
		<div style="display:flex; flex-direction:row; gap:20em">
		<form action="_login.php" method="POST">
				<table>
					<tr>
						<td><label> Username </label></td>
						<td><input type="text" name="username" value=<?php 
									if(isset($_SESSION['wrong_user_name'])){
										echo "\"$_SESSION[wrong_user_name]\"";
								}
								else
								echo "\"\""
								?>></td>
						</tr>
						<tr>
							<td><label > Password </label></td>
							<td><input type="password" name="pass" value=<?php 
									if(isset($_SESSION['password'])){
										echo "\"$_SESSION[password]\"";
								}
								else?>></td>
						</tr>
						<tr>
							<td><input type="submit" value="Login"> <br></td>
						</tr>
			<?php endif ?>
			<!-- close input login -->
			</table>
		</form>

		<!-- select in id  -->
		<?php 
			if(!isset($_SESSION['user_id'])):
		?>
	<aside>
		<h2>Aside</h2>
		<p>
			The aside will have information related to the current page or ads.
		</p>
	</aside>
	<!-- end in the consetion -->
	<?php
	 endif 
	?>
</div>
	</body>
    
</main>

<?php include "parts/_footer.php" ?>

