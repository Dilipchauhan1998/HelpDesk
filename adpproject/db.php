
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adp";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

function formatDate($date){
 return date('g:i a',strtotime($date));
}

?> 
