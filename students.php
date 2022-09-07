<?php include "parts/_header.php" ?>
<main>
	<h2>Students List</h2>
	<body>
		<form action="/search.php" method="POST">
			<p class="centering">
				<label> Student Study Major: </label>
				<input type="search" name="search_student"/>
				<label> City: </label>
				<select name="city">
					<option value="">Select City</option>
					<option value="jerusalem">Jerusalem</option>
					<option value="nablus">Nablus</option>
					<option value="ramallah">Ramallah</option>
					<option value="gaza">Gaza</option>
					<option value="amman">Amman</option>
					<option value="birzeit">Birzeit</option>
					<option value="hebron">Hebron</option>
				</select>
				<input type="submit" value="search"/>
			</p>
		</form>
		<div style="display:flex; flex-direction:row; gap:20em">

			<table>
				<tr>
					<th>Photo</th>
					<th>Name</th>
					<th>City</th>
					<th>University</th>
					<th>Major</th>
				</tr>
				<?php

				if(isset($_GET['major'])||isset($_GET['city'])){
					$city=$_GET['city'];
					$major=$_GET['major'];
					$sql="select s.photo_path,s.id,s.name,c.c_name,s.university,s.major from city c,student s where s.city_id=c.id and c.c_name LIKE \"%".$city."%\" and s.major LIKE \"%".$major."%\"";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll(); 
					$j=0;
					for ($i = 0; $i < count($result); $i++) {
						$result = $stmt->fetch(); 
						echo "<tr>";
						
						echo "<td>". $result[$i][$j]. "</td>";
						$j++;
						echo "<td><a href=student.php?student_id=". $result[$i][$j]. ">".$result[$i][++$j]."</a></td>";
						
						 while($j<5) {
							echo "<td>". $result[$i][$j]. "</td>";
							$j++;
						  }
						echo "</tr>";
					}
			}else{
				
					$sql = "select s.photo_path,s.name,c.c_name,s.university,s.major from city c,student s where s.city_id=c.id";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$students = $stmt->fetchAll();
					
					
					for ($i = 0; $i < count($students); $i++) {
						
						echo "<tr>";
						$j=0;
						echo "<td><img src=\"images/students/". $students[$i][$j]."\" alt=\"student's image\"></td>";
						$j++;
						$sql="select s.id from student s where s.name='".$students[$i][$j]."'";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$id=$stmt->fetch();
						echo "<td><a href=student.php?student_id=\"". $id[0]. "\">".$students[$i][$j]."</a></td>";
						$j++;
						 while($j<5) {
							echo "<td>". $students[$i][$j]. "</td>";
							$j++;
						  }
						echo "</tr>";
					}
			
			}
				?>
			</table>
			<aside >
				<h2>Distinguished Students</h2>
				
				<p>
					Student Ahmad Jaber from Birzeit is very special and he is looking for training in Computer Science...
				</p>
			</aside>
		</div>
		<p>
		<?php
			if (isset($_SESSION['user_id'])&&$_SESSION['user_type']==0) {
				$sql = "select s.id from student s,users u where u.id=$_SESSION[user_id] and s.user_id=u.id";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$stud_id = $stmt->fetch();
				if(!$stud_id){
				echo "<a href=\"./add-student.php\">Add student</a>";
			}
			}
			?>
		<a href="./add-student.php">Add student</a>
		</p>

	</body>

</main>

<?php include "parts/_footer.php" ?>