<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<link rel="stylesheet" href="/asset/css/login.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/css/font-awesome.min.css">
  	<link rel="stylesheet" href="/asset/css/bootstrap.min.css">
	  <link rel="stylesheet" href="/asset/css/dataTables.bootstrap.min.css">
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
		<form action="" id="guardar" >
		<input type="hidden" id="id_registro" >
                <div class="row">
                    <label for="nombre">Nombre<input type="text" id="nombre"></label>
                </div>
				<br>
                <div class="row">
                    <label for="username">Usuario</label><input type="text" id="username" name="username">
                </div>
                <br>
                <div class="row">
                    <label for="password">Clave</label><input type="password" id="password" name="password">
                </div>
				<br>
				<div class="row">
                    <label for="email">Email</label><input type="text" id="email" name="email">
                </div>
                <br>
				<button class="btn btn-success" type="button" id="nuevo_usuario" name="nuevo_usuario" >Guardar</button>
				<br>
				<button class="btn btn-success" type="button" id="modificar_usuario" name="modificar_usuario" style="display:none" >Modificar</button>
				<button  type="reset" id="cancelar" hidden ></button>
            </form>		
		</div>
<br>


		<br>
		<div class="row">
		<h3>Lista de usuarios</h3>
		</div>
		<div class="row">
		<table class="table" id="lista_usuarios" name="lista_usuarios">
			<thead>
				<th>Nombre</th>
				<th>User</th>
				<th>Email</th>
				<th>Eliminar</th>
				<th>Modificar</th>
			</thead>
			<tbody>
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
	 <script src="/asset/js/jquery.dataTables.min.js"></script>
	 <script src="/asset/js/dataTables.bootstrap.min.js"></script>
	 <script src="/asset/js/principal.js"></script>
</html>