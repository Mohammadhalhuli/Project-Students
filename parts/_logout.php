<?php
//logout in account
session_start();//first session
session_destroy();//end session
header('Location:/'); 
//to  location
echo '<a class="log" href="/">Go back home</a>';
?>