<!DOCTYPE>
<html>
<title>Hi</title>
<head>
<style>
.baby
{
 text-color:blue;
 color:red;
 text-font:
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



       $query="SELECT * FROM post ORDER BY ID "; 
       $run=$db->query($query);
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">
        <span class="baby" ><font size="4"><i>posted by <?php echo  $row['name'];?></i></font></span>:
        <span id="hr"> <font size="4"><?php echo  $row['post'];?></font></span>
         <span id="hi"><font size="4"> <?php echo formatDate($row['date']);?></font></span>
        
     </div> 
      <div>
       <a href="viewReply.php?id=<?php echo $row['id'];?>"> <font size="4">viewreply</font></a>
<br>     </div>
   


   
    <?php endwhile;?>
</body>
</html>
