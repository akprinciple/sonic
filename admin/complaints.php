<?php 
		include 'inc/session.php';
		$msg = "";
	// include 'inc/session.php';
  

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Complaints</title>
 	<?php include 'inc/link.php'; ?>
 </head>
 <body>
 	<div class="col-md-10 m-auto ">
 		<?php include 'inc/header.php'; ?>

 		<h1 class="mt-4 text-center">Complaints</h1>
 		<table class="table table-striped table-hover  text-center">
 			<thead>
 				<tr>
 					<th>S/N</th>
 					<th>Name</th>
 					<th>Email</th>
 					<th>Amount Lost</th>
 					<th>Date</th>
 					<th>Actions</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 					$select = mysqli_query($connect, "SELECT * FROM complaints ORDER BY id DESC LIMIT 50");
 					$n = 1;
 					while ($row = mysqli_fetch_array($select)) {
 						# code...
 					

 				 ?>
 				 <tr>
 				 	<td><?php echo $n++; ?></td>
 				 	<td><?php echo $row['first']. " " . $row['last']; ?></td>
 				 	<td><?php echo $row['email']; ?></td>
 				 	<td><?php echo $row['usd_amount']. " (usd) / " . $row['crypto_amount']. " (crypto)"; ?></td>
 				 	<td><?php echo $row['date']; ?></td>
 				 	<td>
 				 		<a href="View_complaint.php?id=<?php echo md5($row['id']); ?>" class="fas fa-eye mr-2"></a>
 				 		<a href="delete.php?del=<?php echo $row['id']; ?>" class="fas fa-times text-danger"></a>
 				 	</td>
 				 </tr>
 				 <?php } ?>
 			</tbody>
 			
 		</table>
 	</div>

 
 </body>
 </html>
 <script type="text/javascript" src="../js/chart.min.js"></script>