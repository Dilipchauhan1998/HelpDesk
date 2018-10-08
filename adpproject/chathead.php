<?php
       include 'db.php';
       session_start();
       $fuser=$_SESSION['username'];
       $tuser=$_SESSION['tuser'];
       //$query="SELECT * FROM chatt where (fUser='$fuser' AND tUser='$tuser') OR (fUser='$tuser' AND tUser='$fuser') ORDER BY id "; 
       $query="SELECT * FROM chatt where (fUser='$fuser' AND tUser='$tuser') OR (fUser='$tuser' AND tUser='$fuser') ORDER BY id ";
       $run=$db->query($query);
       while( $row = $run->fetch_array()) :
      

   ?>


     <div id="chat_data">
      <span> <?php echo  $row['fUser'];?></span>:
        <span> <?php echo  $row['chat'];?></span>
         <span> <?php echo formatDate($row['date']);?></span><br>
        
      
     </div> 
     <div>
    
    <?php endwhile;?>

<?php
      
    

