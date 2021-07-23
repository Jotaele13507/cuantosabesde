<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <!-- ico -->
  <link rel="icon" href="/csdr.ico">
  <title>Cuanto sabes de - Estudiante</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main2.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>


  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <!--alert message-->
  <?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
  }
  ?>
  <!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>

<body>
  <div class="header">
    <div class="row">
      <div class="col-lg-6">
        <span class="logo">Acceso Estudiante</span>
      </div>
      <div class="col-md-4 col-md-offset-2">
        <?php
        include_once 'dbConnection.php';
        session_start();
        if (!(isset($_SESSION['email']))) {
          header("location:index.php");
        } else {
          $name = $_SESSION['name'];
          $email = $_SESSION['email'];

          include_once 'dbConnection.php';
          echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Hola,</span> <a href="account.php?q=1" class="log log1">' . $name . '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</button></a></span>';
        } ?>
      </div>
    </div>
  </div>
  <div class="bg">

    <!--navigation menu-->
    <nav class="navbar navbar-default title1">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>Panel de Control</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown <?php if (@$_GET['q'] == 20 || @$_GET['q'] == 21 || @$_GET['q'] == 22 || @$_GET['q'] == 23 || @$_GET['q'] == 24 ); ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;Clases<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="account.php?q=20">Módulo I</a></li>
              <li><a href="account.php?q=21">Módulo II</a></li>
              <li><a href="account.php?q=22">Módulo III</a></li>
              <li><a href="account.php?q=23">Módulo VI</a></li>
              <li><a href="account.php?q=24">Módulo V</a></li>
            </ul>
          </li>
            <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="account.php?q=1"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;Examen</a></li>
            <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp;Historial</a></li>
            <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Calificaciones</a></li>
            <li <?php if (@$_GET['q'] == 4) echo 'class="active"'; ?>><a href="account.php?q=4"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>&nbsp;Descargas</a></li>
            <li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--navigation menu closed-->
    <div class="container">
      <!--container start-->
      <div class="row">
        <div class="col-md-12">

          <!--home start-->
          <?php if (@$_GET['q'] == 1) {

            $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
            echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td><td><b>Marcas</b></td><td><b>Tiempo Límite</b></td><td></td></tr>';
            $c = 1;
            while ($row = mysqli_fetch_array($result)) {
              $title = $row['title'];
              $total = $row['total'];
              $sahi = $row['sahi'];
              $time = $row['time'];
              $eid = $row['eid'];
              $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
              $rowcount = mysqli_num_rows($q12);
              if ($rowcount == 0) {
                echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td><b><a class="btn btn-success" href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Examen</b></span></a></b></td></tr>';
              } else {
                
                echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" ></td></tr>';
              }
            }
            $c = 0;
            echo '</table></div></div>';
          } ?>
          <!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

          <!--home closed-->

          <!--quiz start-->
          <?php
          if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
            $eid = @$_GET['eid'];
            $sn = @$_GET['n'];
            $total = @$_GET['t'];
            $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
            echo '<div class="panel" style="margin:5%">';
            while ($row = mysqli_fetch_array($q)) {
              $qns = $row['qns'];
              $qid = $row['qid'];
              echo '<b>Pregunta &nbsp;' . $sn . '&nbsp;::<br />' . $qns . '</b><br /><br />';
            }
            $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
            echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
<br />';

            while ($row = mysqli_fetch_array($q)) {
              $option = $row['option'];
              $optionid = $row['optionid'];
              echo '<input type="radio" name="ans" value="' . $optionid . '">' . $option . '<br /><br />';
            }
            echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div>';
            //header("location:dash.php?q=4&step=2&eid=$id&n=$total");
          }
          //result display
          if (@$_GET['q'] == 'result' && @$_GET['eid']) {
            $eid = @$_GET['eid'];
            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error157');
            echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Resultados</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              $qa = $row['level'];
              echo '<tr style="color:#66CCFF"><td>Total de Preguntas</td><td>' . $qa . '</td></tr>
      <tr style="color:#99cc32"><td>Respuestas Correctas&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
	  <tr style="color:red"><td>Respuestas Equivocadas&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
	  <tr style="color:#66CCFF"><td>Calificación&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
            }
            $q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ") or die('Error157');
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              echo '<tr style="color:#990000"><td>Calificación General&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
            }
            echo '</table></div>';
          }
          ?>
          <!--quiz end-->
          <?php
          //history start
          if (@$_GET['q'] == 2) {
            $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
            echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:#0c0f38""><td><b>S.N.</b></td><td><b>Examen</b></td><td><b>Preguntas Resueltas</b></td><td><b>Buenas</b></td><td><b>Equivocadas<b></td><td><b>Puntaje</b></td>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $eid = $row['eid'];
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              $qa = $row['level'];
              $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
              while ($row = mysqli_fetch_array($q23)) {
                $title = $row['title'];
              }
              $c++;
              echo '<tr><td style="color:#f08800"><b>' . $c . '</b></td><td>' . $title . '</td><td>' . $qa . '</td><td>' . $r . '</td><td>' . $w . '</td><td>' . $s . '</td></tr>';
            }
            echo '</table></div>';
          }

          //ranking start
          if (@$_GET['q'] == 3) {
            $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
            echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:#0c0f38"><td><b>Rank</b></td><td><b>Nombre</b></td><td><b>Institución</b></td><td><b>Puntaje</b></td></tr>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $e = $row['email'];
              $s = $row['score'];
              $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
              while ($row = mysqli_fetch_array($q12)) {
                $name = $row['name'];
                //$gender=$row['gender'];
                $college = $row['college'];
              }
              $c++;
              echo '<tr><td style="color:#f08800"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
            }
            echo '</table></div></div>';
          }
          ?>

          <?php
          if (@$_GET['q'] == 20) {
            echo'';
            echo'<div class="panel"><div class="table-responsive"><table class="table table-striped title1">';
                echo '<h1 class="section-heading" style="text-align:center">Entorno Vivo</h1>';
                echo'<center><img class="img-fluid" src="image/modulo1.jpg" alt="Hola Mundo" align="center"></center>';
                echo'';
                echo'<br><center><span class="caption text-muted" >Mapa Conceptual sobre la reproducción en general</span></center><br>';   
                echo'<br>';
                echo '<p style="text-align:justify"> La reproducción, el proceso que garantiza la vida Todos los seres vivos están formados por unidades estructurales llamadas células; algunos son unicelulares, es decir, están formados por una sola célula y otros son pluricelulares porque tienen varias células. Todas las células tienen diferentes tipos de estructuras internas llamadas organelos y cada uno de ellos cumple una función particular.
                Es un hecho que la existencia de un organelo celular está supeditado a la presencia de otro; , los organelos no ejecutan en solitario su labor; más bien se complementan de una manera extraordinaria, trabajando unos para los otros y viceversa. Pero este tipo de relaciones de dependencia no solo se dan a nivel de células sino que también se presenta a nivel de tejidos, órganos y sistemas.
                </p>';
                  echo '</table></div></div>';
            echo'';
          }
          ?>

          <?php
          if (@$_GET['q'] == 21) {
            echo'';
            echo'<div class="panel"><div class="table-responsive"><table class="table table-striped title1">';
            echo '<h1 class="section-heading" style="text-align:center">La Reproducción Humana</h1>';
            echo'<center><img class="img-fluid" src="image/modulo2.jpg" alt="Hola Mundo" align="center"></center>';
            echo'';
            echo'<br><center><span class="caption text-muted" >Mapa Conceptual sobre la reproducción Humana</span></center><br>';   
            echo'<br>';
            echo '<p style="text-align:justify"> La reproducción humana La reproducción en el ser humano es de tipo sexual, debido a que se produce intercambio de material genético entre dos gametos. Existe en el ser humano dos tipos de aparatos reproductores: el masculino, que produce los gametos llamados espermatozoides, y el femenino, que forma los óvulos o gametos femeninos. El ser humano presenta una serie de características que los diferencian de los otros mamíferos, ya
            que muchos de éstos se reproducen durante ciertas estaciones del año y sólo producen espermatozoides u óvulos en ese tiempo; mientras que el hombre produce espermatozoides continuamente y la mujer ovula alrededor de una vez al mes. En los seres humanos se presenta el denominado dimorfismo, es decir que hay características particulares que diferencias a un sexo del otro, las cuáles se conocen como caracteres sexuales secundarios.
            </p>';
            echo '</table></div></div>';
            echo'';
          }
          ?>

          <?php
          if (@$_GET['q'] == 22) {
            echo'';
            echo'<div class="panel"><div class="table-responsive"><table class="table table-striped title1">';
            echo '<h1 class="section-heading" style="text-align:center">Fecundación, Embarazo y Parto</h1>';
            echo'<center><img class="img-fluid" src="image/modulo3.jpg" alt="Hola Mundo" align="center"></center>';
            echo'';
            echo'<br><center><span class="caption text-muted" >Fases del desarrollo embrionario.</span></center><br>';   
            echo'<br>';
            echo '<p style="text-align:justify"> En el desarrollo de un nuevo ser en el interior del vientre de la madre, 
            interviene una serie de fenómenos que se inician con la fecundación del óvulo. A este proceso le denomina embarazo. 
            En éste intervienen la fecundación, la implantación, el desarrollo del embrión y del feto, y termina con el nacimiento. 
            La fecundación es la unión de los núcleos del óvulo y del espermatozoide.
            La unión de los gametos generalmente se realiza en el primer tercio de las trompas de Falopio y, 
            aunque sólo se necesita un espermatozoide para fecundar el óvulo, el hombre puede llegar a depositar alrededor de 400 millones. 
            Tal cantidad obedece a una estrategia biológica para asegurar la fecundación. Cuando los espermatozoides están en contacto con el óvulo, 
            tratan de penetrar sus capas con ayuda de sustancias químicas. Sólo uno de ellos lo logra. Durante el proceso, 
            la cabeza de este espermatozoide se separa de la cola, y la capa exterior del óvulo experimenta una serie de modificaciones químicas que 
            impiden la entrada de otros espermatozoides. Posteriormente, se unen los núcleos del espermatozoide (con 23 cromosomas: 1n) y el óvulo
            (con 23 cromosomas: 1n), de tal manera que la célula recién formada contiene 46 cromosomas y recibe el nombre de cigoto (2n).
            </p>';
              echo '</table></div></div>';
            echo'';
          }
          ?>

          <?php
          if (@$_GET['q'] == 23) {
            echo'';
            echo'<div class="panel"><div class="table-responsive"><table class="table table-striped title1">';
            echo '<h1 class="section-heading" style="text-align:center">Enfermedades de Transmisión Sexual</h1>';
            echo'<center><img class="img-fluid" src="image/modulo4.jpg" alt="Hola Mundo" align="center"></center>';
            echo'';
            echo'<br><center><span class="caption text-muted" >Virus del SIDA</span></center><br>';   
            echo'<br>';
            echo '<p style="text-align:justify"> El cuerpo humano constantemente está siendo atacado por microorganismos, 
            entre los cuales se encuentran las bacterias. Las bacterias producen enfermedades como tuberculosis y difteria 
            que se transmiten por contacto con otras personas que están contagiadas. Algunas bacterias transmiten enfermedades
            pero solo cuando hay contacto sexual, a estas enfermedades se les conoce como enfermedades de transmisión sexual o venéreas.

            Existe un gran número de enfermedades infecciosas que atacan al ser humano y pueden adquirirse de diferentes maneras. 
            Una de las formas de contraer enfermedades es por vía sexual, es decir, se adquieren por medio del contacto sexual con una persona infectada, 
            a través del semen o de los fluidos vaginales. Las enfermedades que se transmiten de esta forma se conocen como enfermedades sexualmente transmisibles. 
            Dentro de ellas encontramos la sífilis, la gonorrea, la candidiasis, el herpes genital y el sida.
            </p>';
              echo '</table></div></div>';
            echo'';
          }
          ?>

          <?php
          if (@$_GET['q'] == 24) {
            echo'';
            echo'<div class="panel"><div class="table-responsive"><table class="table table-striped title1">';
            echo '<h1 class="section-heading" style="text-align:center">Las Funciones Nerviosas</h1>';
            echo'<center><img class="img-fluid" src="image/modulo5.jpg" width="700" height="800" align="center"></center>';
            echo'';
            echo'<br><center><span class="caption text-muted" >El Sistema Nervioso y sus Funciones.</span></center><br>';   
            echo'<br>';
            echo '<p style="text-align:justify"> Una característica muy importante de los seres vivos es su capacidad de respuesta a los estímulos. 
            Los estímulos son cualquier cambio en el medio externo e interno capaz de producir una reacción en un organismo. 
            Los estímulos son conducidos a través de un sistema complejo de neuronas. Los seres vivos responden a diversos estímulos, 
            como cambios de temperatura, luz, sonido, presencia de sustancias químicas, entre otros. Estas respuestas varían en intensidad,            
            dependiendo del estímulo que se reciba; por ejemplo si la intensidad de la luz es muy amplia la pupila del ojo responde cerrándose 
            y si la intensidad es muy baja la pupila se abre. El sistema nervioso tiene por función captar la información del exterior o del interior, 
            procesarla mediante la generación de señales electroquímicas y dar una respuesta rápida. Se cree que todas las células vivas son capaces de 
            percibir estímulos. Por ejemplo, si se pincha a una ameba con un alfiler, ella responde ante el estímulo, la actividad eléctrica percibida
             en ella es semejante al impulso nervioso que se produce en los animales y el ser humano. El sistema nervioso no es igual en todos los organismos. 
             Algunos ejemplos de esta diversidad son: Sistema nervioso difuso: en la hidra que posee una red de “hilos” constituidos por células 
             nerviosas que se extienden por todo el organismo. Al recibir un estímulo intenso y duradero, los impulsos se difunden y todo el individuo
              reacciona al mismo tiempo.</p>';
              echo '</table></div></div>';
            echo'';
          }
          ?>

        </div>
      </div>
    </div>
  </div>
  <!--Footer start-->
  <!--footer end-->
</body>

</html>