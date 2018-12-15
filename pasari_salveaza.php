<?php
  // Create database connection
  $conn = mysqli_connect('localhost', 'root', '', 'pasari');
  $conn->query('SET character_set_client="utf8",character_set_connection="utf8",character_set_results="utf8";');
  // Initialize message variable
  $msg = "";
    
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);
    $titlu = mb_convert_encoding($image_text,'HTML-ENTITIES','utf-8');

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO pasari (image, image_text) VALUES ('$image', '$titlu')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  mysqli_close($conn);
  header('Location:pasari.php');
?>
