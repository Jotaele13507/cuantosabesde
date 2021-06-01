  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

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

      <!--alert message-->
      <?php if (@$_GET['w']) {
            echo '<script>alert("' . @$_GET['w'] . '");</script>';
        }
        ?>
      <!--alert message end-->

  </head>
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
                                      <a class="nav-link" href="index.php">Home</a>
                                  </li>
                              </ul>
                          </div>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <body><br>
      <div class="bg1">
          <div class="row">
              <div class="col-md-3"></div><br>
              <div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:430px;">
                  <br>
                  <h2 align="center" style="font-family:'typo'; color:#000066">SOLICITUD DE CUENTA PARA PROFESOR</h2>
                  <div style="font-size:14px">
                      <?php if (@$_GET['q']) echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;' . @$_GET['q'] . '</span>';
                        else {
                            echo ' 
                            LLENE EL SIGUIENTE FORMULARIO CON LA INFORMACIÓN SOLICITADA <br />
                            <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                            </div><div class="col-md-1"></div></div>
                            <p>Si presenta algun inconveniente, favor comunicarse al siguiente correo mail@dominio.com</p><br>
                            <form role="form"  method="post" action="feed.php?q=feedback.php">
                            <div class="row">
                            <div class="col-md-3"><b>Nombre completo:</b><br /><br /><br /><b>Código de Profesor:</b></div>
                            <div class="col-md-9">
                            <!-- Text input-->
                            <div class="form-group">
                            <input id="name" name="name" placeholder="Ingrese su nombre completo" class="form-control input-md" type="text" required><br />    
                            <input id="name" name="subject" placeholder="Codigo de profesor" class="form-control input-md" type="text" required>    

                            </div>
                            </div>
                            </div><!--End of row-->

                            <div class="row">
                            <div class="col-md-3"><b>Dirección de correo:</b></div>
                            <div class="col-md-9">
                            <!-- Text input-->
                            <div class="form-group">
                            <input id="email" name="email" placeholder="Ingresa su correo electrónico" class="form-control input-md" type="email" required>    
                            </div>
                            </div>
                            </div><!--End of row-->

                            <div class="form-group"> 
                            <textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Comentarios" required></textarea>
                            </div>
                            <div class="form-group" align="center">
                            <input type="submit" name="submit" value="Enviar Solicitud" class="btn btn-primary" />
                            </div>
                            </form>';
                        } ?>
                  </div>
                  <!--col-md-6 end-->
                  <div class="col-md-3"></div>
              </div>
          </div>
      </div>
      </div><br>
      <!--container end-->
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