<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Cuanto sabes de</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- ico -->
   <link rel="icon" href="/csdr.ico">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="data-web/css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="data-web/css/style2.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="data-web/css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="data-web/images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="data-web/css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <!-- Js Scripts-->
   <script src="js/jquery.js" type="text/javascript"></script>

   <?php if (@$_GET['w']) {
      echo '<script>alert("' . @$_GET['w'] . '");</script>';
   }
   ?>
   <script>
      function validateForm() {
         var y = document.forms["form"]["name"].value;
         var letters = /^[A-Za-z]+$/;
         if (y == null || y == "") {
            alert("El campo de nombre debe ser diligenciado");
            return false;
         }
         var z = document.forms["form"]["college"].value;
         if (z == null || z == "") {
            alert("Debe ser llenada la institución educativa");
            return false;
         }
         var x = document.forms["form"]["email"].value;
         var atpos = x.indexOf("@");
         var dotpos = x.lastIndexOf(".");
         if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            alert("Dirección de correo inválido");
            return false;
         }
         var a = document.forms["form"]["password"].value;
         if (a == null || a == "") {
            alert("La contraseña debe ser diligenciada");
            return false;
         }
         if (a.length < 5 || a.length > 25) {
            alert("La contraseña debe tener una extensión entre 5 y 25 caracteres");
            return false;
         }
         var b = document.forms["form"]["cpassword"].value;
         if (a != b) {
            alert("Las contraseñas no coinciden");
            return false;
         }
      }
   </script>
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="data-web/images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.php"><img src="data-web/images/csdi1200.png" alt="#" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="#">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#Profesor"> Profesores </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#Admin"> Administrador</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#Conocenos">Conocenos</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Ingresar</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <section class="banner_main">
      <div class="container">
         <div class="row d_flex">
            <div class="col-md-5">
               <div class="text-bg">
                  <!-- sign in form begins -->
                  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
                     <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                           <label class="col-md-12 control-label" for="name"></label>
                           <div class="col-md-12">
                              <input id="name" name="name" placeholder="Ingresa tu nombre" class="form-control input-md" type="text">

                           </div>
                        </div>

                        <!-- Text input
           <div class="form-group">
             <label class="col-md-12 control-label" for="gender"></label>
             <div class="col-md-12">
               <select id="gender" name="gender" placeholder="Ingresa tu género" class="form-control input-md">
                 <option value="Male">Género</option>
                 <option value="M">Hombre</option>
                 <option value="F">Mujer</option>
               </select>
             </div>
           </div> -->

                        <!-- Text input-->
                        <div class="form-group">
                           <label class="col-md-12 control-label" for="name"></label>
                           <div class="col-md-12">
                              <input id="college" name="college" placeholder="Ingresa tu institución educativa" class="form-control input-md" type="text">

                           </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                           <label class="col-md-12 control-label title1" for="email"></label>
                           <div class="col-md-12">
                              <input id="email" name="email" placeholder="Ingresa tu correo electrónico" class="form-control input-md" type="email">

                           </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                           <label class="col-md-12 control-label" for="mob"></label>
                           <div class="col-md-12">
                              <input id="mob" name="mob" placeholder="Ingresa tu número celular" class="form-control input-md" type="number">

                           </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                           <label class="col-md-12 control-label" for="password"></label>
                           <div class="col-md-12">
                              <input id="password" name="password" placeholder="Ingresa tu contraseña" class="form-control input-md" type="password">

                           </div>
                        </div>

                        <div class="form-group">
                           <label class="col-md-12control-label" for="cpassword"></label>
                           <div class="col-md-12">
                              <input id="cpassword" name="cpassword" placeholder="Confirma tu contraseña" class="form-control input-md" type="password">

                           </div>
                        </div>
                        <?php if (@$_GET['q7']) {
                           echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
                        } ?>
                        <!-- Button -->
                        <div class="form-group">
                           <label class="col-md-12 control-label" for=""></label>
                           <div class="col-md-12">
                              <input type="submit" value="Registrarse" class="btn btn-primary" />
                           </div>
                        </div>

                     </fieldset>
                  </form>
               </div>
            </div>
            <div class="col-md-7">
               <div class="text-img">
                  <figure><img src="data-web/images/cloud.png" /></figure>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end banner -->

   <!--sign in modal start-->
   <div class="modal fade" id="myModal">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title"><span style="color:orange">Acceso exclusivo para Estudiantes</span></h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body title">
               <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                     <form role="form" action="login.php?q=index.php" method="POST">
                        <!-- Text input-->
                        <div class="form-group">
                           <input id="email" name="email" placeholder="Ingresa tu correo electrónico" class="form-control input-md" type="email">
                        </div>
                        <!-- Password input-->
                        <div class="form-group">
                           <input id="password" name="password" placeholder="Ingresa tu contraseña" class="form-control input-md" type="password">
                        </div>
                  </div>
               </div>
               <div class="form-group" align="center">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Ingresar</button>
                  </form>
               </div>
            </div>
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   <!--sign in modal closed-->

   <!-- Services  -->
   <div id="Profesor" class="Services">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>PROFESORES</h2>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="Services-box">
                  <i><img src="data-web/images/solicitud.png" alt="#" /></i>
                  <h3> Solicitar Cuenta Profesor</h3>
                  <a class="read_more" href="feedback.php">Solicitar</a>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="Services-box">
                  <i><img src="data-web/images/profesor.png" alt="#" /></i>
                  <h3>Acceso para Profesores</h3>
                  <a class="read_more" href="#" data-toggle="modal" data-target="#loginprof">Ingresar</a>
               </div>
            </div>
         </div>
         <br>

      </div>
   </div><br>

   <!--Modal for profesor login-->
   <div class="modal fade" id="loginprof">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title"><span style="color:#f08800;font-family:'typo' ">Acceso exclusivo para Profesores</span></h3>
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body title1">
               <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                     <form role="form" method="post" action="prof.php?q=index.php">
                        <div class="form-group">
                           <input type="text" name="uname" maxlength="21" placeholder="Usuario Admin" class="form-control" />
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" maxlength="15" placeholder="Contraseña Admin" class="form-control" />
                        </div>
                        <div class="form-group" align="center">
                           <input type="submit" name="loginprof" value="Ingresar" class="btn btn-primary" />
                        </div>
                     </form>
                  </div>
                  <div class="col-md-3"></div>
               </div>
            </div>
            <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <!-- end Servicess -->
   <!-- why -->
   <div id="Admin" class="why">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage"><br><br>
                  <h2>ADMINISTRADOR</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
               <div class="why-box">
                  <i><img src="data-web/images/admin.png" alt="#" /></i>
                  <h3>Acceso Administrador</h3>
                  <p>making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still </p>
               </div><br>
               <a class="read_more bg" href="#" data-toggle="modal" data-target="#login">Ingresar</a> <br>
            </div>
         </div>
      </div><br>
   </div>

   <!--Modal for admin login-->
   <div class="modal fade" id="login">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title"><span style="color:orange;font-family:'typo' ">Acceso exclusivo para Administradores</span></h3>
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body title1">
               <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                     <form role="form" method="post" action="admin.php?q=index.php">
                        <div class="form-group">
                           <input type="text" name="uname" maxlength="21" placeholder="Usuario Admin" class="form-control" />
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" maxlength="15" placeholder="Contraseña Admin" class="form-control" />
                        </div>
                        <div class="form-group" align="center">
                           <input type="submit" name="login" value="Ingresar" class="btn btn-primary" />
                        </div>
                     </form>
                  </div>
                  <div class="col-md-3"></div>
               </div>
            </div>
            <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <!-- end why -->
   <!-- contact -->
   <div id="Conocenos" class="Services">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Sobre Nosotros</h2>
                  <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad <br>
                     teimpor sittem elit inuning ut sed.
                  </p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
               <div class="Services-box">
                  <i><img src="data-web/images/gps.png" alt="#" /></i>
                  <br><br>
                  <h3> Misión</h3>
                  <p style="text-align:JUSTIFY">Contribuir a la formación y a la extensión de la educación mediante la tecnología en condiciones de equidad en Panamá.</p>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
               <div class="Services-box">
                  <i><img src="data-web/images/objetivo.png" alt="#" /></i>
                  <br><br>
                  <h3>Visión</h3>
                  <p style="text-align:JUSTIFY">Convertirnos en una herramienta de referencia para la mejora de la educación en entornos tecnológicos variados y cambiantes gracias a la innovación y creación de conocimiento educativo.</p>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
               <div class="Services-box">
                  <i><img src="data-web/images/agente-de-centro-de-llamadas.png" alt="#" /></i><br>
                  <br>
                  <h3>Contactanos</h3>
                  <p>Mail: Soporte@csd.com</p>
                  <p>Telefono: 523-5324</p>
                  <p>Dirección: Bella Vista, Panamá</p><br><br>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>© 2021 All Rights Reserved. <a href="https://html.design/">Free html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="data-web/js/jquery.min.js"></script>
   <script src="data-web/js/popper.min.js"></script>
   <script src="data-web/js/bootstrap.bundle.min.js"></script>
   <script src="data-web/js/jquery-3.0.0.min.js"></script>
   <script src="data-web/js/plugin.js"></script>
   <!-- sidebar -->
   <script src="data-web/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="data-web/js/custom.js"></script>
   <script src="data-web/https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
