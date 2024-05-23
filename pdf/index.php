<?php
include "config.php";
?>
<html>
<head>
	<title>How to Generate PDF From MYSQL Using PHP</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
	<div class="container">
		<div>&nbsp;</div>
		<div class="  d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-success">Generate Pdf</h6>
			<div class="card-tools" style="float: right;">
				<a href="genratepdf.php" target="_blank" class="btn btn-sm btn-primary">Generate PDF</a>
			</div>
		</div>
		<div>&nbsp;</div>
		<table class="table table-bordered">
			<tr>
				<td style="font-weight:bold;">Client name </td>
				<td style="font-weight:bold;">Client code</td>
				<td style="font-weight:bold;">Mode of Verification</td>
				<td style="font-weight:bold;">Name of Staff</td>
				<td style="font-weight:bold;">Informed by</td>
				<td style="font-weight:bold;">Request Status</td>
				<td style="font-weight:bold;">Voucher number</td>
			</tr>
			<?php 
			$sql = "SELECT * from verification_for_credit";
			$query = $dbh -> prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
				foreach($results as $row) 
				{ 
					?>

					<tr>
						<td><?php echo htmlentities($row->Client_name);?></td>
						<td><?php echo htmlentities($row->client_code);?></td>
						<td><?php echo htmlentities($row->Mode_of_Verification);?></td>
						<td><?php echo htmlentities($row->Name_of_Staff);?></td>
						<td><?php echo htmlentities($row->Informed_by);?></td>
						<td><?php echo htmlentities($row->Request_Status);?></td>
						<td><?php echo htmlentities($row->Voucher_number);?></td>
						
					</tr>

					<?php
				} 
			}
			?>
		</table>
	</div>
</body>
</html>