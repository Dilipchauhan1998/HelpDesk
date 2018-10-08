<?php include 'db.php';?>
<?php  

session_start();

$id=$_GET['id'];
$_SESSION['iid']=$id;
$idd=$_SESSION['iid'];
$pos="how are u";

?>


<!DOCTYPE>
<html>
<title>
chat page
</title>
<head>

<script>
      function ajax()
        {
            var req = new XMLHttpRequest();

            req.onreadystatechange =function()
               {
                  if(req.readyState == 4 && req.status == 200)
                    {
                     
                      document.getElementById('chat').innerHTML=req.responseText;

                    }   

               }
             req.open('GET','replyhead.php','true');
             req.send();


        }  

         setInterval(function(){ajax();},1000);


     </script>


<style>

body{
      background:linear-gradient(to bottom right,white,#bcbc4);
      height:100%;
      width:100%;
      max-height:100%;
      background-image: url("cool.jpg") ;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center; 
      background-image-position:fixed;
     }

.center{

	top:30%;
	left:50%;
	width:30em;
	height:35em;
	margin-top: -9em; /*set to a animation-name: egative number 1/2 of your height*/
	margin-left: -15em; /*set to a negative number 1/2 of your width*/
	border: 5px solid black;
	position: fixed;
}

.bb
{
  top:39%;
  height:60px;
  position:fixed;

 margin-top: 220px;
 margin-left:-200px;
  
}
.cb
{
 top:47%;
 height:40px;
 margin-top: 250px;
 margin-left:-60px;
 position: fixed;
}

</style>
</head>

<body onload="ajax();"> 

<div class="center" id="chat">

<?php echo $pos;?>
</div>


    <?php

if(isset($_POST['submit']))
{
      $query="SELECT * FROM post WHERE id='$id' "; 
      $ran=$db->query($query);
      $row = $ran->fetch_array();
      $pos=$row['post'];     

      echo $pos;
      $reply=$_POST["reply"];
      $name=$_SESSION['username'];
      $insert="INSERT INTO reply(post,repliedBy,reply) values('$pos','$name','$reply')";
    
      $run=$db->query($insert);

     
}
echo $pos;
     ?>




<form method="post" action="viewReply.php?id=<?php echo $id; ?>" >
<center><textarea placeholder="message" rows="10" cols="50" class="bb" name="reply"></textarea></center>
<center><input type="submit" value="send"  class="cb" name="submit"></center>
</form>


</body>
</html>






