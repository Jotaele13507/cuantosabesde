<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <!-- ico -->
  <link rel="icon" href="/csdr.ico">
  <title>Cuanto sabes de - Profesor</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

  <script>
    $(function() {
      $(document).on('scroll', function() {
        console.log('scroll top : ' + $(window).scrollTop());
        if ($(window).scrollTop() >= $(".logo").height()) {
          $(".navbar").addClass("navbar-fixed-top");
        }

        if ($(window).scrollTop() < $(".logo").height()) {
          $(".navbar").removeClass("navbar-fixed-top");
        }
      });
    });
  </script>
</head>

<body style="background:#eee;">
  <div class="header">
    <div class="row">
      <div class="col-lg-6">
        <span class="logo">Acceso Profesor</span>
      </div>
      <?php
      include_once 'dbConnection.php';
      session_start();
      $email = $_SESSION['email'];
      if (!(isset($_SESSION['email']))) {
        header("location:index.php");
      } else {
        $name = $_SESSION['name'];;

        include_once 'dbConnection.php';
        echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hola,</span> <a href="account.php" class="log log1">' . $name . '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</button></a></span>';
      } ?>

    </div>
  </div>
  <!-- admin start-->

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
        <a class="navbar-brand" href="dashprof.php?q=0"><b>Panel de Control</b></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li class="dropdown <?php if (@$_GET['q'] == 20 || @$_GET['q'] == 21 || @$_GET['q'] == 22 || @$_GET['q'] == 23 || @$_GET['q'] == 24 ); ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;Clases<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="dashprof.php?q=20">Módulo I</a></li>
              <li><a href="dashprof.php?q=21">Módulo II</a></li>
              <li><a href="dashprof.php?q=22">Módulo III</a></li>
              <li><a href="dashprof.php?q=23">Módulo VI</a></li>
              <li><a href="dashprof.php?q=24">Módulo V</a></li>
            </ul>
          </li>
          <li <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><a href="dashprof.php?q=0"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Inicio<span class="sr-only">(current)</span></a></li>
          <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="dashprof.php?q=1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Estudiantes</a></li>
          <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="dashprof.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Calificaciones</a></li>
          <li <?php if (@$_GET['q'] == 30) echo 'class="active"'; ?>><a href="dashprof.php?q=30"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Gráficas</a></li> 
          <li <?php if (@$_GET['q'] == 6) echo 'class="active"'; ?>><a href="dashprof.php?q=6"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp;Cargar</a></li>
          <li class="dropdown <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active"'; ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;Quiz<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="dashprof.php?q=4">Agregar Quiz</a></li>
              <li><a href="dashprof.php?q=5">Eliminar Quiz</a></li>
            </ul>
          </li>
          <!-- <li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a></li> -->

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

        <?php if (@$_GET['q'] == 0) {

          $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td><td><b>Total de puntoss</b></td><td><b>Tiempo Límite</b></td><td></td></tr>';
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
              echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td></tr>';
            } else {
              echo '<tr style="color:#99cc32"><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td></tr>';
            }
          }
          $c = 0;
          echo '</table></div></div>';
        }
        error_reporting(E_ALL ^ E_NOTICE);
        //ranking start
        if (@$_GET['q'] == 2) {
          $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
          echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:#0c0f38"><td><b>Posición</b></td><td><b>Nombre</b></td><td><b>Instituto Educativo</b></td><td><b>Calificación</b></td></tr>';
          $c = 0;
          while ($row = mysqli_fetch_array($q)) {
            $e = $row['email'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
              $namest = $row['name'];
              //$gender = $row['gender'];
              $college = $row['college'];
            }
            $c++;
            echo '<tr><td style="color:#f08800"><b>' . $c . '</b></td><td>' . $namest . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
          }
          echo '</table></div></div>';
        }

        ?>


        <!--home closed-->
        <!--users start-->
        <?php if (@$_GET['q'] == 1) {

          $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Nombre</b></td><td><b>Institución Académica</b></td><td><b>Correo Electrónico</b></td><td><b>Móvil</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $mob = $row['mob'];
            //$gender = $row['gender'];
            $email = $row['email'];
            $college = $row['college'];

            echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $name . '</td><td>' . $college . '</td><td>' . $email . '</td><td>' . $mob . '</td>
	<td><a title="Delete User" href="update.php?dexmail=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        } ?>
        <!--user end-->

        <!--add quiz start-->
        <?php
        if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Detalles del examen</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=paddquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Ingrese el título del Quiz" class="form-control input-md" type="text" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Ingrese el número total de preguntas" class="form-control input-md" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Ingrese el número de marcas en la respuesta correcta" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Ingrese el número de marcas en la respuesta incorrecta sin signo" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Ingrese el límite de tiempo para la prueba en minutos" class="form-control input-md" min="1" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Ingrese una etiqueta para que puedan buscar el examen" class="form-control input-md" type="text" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Escribe una descripción acá..." required></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Enviar" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
        }
        ?>
        <!--add quiz end-->

        <!--add quiz step2 start-->
        <?php
        if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:28.5%;font-size:30px;"><b>Ingrese los detalles  de las pregunta</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=paddqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';

          for ($i = 1; $i <= @$_GET['n']; $i++) {
            echo '<b>Pregunta número&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Escribe la pregunta número ' . $i . ' acá..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>  
  <div class="col-md-12">
  <input id="' . $i . '1" name="' . $i . '1" placeholder="Ingresa la opción a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>  
  <div class="col-md-12">
  <input id="' . $i . '2" name="' . $i . '2" placeholder="Ingresa la opción b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>  
  <div class="col-md-12">
  <input id="' . $i . '3" name="' . $i . '3" placeholder="Ingresa la opción c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>  
  <div class="col-md-12">
  <input id="' . $i . '4" name="' . $i . '4" placeholder="Ingresa la opción d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Escoge la respuesta correcta</b>:<br/>
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Escoge la respuesta correcta " class="form-control input-md" >
   <option value="a">Seleccione la respuesta a la pregunta ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
          }

          echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Enviar" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
        }
        ?>
        <!--add quiz step 2 end-->

        <!--remove quiz-->
        <?php if (@$_GET['q'] == 5) {

          $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td><td><b>Intentos</b></td><td><b>Tiempo límite</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $time = $row['time'];
            $eid = $row['eid'];
            echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td><b><a href="update.php?q=prmquiz&eid=' . $eid . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
          }
          $c = 0;
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
                echo '<p style="text-align:justify"> La reproducción, el proceso que garantiza la vida Todos los seres vivos están formados por unidades 
                estructurales llamadas células; algunos son unicelulares, es decir, están formados por una sola célula y otros son pluricelulares porque 
                tienen varias células. Todas las células tienen diferentes tipos de estructuras internas llamadas organelos y cada uno de ellos cumple 
                una función particular.
                Es un hecho que la existencia de un organelo celular está supeditado a la presencia de otro; , los organelos no ejecutan en solitario su labor; 
                más bien se complementan de una manera extraordinaria, trabajando unos para los otros y viceversa. Pero este tipo de relaciones de dependencia 
                no solo se dan a nivel de células sino que también se presenta a nivel de tejidos, órganos y sistemas.
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
            echo'<center><img class="img-fluid" src="image/modulo2.jpg"  align="center"></center>';
            echo'';
            echo'<br><center><span class="caption text-muted" >Mapa Conceptual sobre la reproducción Humana</span></center><br>';   
            echo'<br>';
            echo '<p style="text-align:justify"> La reproducción humana La reproducción en el ser humano es de tipo sexual, debido a que se produce 
            intercambio de material genético entre dos gametos. Existe en el ser humano dos tipos de aparatos reproductores: el masculino, que produce 
            los gametos llamados espermatozoides, y el femenino, que forma los óvulos o gametos femeninos. El ser humano presenta una serie de 
            características que los diferencian de los otros mamíferos, ya
            que muchos de éstos se reproducen durante ciertas estaciones del año y sólo producen espermatozoides u óvulos en ese tiempo; mientras 
            que el hombre produce espermatozoides continuamente y la mujer ovula alrededor de una vez al mes. En los seres humanos se presenta el 
            denominado dimorfismo, es decir que hay características particulares que diferencias a un sexo del otro, las cuáles se conocen como caracteres 
            sexuales secundarios.
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
            echo'<center><img class="img-fluid" src="image/modulo3.jpg"  align="center"></center>';
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
            echo'<center><img class="img-fluid" src="image/modulo4.jpg" align="center"></center>';
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

          <?php
            if (@$_GET['q'] == 30) {

              include_once 'ver.php';
            
            }?>
      </div>
      </div>
      <!--container closed-->
    </div>
  </div>
</body>

</html>