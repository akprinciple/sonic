<?php 
		include 'inc/session.php';
		$msg = "";
	// include 'inc/session.php';
  if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
         $type = pathinfo("upload/$image", PATHINFO_EXTENSION);
     if ($_FILES["image"]["size"] > 1000000) {
            $msg = "<div class='text-center text-danger p-2  font-weight-bold'>Sorry, your file is too large.</div>";
     }
            elseif ($type != "JPG" && $type != "jpg"  && $type != "PNG" && $type != "png") {
                  $msg = "<div class='alert alert-danger p-2 font-weight-bold'>Only jpg and png files are allowed</div>";
                }
                else{
                        // $id = $_SESSION['id'];
                    $update = mysqli_query($connect, "UPDATE links SET image = '{$image}' WHERE id = 1");
                    if ($update) {
                  $msg = "<div class='alert text-success text-center p-2 font-weight-bold'>Upload Successful</div>";
                    move_uploaded_file($tmp, "upload/$image");

                      
                    }

                    else{
                  $msg = "<div class='alert alert-danger p-2 font-weight-bold'>Error</div>";

                    }

                }     
  }


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin Dashboard</title>
 	<?php include 'inc/link.php'; ?>
 </head>
 <body>
 	<div class="col-md-10 m-auto">
    <div class="mb-3">
    <?php include 'inc/header.php'; ?>
  </div>
 		<?php echo $msg; ?>
 		<div class="col-md-3">
 			<div class="border w-100">
          	<?php  
          		$sql = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
          		while ( $rw = mysqli_fetch_array($sql)) {
          			
          		
          	?>
           <img src="upload/<?php echo $rw['image']; ?>" class="w-100">
           <?php } ?>
        </div>
         <form method="post" enctype="multipart/form-data">
          <div class="form-group">
           <input type="file" required="required" accept=".jpg,.png" name="image" class="form-control">
         </div>
           <input type="submit" name="submit" class="btn btn-success w-100" value="Upload">
         </form>
 		</div>
 		
 			<?php

include 'inc/graph.php';
?>
 		
 		
 	</div>

 
 </body>
 </html>
 <script type="text/javascript" src="../js/chart.min.js"></script>