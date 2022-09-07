<?php include "parts/_header.php" ?>
<body>
    <?php
   /* $mysql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    
    if ($conn->query($mysql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $mysql . "<br>" . $conn->error;
    }*/
    
    ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") { 
    // set the PDO error mode to exception
        if(!isset($_GET['not_new'])){
         // Check if image file is a actual
        $imag=$_FILES['file']['name'];
        // Check if file already exists
        echo $imag;
        $imag=$_SESSION['user_id']."-".$_FILES['file']['name'];
        //echo "";
        $tempImg=$_FILES['file']['tmp_name'];
        $folder="images/students/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        move_uploaded_file($tempImg,$folder.$imag);
        $interests=$_POST['interests'];
        //echo "";
        $id=$_SESSION['user_id'];
        //echo "";
        $name=$_POST['student_name'];
        //echo "";
        $city_id=$_POST['city'];
        //echo "";
        $major=$_POST['major'];
        //echo "";
        $projects=$_POST['projects'];
        //echo "";
        $phone=$_POST['phone'];
        //echo "";
        $university=$_POST['university'];
        //echo "";
        $email=$_POST['email'];
       
       
        // Execute the query using the data we just defined
// T    he execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
        $mysql = "insert into 
        (name,city_id,email,tel,university,major,projects,interests,photo_path,user_id) 
        VALUES ('$name',$city_id,'$email','$phone','$university','$major','$projects','$interests','$imag',$id)";
         // use exec() because no results are returned
        $exe = $pdo->prepare($mysql);
         // use exec() because no results are returned
		$exe->execute();
        header("Location:students.php");
         }
    }


?>
</body>
<?php include "parts/_footer.php" ?>