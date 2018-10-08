=<?php include 'db.php';?>
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style >
  .container
  {
       position: relative;
   top: -15px;
   right: -1196px;
  }
</style>




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
      background-image: url("") ;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center; 
      background-image-position:fixed;
     }

.center{

	top:30%;
	left:50%;
	width:30em;
	height:30em;
	margin-top: -9em; /*set to a animation-name: egative number 1/2 of your height*/
	margin-left: -15em; /*set to a negative number 1/2 of your width*/
	border: 5px solid black;
	position: fixed;
	padding: 5px;
	font: 24px/36px sans-serif;
	overflow: scroll;
        background-image: url("https://i.pinimg.com/736x/5c/4e/0b/5c4e0b538b61b12395915b53136cae8f--drawings-of-birds-ink-drawings.jpg") ;
        
}

.bb
{
  top:62%;
  height:60px;	
  position:fixed;
 margin-top: 220px;
 margin-left:-250px;
  
}
.cb
{
 top:59%;
 height:50px;
 color:blue;
 	
 margin-top: 250px;
 margin-left:120px;
 position: fixed;
}

/* Scrollbar styles */
::-webkit-scrollbar {
width: 12px;
height: 12px;
}

::-webkit-scrollbar-track {
box-shadow: inset 0 0 10px olivedrab;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
border-radius: 10px;
background: yellowgreen; 
box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

::-webkit-scrollbar-thumb:hover {
background: #7bac10;
}

</style>
</head>

<body onload="ajax();"> 

<div class="center" id="chat">

<!--<?php echo $pos;?> -->
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
//echo $pos;
     ?>

<form method="post" action="viewReply.php?id=<?php echo $id; ?>" >
<center><textarea placeholder="message" rows="10" cols="50" class="bb" name="reply"></textarea></center>
<center><input type="submit" value="send"  class="cb" name="submit"></center>
</form>

    <div class="container">


        <a href="index.php?log=logout" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>

    </div>   

</body>
</html>
