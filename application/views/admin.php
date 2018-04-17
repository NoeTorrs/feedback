<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<script type="text/javascript" src="<?= base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<h1>ADMIN DASHBOARD</h1>
		<form method="post" action="<?php echo base_url('Main_Controller/logout'); ?>">
			<input type="submit" name="logout" value="LOG OUT" class="btn btn-primary">
		</form>

		<br>
		
			<div class="panel-group">
		    <div class="panel panel-primary">
		     <div class="panel-body">
		      	
		    <div class="col-sm-6">
		    	<table align="center" style="height: 700px">
					<tr>
						<td align="center">
							<h1>GOOD REVIEWS</h1>
							<h1>
								<?php
				           		 	echo $reviews[1]->status;

								?>
							</h1>
						</td>
					</tr>
					<tr>
						<td align="center">
							<h1>BAD REVIEWS</h1>
							<h1>
								<?php
								echo $reviews[0]->status;
								?>
							</h1>
						</td>
					</tr>
				</table>
			</div>


		<div class="col-sm-6">
			<div class="panel-group">
		    <div class="panel panel-info">
		      <div class="panel-body" style="height: 700px; overflow-y: scroll;">
			<table class="table table-dark" >
				<thead>
					<tr>
						<th>COMMENTS</th>
					</tr>
				</thead>
				<tbody >
					 <?php foreach($comments as $rows):?>
					 <tr>
					 	<td><?php echo $rows->comments ?></td>
					 </tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
		</div>

		      </div>
		    </div>
		</div>

	</div>

	

</body>
</html>