<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="/asset/css/login.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/css/font-awesome.min.css">
  <link rel="stylesheet" href="/asset/css/bootstrap.min.css">
	<link href="/asset/cssal/prettify.css">
  <link href="/asset/cssal/styles.css">


	<title>Principal</title>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-10">
		<div class="row">
		<h1>Principal</h1>
		</div>
		<br>
		<div class="row">
			<button class="btn btn-info"> Crear usuario</button>
		</div>
		<br>
		<div class="row">
		<h3>Lista de usuarios</h3>
		</div>
		<div class="row">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>User</th>
				<th>Email</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
			<?php 
				foreach($users as $user){
					?>
					<tr> 
						<td> 
							<?php echo $user['name']; ?> 
						</td>
						<td>
							<?php echo $user['username'];?> 
						</td>
						<td>
						<?php echo $user['email'];?> 
						</td>
						<td>
						<a  id="modificar" onclick="" >
							<span class="fa-stack fa-1x">
								<i class="fa fa-circle fa-stack-2x text-info"></i>
								<i class="fa fa-rotate-left fa-stack-1x fa-inverse"></i>
							 </span>
 						</a>
						</td>
						<td>     
							<a id="eliminar" onclick="" >
								<span class="fa-stack fa-1x">
									<i class="fa fa-circle fa-stack-2x text-danger"></i>
									<i class="fa fa-close fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</td> 
					</tr>
					
			
			<?php


				}
			?>
			</tbody>
		</table>
		</div>
	</div>
</div>
</div>


</body>
<script src="/asset/js/jquery-3.1.1.min.js" ></script>
	<script src="/asset/js/tether-1.4.0.js" ></script>
	<script src="/asset/js/bootstrap.min.js"></script>
 	<script src="/asset/jsal/jquery.bsAlerts.js"></script>
</html>