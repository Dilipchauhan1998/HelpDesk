
<?php  
session_start();
?>

<!DOCTYPE>
<html>
<title>
chat page
</title>
<head>


</head>

<body>

<div class="center">

<?php
       include 'db.php';

       $username=$_SESSION['username'];

       $query="SELECT  distinct fUser FROM chatt where tUser='$username' ORDER BY id "; 
       $run=$db->query($query);
       echo "hii bro ";
       echo $username;
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">
      
      <a href="iitchat.php?names=<?php echo $row['fUser']; ?>" > <span> <?php echo $row['fUser'];?>*</span> </a>

  
       
     </div> 
     <div>
    
     <?php endwhile;?>
<!--
<?php
       $queryy="SELECT userName FROM users where college='$colge' and status=0"; 
       $run=$db->query($queryy);
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">
      
      <a href="chat.php?name= <?php echo $row['userName']; ?> " > <span> <?php echo $row['userName'];?></span> </a>

     
       
     </div> 
     <div>
    
     <?php endwhile;?>
 -->



</div>

</body>
</html>

