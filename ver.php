<!DOCTYPE html>
<html>
<head>
	<title>Graficos con plotly</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
				<div class="panel panel-heading">
						Graficas de respuestas correctas, Incorrectas y mayor puntajes.
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLinealbien"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaLinealmal"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaBarras"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLinealbien').load('linealbien.php');
		$('#cargaLinealmal').load('linealmal.php');
		$('#cargaBarras').load('barras.php');
	});
</script>