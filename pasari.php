<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
    #img_div:after{
   	content: ""; 
   	display: block;
   	clear: both;
   } 
   img{
   	float: left;
   	margin: 20px 5px 0px 5px;
   	width: 200px;
   	height: 140px;
   }
</style>
</head>
<body>
  <h1>Pasari din Romania</h1>
<div id="content">
  <?php
  // Create database connection
  $conn = mysqli_connect('localhost', 'root', '', 'pasari');
  $conn->query('SET character_set_client="utf8",character_set_connection="utf8",character_set_results="utf8";');
  $result = mysqli_query($conn, "SELECT * FROM pasari");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      echo "<img src='images/".$row['image']."' >";
      echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
    mysqli_close($conn);
  ?>
</div>
</body>
</html>