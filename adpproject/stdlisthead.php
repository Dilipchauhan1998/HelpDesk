
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

       $colge=$_SESSION['idd'];

       $query="SELECT userName FROM users where college='$colge' and status=1"; 
       $run=$db->query($query);
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">
      
      <a href="chat.php?name=<?php echo $row['userName']; ?>" > <span><?php echo $row['userName'];?>*</span> </a>

     
       
     </div> 
     <div>
    
     <?php endwhile;?>

<?php
       $queryy="SELECT userName FROM users where college='$colge' and status=0"; 
       $run=$db->query($queryy);
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">
      
      <a href="chat.php?name= <?php echo $row['userName']; ?>" > <span> <?php echo $row['userName'];?></span> </a>

     
       
     </div> 
     <div>
    
     <?php endwhile;?>




</div>

</body>
</html>

