
<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include "parts/_header.php" ?>
<?php      
   /* include('connection.php');  
    $log_username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $log_username = stripcslashes($log_username);  
        $password = stripcslashes($password);  
        $log_username = mysqli_real_escape_string($con, $log_username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$log_username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
*/?>  
<?php 

        /***Next step is to do the connectivity of login form with the database which we have created in the previous steps.
         *  We will create connection.php file for which code is given below: */
    if ($_SERVER['REQUEST_METHOD'] == "POST") { //// Processing form data when form is submitted
        // Validate username
        $log_username=$_POST['username'];
	    $pass=$_POST['pass'];
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE username =\"$log_username\" and pass = SHA1(\"$pass\")";
        $log_stmt = $pdo->prepare($sql);
       
		$log_stmt->execute();
		$log_user = $log_stmt->fetch(); 
        // Bind variables to the prepared statement as parameters
        if ($log_user) {
            // Set parameters
            $_SESSION['user_id'] = $log_user['id'];// Set parameters
            $_SESSION['user_display_name']=$log_user['display_name'];// Set parameters
            $_SESSION['user_type']=$log_user['user_type'];// Set parameters
            if($log_user['user_type']==0){// Set parameters
                // Prepare a select statement
                $sql = "SELECT id FROM student WHERE user_id=\"$log_user[id]\"";
                $log_stmt = $pdo->prepare($sql);// Set parameters
                //exute in sql
                $log_stmt->execute();
                //fetch in exe
                $student_id=$log_stmt->fetch();
                $_SESSION['student_id']=$student_id[0];
            }
            if($log_user['user_type']==1){
                // Prepare a select statement
                $sql = "SELECT id FROM company WHERE user_id=\"$log_user[id]\"";
                $log_stmt = $pdo->prepare($sql);
                //exute in sql
                $log_stmt->execute();
                //fetch in exe
                $company_id=$log_stmt->fetch();
                $_SESSION['company_id']=$company_id[0];
            }
            header("Location:/");
        }
        else { 
            
            $msg = 'Invalid'; 
            $wrong_pass=true;
            $_SESSION['wrong_user_name']=$log_username;
            $_SESSION['password']=$_POST['pass'];
            header("Location:/?wrong_pass=".$wrong_pass);
        }
	}?>
    <?php/*
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
     
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $username_err = "Username can only contain letters, numbers, and underscores.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }
        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
             
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            }*/
    
    ?>
    <main>    
        <h2>Form input from page <?php echo basename($_SERVER["HTTP_REFERER"]); ?></h2> 
        <h3>GET Data</h3>  
        <?php if (count($_GET) == 0) {
                    echo "<p><em>There are no GET variables</em></p>";
                    } else {
                        foreach ($_GET as $key => $value) {
                                echo "<strong>" . $key . " = </strong>" . $value . "<br/>\n";
                                if (is_array($value)) {
                                    for ($i = 0; $i < count($value); $i ++) { 
                                        echo "--Index " . $i . " Selected value=" . $value[$i] . "<br/>";                }            }        }    }    ?>        <h3>POST Data</h3>    <?php    if (count($_POST) == 0) {        echo "<p><em>There are no POST variables</em></p>";    } else {        foreach ($_POST as $key => $value) {            echo "<strong>" . $key . " = </strong>" . $value . "<br/>\n";                    if (is_array($value)) {                for ($i = 0; $i < count($value); $i ++) {                    echo "--Index " . $i . " Selected value=" . $value[$i] . "<br/>";                }            }        }    }    ?></main><aside>    <h2>Paga Parameters Testing</h2>    <p>   This page will get the parameters from GET or POST and display them...    </p></aside>
<?php include "parts/_footer.php" ?>