
<!DOCTYPE>
<html>
<title></title>
<head>
<style>
.baby
{
 text-color:blue;
 color:red;
}
#hr
{
  color:black;
}
#hi
{
  color:blue;
}


</style>

</head>
<body>
<?php
     include 'db.php';
     session_start();
     $id=$_SESSION['iid'];
       //echo $id;
      $queryy="SELECT * FROM post WHERE id='$id' "; 
      $ran=$db->query($queryy);
      $raw = $ran->fetch_array();
      $pos=$raw['post'];     


       $query="SELECT * FROM reply where post='$pos' ORDER BY id "; 
       $run=$db->query($query);
       echo "<h4>".$raw['post']."</h4> ";
       
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">
        <span class="baby" ><font size="4"><i><?php echo  $row['repliedBy'];?></i></font></span>:
        <span id="hr"> <font size="4"><?php echo  $row['reply'];?></font></span>
         <span id="hi"><font size="4"> <?php echo formatDate($row['date']);?></font></span>
        
     </div> 
  
   


   
    <?php endwhile;?>
</body>
</html>
