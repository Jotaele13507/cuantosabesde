<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <!-- ico -->
  <link rel="icon" href="/csdr.ico">
  <title>Cuanto sabes de - Administrador</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main2.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
        <span class="logo">Administrador</span>
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
        echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hola,</span> <a href="account.php" class="log log1">' . $name . '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesi??n</button></a></span>';
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
        <a class="navbar-brand" href="dash.php?q=0"><b>Panel de Control</b></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="dash.php?q=1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Estudiantes</a></li>
          <li class="dropdown <?php if (@$_GET['q'] == 10 || @$_GET['q'] == 2) echo 'active"'; ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;Profesores<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="dash.php?q=10">Agregar Profesores</a></li>
              <li><a href="dash.php?q=2">Administrar Profesores</a></li>
            </ul>
          <li <?php if (@$_GET['q'] == 8) echo 'class="active"'; ?>><a href="dash.php?q=8"><span class="glyphicon glyphicon-apple" aria-hidden="true"></span>&nbsp;Aulas</a></li>
          <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="dash.php?q=3"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Calificaciones</a></li>
          <li <?php if (@$_GET['q'] == 4) echo 'class="active"'; ?>><a href="dash.php?q=4"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;Solicitudes</a></li>
          <li class="dropdown <?php if (@$_GET['q'] == 5 || @$_GET['q'] == 6) echo 'active"'; ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;Quiz<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="dash.php?q=5">Agregar Quiz</a></li>
              <li><a href="dash.php?q=6">Eliminar Quiz</a></li>
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
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Tem??tica</b></td><td><b>Total de Preguntas</b></td><td><b>Intentos</b></td><td><b>Tiempo L??mite</b></td><td></td></tr>';
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
              echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
            }
          }
          $c = 0;
          echo '</table></div></div>';
        }

        //ranking start
        if (@$_GET['q'] == 3) {
          $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
          echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:#0c0f38"><td><b>Posici??n</b></td><td><b>Nombre</b></td><td><b>Instituto Educativo</b></td><td><b>Calificaci??n</b></td></tr>';
          $c = 0;
          while ($row = mysqli_fetch_array($q)) {
            $e = $row['email'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
              $name = $row['name'];
              //$gender = $row['gender'];
              $college = $row['college'];
            }
            $c++;
            echo '<tr><td style="color:#f08800"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
          }
          echo '</table></div></div>';
        }

        ?>
        <!--home closed-->

        <!--Estudiantes start-->
        <?php if (@$_GET['q'] == 1) {

          echo '
          

          ';

          $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Nombre</b></td><td><b>Instituci??n Acad??mica</b></td><td><b>Correo Electr??nico</b></td><td><b>M??vil</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $mob = $row['mob'];
            //$gender = $row['gender'];
            $email = $row['email'];
            $college = $row['college'];

            echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $name . '</td><td>' . $college . '</td><td>' . $email . '</td><td>' . $mob . '</td>
	<td><a class="btn btn-danger" title="Delete User" href="update.php?demail=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</b></a></td></tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        } ?>
        <!--Estudiantes end-->

        <!--prof add start-->
        <?php if (@$_GET['q'] == 10) {
          echo '
          <div class="row">
            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Agregar Profesor</b></span><br /><br />
              <div class="col-md-3"></div><div class="col-md-6">   
                <form class="form-horizontal title1" name="form" action="update.php?q=addprof"  method="POST">
                 <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                      <div class="col-md-12">
                        <input id="prof_id" name="prof_id" placeholder="Ingrese el C??digo del profesor" class="form-control input-md" type="text" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                        <div class="col-md-12">
                          <input id="name_prof" name="name_prof" placeholder="Ingrese el Nombre completo del profesor" class="form-control input-md" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                        <div class="col-md-12">
                          <input id="email" name="email" placeholder="Ingrese el Email del Profesor" class="form-control input-md" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>  
                      <div class="col-md-12">
                        <input id="password" name="password" placeholder="Ingrese una contrase??a" class="form-control input-md" type="text" required>
                      </div>
                  </div>
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                        <div class="col-md-12">
                        <span class="help-block">Eliga el Aula</span>
                          <select id="aula" name="aula" class="form-control input-md">
                            <option value="Decimo A">Decimo A</option>
                            <option value="Decimo B">Decimo B</option>
                            <option value="Decimo C">Decimo C</option>
                            <option value="Decimo D">Decimo D</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>  
                      <div class="col-md-12">
                      <span class="help-block">Eliga el Bachiller</span>
                        <select id="bachiller" name="bachiller" class="form-control input-md">
                          <option value="Ciencias">Ciencias</option>
                          <option value="Letras">Letras</option>
                        </select>
                      </div>
                  </div>
                    <div class="form-group">
                      <label class="col-md-12 control-label" for=""></label>
                      <div class="col-md-12"> 
                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>';
        } ?>

        <!--prof add end-->

        <!--prof admin start-->
        <?php if (@$_GET['q'] == 2) {

          $result = mysqli_query($con, "SELECT * FROM prof") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                <tr style="color:#0c0f38"><td><b>ID Prof</b></td><td><b>Nombre del Profesor</b></td><td><b>Correo Electr??nico</b></td><td><b>Aula</b></td><td><b>Bachiller</b></td><td></td><td></td></tr>';

          while ($row = mysqli_fetch_array($result)) {
            $idprof = $row['prof_id'];
            $name_prof = $row['name_prof'];
            $emailprof = $row['email'];
            $aula = $row['aula'];
            $bachiller = $row['bachiller'];

            echo '<tr><td>' . $idprof . '</td><td>' . $name_prof . '</td><td>' . $emailprof . '</td><td>' . $aula . '</td><td>' . $bachiller . '</td>
            
                  <td><a class="btn btn-danger" title="Delete User" href="update.php?defmail=' . $emailprof . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</b></a></td></tr>';
          }
          echo '</table></div></div>';
        } ?>
        <!--prof admin end-->

        <!--Add Aula start-->
        <?php if (@$_GET['q'] == 7) {
          echo '
          <div class="row">
            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Agregar Aula</b></span><br /><br />
              <div class="col-md-3"></div><div class="col-md-6">   
                <form class="form-horizontal title1" name="form" action="update.php?q=addaula"  method="POST">
                 <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                      <div class="col-md-12">
                        <input id="aula" name="aula" placeholder="Ingrese el Aula" class="form-control input-md" type="text" required>
                        <span class="help-block">Ejemplo - Decimo A, Decimo B, Decimo C, etc.</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                        <div class="col-md-12">
                          <input id="bachiller" name="bachiller" placeholder="Ingrese el bachiller" class="form-control input-md" type="text" required>
                          <span class="help-block">Ejemplo - Ciencias , letras, Comercio, etc.</span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 control-label" for=""></label>
                      <div class="col-md-12"> 
                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>';
        } ?>
        <!--Add Aula end-->

        <!--Admin Aula start-->
        <?php if (@$_GET['q'] == 8) {
          $result = mysqli_query($con, "SELECT * FROM aula") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>Aula</b></td><td><b>Bachiller</b></td><td></td><td></td><td></td><td></td></tr>';

          while ($row = mysqli_fetch_array($result)) {
            $aula = $row['aula'];
            $bachiller = $row['bachiller'];

            echo '<td>' . $aula . '</td><td>' . $bachiller . '</td>
	                <td><a class="btn btn-primary" title="Abrir Aula" href="dash.php?q=9&aula=' . $aula . '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Abrir</b></a></td>';
            echo '<td><a class="btn btn-success" title="Agregar al Aula" href="update.php?addaula=' . $aula . '"><b><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</b></a></td>';
            echo '<td><a class="btn btn-warning" title="Editar Aula" href="update.php?edaula=' . $aula . '"><b><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</b></a></td>';
            echo '<td><a class="btn btn-danger" title="Borrar Aula" href="update.php?deaula=' . $aula . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</b></a></td></tr>';
          }
          echo '</table></div></div>';
        } ?>
        <!--admin Aula end-->

        <!--Aula reading portion start-->

        <?php if (@$_GET['aula']) {
          echo '<br />';
          $aula = @$_GET['aula'];
          $result = mysqli_query($con, "SELECT * FROM prof WHERE aula='$aula' ") or die('Error');
          while ($row = mysqli_fetch_array($result)) {
            $idprof = $row['prof_id'];
            $name_prof = $row['name_prof'];
            $emailprof = $row['email'];
            $aula = $row['aula'];
            $bachiller = $row['bachiller'];

            echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $aula . ' - ' . $bachiller . '</b></h1>';

            echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:60px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Nombre del profesor:</b>&nbsp;' . $name_prof . '</span> <span style="line-height:35px;padding:5px;">&nbsp;<b>Correo El??ctronico:</b>&nbsp;' . $emailprof . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Codigo del Profesor:</b>&nbsp;' . $idprof . '</span><br/>';
          }
          $est = mysqli_query($con, "SELECT * FROM user WHERE aula='$aula' ") or die('Error231');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
          <tr style="color:#0c0f38"><td><b>Nombre</b></td><td><b>Correo Electr??nico</b></td><td><b>M??vil</b></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($est)) {
            $name = $row['name'];
            $college = $row['college'];
            $mob = $row['mob'];
            $email = $row['email'];
            $aulae = $row['aula'];
        
          $c++;
          echo '<tr><td>' . $name . '</td><td>' . $email . '</td><td>' . $mob . '</td></tr>';}
      
        echo '</table></div></div>';
          }
        ?>
        <!--Aula reading portion closed-->

        <!--feedback start-->
        <?php if (@$_GET['q'] == 4) {
          $result = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Cod. Prof</b></td><td><b>Correo Electr??nico</b></td><td><b>Fecha</b></td><td><b>Hora</b></td><td><b>Enviado por</b></td><td></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $date = $row['date'];
            $date = date("d-m-Y", strtotime($date));
            $time = $row['time'];
            $subject = $row['subject'];
            $name = $row['name'];
            $email = $row['email'];
            $id = $row['id'];
            echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td>';
            echo '<td>' . $subject . '</td><td>' . $email . '</td><td>' . $date . '</td><td>' . $time . '</td><td>' . $name . '</td>
	                <td><a class="btn btn-primary" title="Abrir Solicitud" href="dash.php?q=4&fid=' . $id . '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Abrir</b></a></td>';
            echo '<td><a class="btn btn-danger" title="Eliminar Solicitud" href="update.php?fdid=' . $id . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</b></a></td>

	</tr>';
          }
          echo '</table></div></div>';
        }
        ?>
        <!--feedback closed-->

        <!--feedback reading portion start-->
        <?php if (@$_GET['fid']) {
          echo '<br />';
          $id = @$_GET['fid'];
          $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id' ") or die('Error');
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $subject = $row['subject'];
            $date = $row['date'];
            $date = date("d-m-Y", strtotime($date));
            $time = $row['time'];
            $feedback = $row['feedback'];

            echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $name . '</b></h1>';
            echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;"><b>Fecha:</b>&nbsp;' . $date . '</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Hora:</b>&nbsp;' . $time . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Codigo del Profesor:</b>&nbsp;' . $subject . '</span><br/><span style="line-height:35px;padding:5px;"><b>Correo Electr??nico:</b>&nbsp;' . $email . '</span>&nbsp;<b>Comentario: </b>' . $feedback . '</div></div>';
          }
        } ?>
        <!--Feedback reading portion closed-->

        <!--add quiz start-->
        <?php
        if (@$_GET['q'] == 5 && !(@$_GET['step'])) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:36%;font-size:30px;"><b>Detalles del examen</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Ingrese el t??tulo del Quiz" class="form-control input-md" type="text" required>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Ingrese el n??mero total de preguntas" class="form-control input-md" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Ingrese el n??mero de marcas en la respuesta correcta" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Ingrese el n??mero de marcas en la respuesta incorrecta sin signo" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Ingrese el l??mite de tiempo para la prueba en minutos" class="form-control input-md" min="1" type="number" required>
    
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
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Escribe una descripci??n ac??..." required></textarea>  
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
        if (@$_GET['q'] == 5 && (@$_GET['step']) == 3) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Ingrese los detalles  de las pregunta</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';

          for ($i = 1; $i <= @$_GET['n']; $i++) {
            echo '<b>Pregunta n??mero&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Escribe la pregunta n??mero ' . $i . ' ac??..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>  
  <div class="col-md-12">
  <input id="' . $i . '1" name="' . $i . '1" placeholder="Ingresa la opci??n a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>  
  <div class="col-md-12">
  <input id="' . $i . '2" name="' . $i . '2" placeholder="Ingresa la opci??n b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>  
  <div class="col-md-12">
  <input id="' . $i . '3" name="' . $i . '3" placeholder="Ingresa la opci??n c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>  
  <div class="col-md-12">
  <input id="' . $i . '4" name="' . $i . '4" placeholder="Ingresa la opci??n d" class="form-control input-md" type="text">
    
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
        <?php if (@$_GET['q'] == 6) {

          $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr style="color:#0c0f38"><td><b>S.N.</b></td><td><b>Tem??tica</b></td><td><b>Total de Preguntas</b></td><td><b>Intentos</b></td><td><b>Tiempo l??mite</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $time = $row['time'];
            $eid = $row['eid'];
            echo '<tr><td style="color:#f08800"><b>' . $c++ . '</b></td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td ><b><a class="btn btn-danger" href="update.php?q=rmquiz&eid=' . $eid . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Borrar</b></span></a></b></td></tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        }
        ?>

      </div>
      <!--container closed-->
    </div>
  </div>
</body>

</html>