<?php include "parts/_header.php" ?>
<main>
	<br>
	<br>
    <h2>Add Student</h2>
	<?php
    //<img width="100%" src="assignment-screenshots/04_add-student.png" />
    ?>
    <body>
		<div style="display:flex; flex-direction:row; gap:20em">
		<?php if(isset($_GET['student_id'])):
			echo "<form action=edit.php?student_id=".$_GET['student_id']." method=\"POST\" enctype=\"multipart/form-data\">"
			?>
			 <h2 class="log"> login</h2>
			 <table>
				<tr>
					<td><label class="adding"> Personal Photo </label></td>
					<td><input type="file" name="file" class="adding" accept="image/*"><br></td>
				</tr>
				<tr>
					<td><label class="adding"> name </label></td>
					<td><input type="text" name="student_name" class="adding"><br></td>
				</tr>
				<tr>
					<td><label class="adding"> City </label></td>
					<td><select name="city" class="adding">
					<option value="0"> Select City </option>
					<option value="1">Jerusalem</option>
					<option value="2">Nablus</option>
					<option value="3">Gaza</option>
					<option value="4">Al-zarqa</option>
					<option value="5">Birzeit</option>
				</select><br></td>
				</tr>
				<tr>
					<td><label class="adding"> Email </label></td>
					<td><input type="email" name="email" class="adding"><br></td>
				</tr>
				<tr>
					<td><label class="adding"> Tel </label></td>
					<td><input type="tel" name="phone" class="adding"><br></td>
				</tr>
				<tr>
					<td><label class="adding"> University </label></td>
					<td><input type="text" name="university" class="adding"><br></td>
				</tr>
				<tr>
					<td><label class="adding"> Major </label></td>
					<td><input type="text" name="major" class="adding"><br></td>
				</tr>
				<tr>
					<td><label class="adding"> Projects </label></td>
					<td><textarea name="projects" rows="10" cols="50" class="adding"></textarea><br></td>
				</tr>
				<tr>
					<td><label class="adding"> interests </label></td>
					<td><textarea name="interests" rows="10" cols="50" class="adding"></textarea><br></td>
				</tr>
				<tr>
					<td><input type="submit" name="add_student" value="Add student" class="adding"></td>
					<td><input type="reset" name="clear" value="Clear" class="adding"></td>
				</tr>
			 </table>

			</form>
			<?php else:
				if(isset($_GET['error'])) {
					echo "Error, Not valid info, please try again";
				}
				?>
				<form action="add.php" method="POST" enctype="multipart/form-data">
					<tr>
						<td>label class="adding"> Personal Photo </label></td>
						<td><input type="file" name="file" class="adding" accept="image/*"><br></td>
					</tr>
					<tr>
						<td><label class="adding"> name </label></td>
						<td><input type="text" name="student_name" class="adding"><br></td>
					</tr>
					<tr>
						<td><label class="adding"> City </label></td>
						<td><select name="city" class="adding">
									<option value="0"> Select City </option>
									<option value="1">Jerusalem</option>
									<option value="2">Nablus</option>
									<option value="3">Gaza</option>
									<option value="4">Al-zarqa</option>
									<option value="5">Birzeit</option>
				</select></td>
					</tr>
					<tr>
						<td><label class="adding"> Email </label></td>
						<td><input type="email" name="email" class="adding"><br></td>
					</tr>
					<tr>
						<td><label class="adding"> Tel </label></td>
						<td><input type="tel" name="phone" class="adding"><br></td>
					</tr>
					<tr>
						<td><label class="adding"> University </label></td>
						<td><input type="text" name="university" class="adding"><br></td>
					</tr>
					<tr>
						<td><label class="adding"> Major </label></td>
						<td><input type="text" name="major" class="adding"><br></td>
					</tr>
					<tr>
						<td><label class="adding"> Projects </label></td>
						<td><textarea name="projects" rows="10" cols="50" class="adding"></textarea><br></td>
					</tr>
					<tr>
						<td><label class="adding"> interests </label></td>
						<td><textarea name="interests" rows="10" cols="50" class="adding"></textarea><br></td>
					</tr>
					<tr>
						<td><input type="submit" name="add_student" value="Add student" class="adding"></td>
						<td><input type="reset" name="clear" value="Clear" class="adding"></td>
					</tr>
					</table>
				</form>
			<?php endif ?>
			<aside>
    <h2>Help</h2>
    <p>
        Add your student details including projects and interests so that companies can select you...
    </p>
	
</aside>
</div>
				<a href="./students.php" class="Apadding"> Cancel and return to students List </a>
	</body>

</main>

<?php include "parts/_footer.php" ?>

