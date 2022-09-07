<?php session_start(); ?>
<?php require_once './parts/_db.php'?>
<?php 
    if(isset($_SESSION['user_id'])) { 
        $sql = "update users set last_hit = now() where id =:session";
        $stmt=$pdo->prepare($sql); 
        $stmt->bindValue(':session',$_SESSION['user_id']);
        $stmt->execute(); 
    }
?>
<!DocType html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/layout.css" />
        <link rel="stylesheet" href="css/website.css" />
        <title>Student Training</title>
        
    </head>
    <body>
        <!--  -->
        <header>
            <div class="logo">
                <img width="70px" height="70px" src="images/training.png" alt="">
                <h1 class="hed">student Training</h1>
            </div>
            <!--a href="index.php" class="log">Log in</a-->
            <!--  -->
			<p class="navbar">
                <?php 
                if(isset($_SESSION['user_id'])):
                      $sql = "select display_name from users where id =:session"; 
                      $stmt=$pdo->prepare($sql); 
                      $stmt->bindValue(':session',$_SESSION['user_id']);
                      $stmt->execute(); 
                      
                      $display_name = $stmt->fetch();
                      echo "<p style='margin-left: 45%;
                      text-decoration: none;
                      color: green;
                      font-size: 30px;
                      margin-top: -50px;'>Welcome  $display_name[0]</p>"; 
                ?>
                    <a style="margin-left: 95%;
                                    text-decoration: none;
                                    color: red;
                                    font-size: 30px;
                                    margin-top: -50px;" href="./parts/_logout.php">Logout</a>
                <?php else: ?>
                    <a style="margin-left: 95%;
                                    text-decoration: none;
                                    color: red;
                                    font-size: 30px;
                                    margin-top: -50px;" class="log" href="index.php">Login</a>
                <?php endif ?>
			</p>
            <nav>
                <a href="index.php">Home</a>
                <a href="students.php">Students List</a> 
                <a href="companies.php">Companies List</a> 
            </nav>
        </header>
