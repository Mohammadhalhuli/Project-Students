<?php include "parts/_header.php" ?>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") { 
        try{
        $city_id=$_POST['city'];

        $email=$_POST['email'];

        $phone=$_POST['phone'];

        
        $interests=$_POST['interests'];

        $id=$_SESSION['user_id'];

        $university=$_POST['university'];

        $major=$_POST['major'];

        $img=$_SESSION['user_id']."-".$FILES['file']['name'];

        $name=$_POST['student_name'];

        $projects=$_POST['projects'];

        /*if (mysqli_query($conn, $mysql)) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }*/


          if($city_id){
            $mysql="update student set city_id=$city_id where student.id=$_GET[student_id]";
            //echo $string;
            $string = $pdo->prepare($mysql);
            //echo $string;
            $string->execute();
        }
        if($email){
            $mysql="update student set email='$email' where student.id=$_GET[student_id]";
            //echo $string;
            $string = $pdo->prepare($mysql);
            //echo $string;

            $string->execute();
        }
        if($name){
        $mysql = "update student set name='$name' where student.id=$_GET[student_id]";
        //echo $string;
        $string = $pdo->prepare($mysql);
        //echo $string;
		$string->execute();
        }
       
        if($phone){
        $mysql="update student set tel='$phone' where student.id=$_GET[student_id]";
        //echo $string;
        $string = $pdo->prepare($mysql);
        //echo $string;
		$string->execute();
        //echo $string;
        }
        /****
         *  if(isset($_POST['update'])) {
            $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'rootpassword';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $emp_id = $_POST['emp_id'];
            $emp_salary = $_POST['emp_salary'];
            
            $mysql = "UPDATE employee ". "SET emp_salary = $emp_salary ". 
               "WHERE emp_id = $emp_id" ;
            mysql_select_db('test_db');
            $retval = mysql_query( $mysql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
         */
    if($major){

        $mysql="update student set major='$major where student.id=$_GET[student_id]" ;
        //echo $string;
        $string = $pdo->prepare($mysql);

        //echo $string;
		$string->execute();

    }

    if($projects){

       $mysql= "update student set projects='$projects' where student.id=$_GET[student_id]";

       //echo $string;
       $string = $pdo->prepare($mysql);

       //echo $string;
	   $string->execute();
    }
    if($interests){

    "update student set interests='$interests' where student.id=$_GET[student_id]";

    $string = $pdo->prepare($mysql);

		$string->execute();
    }
        if($university){

        $mysql="update student set university='$university' where student.id=$_GET[student_id]";
        //echo $string;

        $string = $pdo->prepare($mysql);
        //echo $string;

		$string->execute();
        //echo $string;

        }



    if($img){

        $tempImg=$_FILES['file']['tmp_name'];
        //echo $string;
        $folder="images/students/";
        move_uploaded_file($tempImg,$folder.$img);
        //echo $string;
        $mysql="update student set photo_path='$img' where student.id=$_GET[student_id]";
        //echo $string;
        $string = $pdo->prepare($mysql);
        //echo $string;
		$string->execute();
        //<td><a href="form.php?edit=<?php echo $data['id']; class="btn btn-success">Edit</a></td>
}
       
        header("Location:student.php?student_id=".$_GET['student_id']);

    // in error the catch
        }catch(PDOException $e){
            // Error reporting, only modern Object-oriented extensions use exceptions.
            $error=true;
            echo $error;
            header("Location:?error=".$error);
        }
        
    }
    //end update
?>
</body>
<?php include "parts/_footer.php" ?>