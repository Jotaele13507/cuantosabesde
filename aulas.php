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
            
            echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;"><b>Nombre del profesor:</b>&nbsp;' . $name_prof . '</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Correo Eléctronico:</b>&nbsp;' . $emailprof . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Codigo del Profesor:</b>&nbsp;' . $idprof . '</span><br/>';
          }

          $est = mysqli_query($con, "SELECT * FROM user WHERE aula='$aula' ") or die('Error231');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
          <tr style="color:#0c0f38"><td><b>Nombre</b></td><td><b>Correo Electrónico</b></td><td><b>Móvil</b></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($est)) {
            $name = $row['name'];
            $college = $row['college'];
            $mob = $row['mob'];
            $email = $row['email'];
            $aulae = $row['aula'];
          }
          $c++;
          echo '<tr><td>' . $name . '</td><td>' . $email . '</td><td>' . $mob . '</td></tr>';  
}
echo '</table></div></div>';
        ?>

<?php if (@$_GET['aula']) {
          echo '<br />';
          $aula = @$_GET['aula'];
          $est = mysqli_query($con, "SELECT * FROM user WHERE aula='$aula' ") or die('Error231');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
          <tr style="color:#0c0f38"><td><b>Nombre</b></td><td><b>Correo Electrónico</b></td><td><b>Móvil</b></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($est)) {
            $name = $row['name'];
            $college = $row['college'];
            $mob = $row['mob'];
            $email = $row['email'];
            $aulae = $row['aula'];
          }

          $result = mysqli_query($con, "SELECT * FROM prof WHERE aula='$aula' ") or die('Error');
          while ($row = mysqli_fetch_array($result)) {
            $idprof = $row['prof_id'];
            $name_prof = $row['name_prof'];
            $emailprof = $row['email'];
            $aula = $row['aula'];
            $bachiller = $row['bachiller'];

            echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $aula . ' - ' . $bachiller . '</b></h1>';
            
            echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;"><b>Nombre del profesor:</b>&nbsp;' . $name_prof . '</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Correo Eléctronico:</b>&nbsp;' . $emailprof . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Codigo del Profesor:</b>&nbsp;' . $idprof . '</span><br/>';

}
$c++;
echo '<tr><td>' . $name . '</td><td>' . $email . '</td><td>' . $mob . '</td></tr>';  
        }
        echo '</table></div></div>';
        ?>