<?php include "parts/_header.php" ?>
<main>
	<h2> Student id --><?=$_GET['student_id'];?></h2>

	<body>
		<div style=" display:flex; flex-direction:row; gap:1em ">
		
				<?php
				$student_id = $_GET['student_id'];
				$sql = "select s.photo_path,c.c_name,s.email,s.tel,s.university,s.major,s.projects,s.interests from student s,city c where s.id=" . $student_id . " and s.city_id=c.id";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$info = $stmt->fetch();
				echo "<img src=\"./images/students/$info[photo_path]\" alt=\"student1photo\" class=\"floating\" height=\"400px\">";
				?>
				<table style="font-size: 15px;
								font-family: 'Courier New', Courier, monospace;
								font-weight: 300;">
					<tr>
						<td><?php echo	"City";?></td>
						<td><?php echo $info['c_name'];?></td><br>
					</tr>
					<tr>
						<td><?php echo "Email:";?></td>
						<td><?php echo $info['email']; ?></td>
					</tr>
					<tr>
						<td><?php echo "Tel:";?></td>
						<td><?php echo $info['tel'];?></td>
					</tr>
					<tr>
						<td><?php echo "University:";?></td>
						<td><?php echo $info['university'];?></td>
					</tr>
					<tr>
						<td><?php echo "Major:";?></td>
						<td><?php echo	$info['major'];?></td>
					</tr>
					<tr>
						<td><?php echo "Projects ";?></td>
						<td><?php echo $info['projects'];?></td>
					</tr>
					<tr>
						<td><?php echo "Interests";?></td>
						<td><?php echo $info['interests'];?></td>
					</tr>

				</table>
				<?php
				if(isset($_SESSION['user_id'])){
				$sql = "select s.id from student s where s.user_id=".$_SESSION['user_id'];
				$stmt=$pdo->prepare($sql); 
				$stmt->execute(); 
				$my_student_id=$stmt->fetch();
				if(isset($_SESSION['user_id'])&&($my_student_id)&&("\"$my_student_id[id]\""==$student_id)){
				$sql = "select u.display_name,a.application_status from students_applications a,student s,users u where s.user_id=$_SESSION[user_id] and a.student_id=$my_student_id[id] and u.id=a.requested_by ";
				$stmt=$pdo->prepare($sql); 
				$stmt->execute(); 
				$students_applications=$stmt->fetch();
				if($students_applications){
				for($i=0; $i<count($students_applications); $i++){
					$j=0;
					echo $students_applications[$i][$j]."<br>";
					$j++;
					$x=$j-1;
					if($students_applications[$i][$j]=='0'){
						echo "Rejected!";
					}
					else if($students_applications[$i][$j]==null){
						echo "<a href=reject.php?requested_by=".$students_applications[$i][$x].">Reject</a>"." &nbsp;&nbsp; <a href=accept.php?requested_by=".$students_applications[$i][$x].">Accept</a>";
					}else{
						echo "Accepted!";
					}
				}
			}
		}
	}
				?>
			</p>
			<aside style="margin-left: 250px">
			<h2>Similar Students</h2>
			<p>
				A student or 2 students with same major
			</p>
			</aside>
		</div>
		
		<?php
		echo "<a href=\"./students.php\"Back to students List </a>";
			if (isset($_SESSION['user_id'])) {	
			$student_id = $_GET['student_id'];
			$sql = "select s.user_id from student s where s.user_id=" . $_SESSION['user_id'] . " and s.id=" . $student_id;
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$id = $stmt->fetch();
			if ($id) {
				echo "<a href=add-student.php?student_id=" . $student_id . ">Edit </a>";
			}
			$sql = "select u.user_type from users u where u.id=".$_SESSION['user_id'];
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$id = $stmt->fetch();
			if($id['user_type']==1)
			echo "<a href=offer.php?student_id=" . $student_id . ">Offer A Training </a>";
			}
		?>


	</body>

</main>

<?php include "parts/_footer.php" ?>