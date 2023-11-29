<?php 
session_start();
require_once('./db_conn.php');
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<style type="text/css">
     #bluebar{
          height:50px;
          background-color: #405d9b;
          color: #d9dfeb;
          
     }
     #blackbar{
          height:400px;
          background-color: #000000;
          color: #d9dfeb;
          
     }
     #searchbox{
          width: 400px;
          height: 20px;
          border-radius: 5px;
          border: none;
          padding: 4px;
          font-size: 14px;
     }
     #profile_pic{
          width: 150px;
          margin-top: -300px;
          border-radius: 50%;
          border: solid 2px white;
     }
     #menu_button{
          width: 100px;
          display:inline-block;
          
     }
</style>
<body style="font-family: tahoma; background: #efefef;">
     <br>
     <div id="bluebar">
          <div style="width: 800px; margin:auto; font-size: 30px; padding: 2px">
          Pesbuk &nbsp &nbsp<input type="text" id="searchbox" placeholder="Search for people">
          &nbsp 
               <div style="font-size: 17px; margin:auto; float:right; padding:15px"><?php echo $_SESSION['name']; ?>
               </div>
          </div>
          
          
     </div>
   
          <div style="width: 800px; margin: auto; background-color; black; min-height: 400px;">
          <!-- <div style="background-color: black; text-align: center; color #4059db"> -->
          <br>
          <br>
          
          <br>
          <br>
          <form method="post" action="send.php">
               <label>Send as:</label>
               <input type="text" name="name"></input>
               <br>
               <br>
               <br>
               <label>Message:</label>
               <textarea name="message"></textarea>
               <br> 
               <div style="margin:auto">
               <input type="submit" name="btn">
               <br>
              
          </div>

   
</div>
<head>
<h1>Messages</h1>
</head>
<div>
     
<?php
 $sql = "SELECT id, name, message from pesan";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
          ?>
     <tr>
     <div style="font-size: 20px; background-color: #04aa6d">
          <td><?php echo $row["name"];?></td>
     </div>
     <div style="font-size: 15px; background-color: #ccc">
          <td>&nbsp &nbsp &nbsp &nbsp <?php echo $row["message"];?></td>
          <br><br>
     </div>
          <?php
     }
     echo "</table>";
}
// else {
//      echo "No Message";
// }
$conn-> close();
?>


<?php 

}else{
     header("Location: index.php");
     exit();
}
 ?>

 