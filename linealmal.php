
<?php
	include_once 'dbConnection.php';

	$sql="SELECT email,wrong from history order by email";
	$result=mysqli_query($con,$sql);
	$valoresY=array();//email
	$valoresX=array();//Buenas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresX[]=$ver[0];
		$valoresY[]=$ver[1];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

 ?>
<div id="graficaLinealmal"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		mode: 'lines+markers',
		name: 'R. Incorrectas',
		type: 'scatter',
		line: {color: 'rgb(219, 64, 82)',
    	width: 3
 				 }
	};


	var data = [trace1];

	Plotly.newPlot('graficaLinealmal', data);
</script>