<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $password = $_POST['password'];
   // Process the login here ;enter the if conditions
   if ($username == "Awuradwoa" && $password == "sandie143" ) {
        header("Location:dashboard.php");
    } else {
        echo "Invalid username or password";
    }  
}
?>
 
 
 