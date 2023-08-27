<?php 
		include 'inc/session.php';
		$msg = "";
	// include 'inc/session.php';
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
  

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Complaints</title>
 	<?php include 'inc/link.php'; ?>
 </head>
 <body>
 	<div class="col-md-10 m-auto">
 		<?php include 'inc/header.php'; ?>

 		<?php 
 			$select = mysqli_query($connect, "SELECT * FROM complaints WHERE md5(id) = '{$id}'");
 					
 					while ($row = mysqli_fetch_array($select)) {
 					
 		 ?>
 		<h4 class="text-center text-capitalize mt-3">
 				<?php echo $row['first']. " " . $row['last']; ?>
 		</h4>

 		<table class="table table-bordered bg-white">
 			<tr>
 				<td>
 					<b>Email:</b>
 					<br>
 					<a href="mailto:<?php echo $row['email'];?>">
 					<?php echo $row['email'];?>
 						
 					</a>
 				</td>
 				<td>
 				<b>	Phone Number:</b>
 					<br>
 					<a href="tel:<?php echo $row['phone'];?>">
 					<?php echo $row['phone'];?>
 						
 					</a>
 				</td>
 			</tr>
 			<tr>
 				<td>
 				<b>	Amount of USD/CAD lost</b>
 					<br><?php echo $row['usd_amount'];?>
 					
 				</td>
 				<td>
 					<b>Phone Number:</b>
 					<br>
 					<?php echo $row['crypto_amount'];?>
 				</td>
 			</tr>
 			<tr>
 				<td>

 				<b>	Sender's Bitcoin Address</b>
 					<br>
 					<a href="<?php echo $row['adress'];?>">
 					<?php echo $row['adress'];?>
 						
 					</a>
 				</td>
 				<td>
 					<b>Receiver's Bitcoin Address:</b>
 					<br>
 					<a href="<?php echo $row['bit_address'];?>">
 					<?php echo $row['bit_address'];?>
 						
 					</a>
 				</td>
 			</tr>
 			<tr>
 				<td>
 				<b>	Name of Company:</b>
 					<br><?php echo $row['company'];?>
 					
 				</td>
 				<td>
 					<b> Job Title:</b>
 					<br>
 					<?php echo $row['job'];?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					<b> Country/Region:</b>
 					<br><?php echo $row['country'];?>
 					
 				</td>
 				<td>
 					<b> City:</b>
 					<br>
 					<?php echo $row['city'];?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					<b>Support Request Type:</b>
 					<br><?php echo $row['solution'];?>
 					
 				</td>
 				<td>
 					<b>Reporting on Behalf of Business:</b>
 					<br>
 					<?php echo $row['role'];?>
 				</td>
 			</tr>
 			<tr>
 				<td colspan="">
 					<b>Description of Incident:</b>
 					<br><?php echo $row['description'];?>
 					
 				</td>
 				
 				<td>
 					<b>Information About The Subject(s) Who Victimized You:</b>
 					<br><?php echo $row['receiver'];?>
 					
 				</td>
 			</tr>
 			<tr>
 				<td colspan="">
 					<b>Transaction ID:</b>
 					<br><?php echo $row['hash'];?>
 					
 				</td>
 				
 				<td>
 					<b>Time to Call:</b>
 					<br><?php echo $row['cal'];?>
 					
 				</td>
 			</tr>
 			<tr>
 				<td colspan="">
 					<b>Digital Signature:</b>
 					<br><?php echo $row['sign'];?>
 					
 				</td>
 				
 				<td>
 					<a href="complaints.php" class="fas fa-arrow-left btn btn-danger">Go Back</a>
 					
 				</td>
 			</tr>
 		</table>
 		<table class="table table-bordered mt-n3 bg-white">
 		
 		</table>
 		<?php } ?>
 	</div>

 
 </body>
 </html>
