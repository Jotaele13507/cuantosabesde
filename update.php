<?php
include_once 'dbConnection.php';
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$email = $_SESSION['email'];

//BORRAR COMO ADMIN

//delete feedback en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['fdid'] && $_SESSION['key'] == 'sunny7785068889') {
    $id = @$_GET['fdid'];
    $result = mysqli_query($con, "DELETE FROM feedback WHERE id='$id' ") or die('Error');
    header("location:dash.php?q=3");
  }
}

//delete estudiante en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['demail'] && $_SESSION['key'] == 'sunny7785068889') {
    $demail = @$_GET['demail'];
    $r1 = mysqli_query($con, "DELETE FROM rank WHERE email='$demail' ") or die('Error');
    $r2 = mysqli_query($con, "DELETE FROM history WHERE email='$demail' ") or die('Error');
    $result = mysqli_query($con, "DELETE FROM user WHERE email='$demail' ") or die('Error');
    header("location:dash.php?q=1");
  }
}

//delete prof en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['defmail'] && $_SESSION['key'] == 'sunny7785068889') {
    $defmail = @$_GET['defmail'];
    $result = mysqli_query($con, "DELETE FROM prof WHERE email='$defmail' ") or die('Error');
    header("location:dash.php?q=2");
  }
}

//remove quiz en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == 'sunny7785068889') {
    $eid = @$_GET['eid'];
    $result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
      $qid = $row['qid'];
      $r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$qid'") or die('Error');
      $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$eid' ") or die('Error');

    header("location:dash.php?q=6");
  }
}

//add quiz en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addquiz' && $_SESSION['key'] == 'sunny7785068889') {
    $name = $_POST['name'];
    $name = ucwords(strtolower($name));
    $total = $_POST['total'];
    $sahi = $_POST['right'];
    $wrong = $_POST['wrong'];
    $time = $_POST['time'];
    $tag = $_POST['tag'];
    $desc = $_POST['desc'];
    $id = uniqid();
    $q3 = mysqli_query($con, "INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

    header("location:dash.php?q=4&step=2&eid=$id&n=$total");
  }
}

//AULA START

//add aula en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addaula' && $_SESSION['key'] == 'sunny7785068889') {
    $aula = $_POST['aula'];
    $bachiller = $_POST['bachiller'];
    $qaula = mysqli_query($con, "INSERT INTO aula VALUES ('$aula', '$bachiller')");

    header("location:dash.php?q=7");
  }
}

//add prof en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addprof' && $_SESSION['key'] == 'sunny7785068889') {
    $prof_id = $_POST['prof_id'];
    $name_prof = $_POST['name_prof'];
    $aula = $_POST['aula'];
    $bachiller = $_POST['bachiller'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qprof = mysqli_query($con, "INSERT INTO prof VALUES ('$prof_id', '$name_prof', '$aula', '$bachiller', '$email', '$password')");
    $qaula = mysqli_query($con, "INSERT INTO aula VALUES ('$aula', '$bachiller')");

    header("location:dash.php?q=2");
  }
}

//delete aula en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['deaula'] && $_SESSION['key'] == 'sunny7785068889') {
    $deaula = @$_GET['deaula'];
    $result = mysqli_query($con, "DELETE FROM aula WHERE aula='$deaula' ") or die('Error');
    header("location:dash.php?q=8");
  }
}

//AULA END

//add question en admin
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == 'sunny7785068889') {
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];
    $ch = @$_GET['ch'];

    for ($i = 1; $i <= $n; $i++) {
      $qid = uniqid();
      $qns = $_POST['qns' . $i];
      $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
      $oaid = uniqid();
      $obid = uniqid();
      $ocid = uniqid();
      $odid = uniqid();
      $a = $_POST[$i . '1'];
      $b = $_POST[$i . '2'];
      $c = $_POST[$i . '3'];
      $d = $_POST[$i . '4'];
      $qa = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
      $qb = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
      $qc = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
      $qd = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
      $e = $_POST['ans' . $i];
      switch ($e) {
        case 'a':
          $ansid = $oaid;
          break;
        case 'b':
          $ansid = $obid;
          break;
        case 'c':
          $ansid = $ocid;
          break;
        case 'd':
          $ansid = $odid;
          break;
        default:
          $ansid = $oaid;
      }


      $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$qid','$ansid')");
    }
    header("location:dash.php?q=0");
  }
}

//quiz start en admin/Estudiante
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
  $eid = @$_GET['eid'];
  $sn = @$_GET['n'];
  $total = @$_GET['t'];
  $ans = $_POST['ans']; //Respuesta
  $qid = @$_GET['qid'];
  $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
  while ($row = mysqli_fetch_array($q)) {
    $ansid = $row['ansid'];
  }
  if ($ans == $ansid) { //Si el ID de la respuesta dada es igual a el ID de la respuesta correcta, Entonces
    $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ");
    while ($row = mysqli_fetch_array($q)) {
      $sahi = $row['sahi'];
    }
    if ($sn == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())") or die('Error');
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error115');

    while ($row = mysqli_fetch_array($q)) { //Parte de las respuestas correctas
      $s = $row['score'];
      $r = $row['sahi'];
    }
    $r++;
    $s = $s + $sahi;
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'") or die('Error124');
  } else {
    $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');

    while ($row = mysqli_fetch_array($q)) {
      $wrong = $row['wrong'];
    }
    if ($sn == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )") or die('Error137');
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error139');
    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $w = $row['wrong'];
    }
    $w++;
    $s = $s - $wrong;
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'") or die('Error147');
  }
  if ($sn != $total) { //Cuando respondes todas las preguntas
    $sn++;
    header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total") or die('Error152');
  } else if ($_SESSION['key'] != 'sunny7785068889') {
    $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error156');
    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
    }
    $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
    $rowcount = mysqli_num_rows($q);
    if ($rowcount == 0) {
      $q2 = mysqli_query($con, "INSERT INTO rank VALUES('$email','$s',NOW())") or die('Error165');
    } else {
      while ($row = mysqli_fetch_array($q)) {
        $sun = $row['score'];
      }
      $sun = $s + $sun;
      $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
    }
    header("location:account.php?q=result&eid=$eid");
  } else {
    header("location:account.php?q=result&eid=$eid");
  }
}

//restart quiz en admin
if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
  $eid = @$_GET['eid'];
  $n = @$_GET['n'];
  $t = @$_GET['t'];
  $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error156');
  while ($row = mysqli_fetch_array($q)) {
    $s = $row['score'];
  }
  $q = mysqli_query($con, "DELETE FROM `history` WHERE eid='$eid' AND email='$email' ") or die('Error184');
  $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
  while ($row = mysqli_fetch_array($q)) {
    $sun = $row['score'];
  }
  $sun = $sun - $s;
  $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
  header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}

//BORRAR COMO PROF

//delete estudiante en prof
if (isset($_SESSION['key'])) {
  if (@$_GET['dexmail'] && $_SESSION['key'] == 'sunny7785068889') {
    $dexmail = @$_GET['dexmail'];
    $r1 = mysqli_query($con, "DELETE FROM rank WHERE email='$dexmail' ") or die('Error');
    $r2 = mysqli_query($con, "DELETE FROM history WHERE email='$dexmail' ") or die('Error');
    $result = mysqli_query($con, "DELETE FROM user WHERE email='$dexmail' ") or die('Error');
    header("location:dashprof.php?q=1");
  }
}

//delete feedback en prof
if (isset($_SESSION['key'])) {
  if (@$_GET['pfdid'] && $_SESSION['key'] == 'sunny7785068889') {
    $pid = @$_GET['pfdid'];
    $result = mysqli_query($con, "DELETE FROM feedback WHERE id='$pid' ") or die('Error');
    header("location:dashprof.php?q=4");
  }
}

//remove quiz en prof
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'prmquiz' && $_SESSION['key'] == 'sunny7785068889') {
    $peid = @$_GET['eid'];
    $result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$peid' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
      $pqid = $row['id'];
      $r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$pqid'") or die('Error');
      $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$pqid' ") or die('Error');
    }
    $r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$peid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$peid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$peid' ") or die('Error');

    header("location:dashprof.php?q=5");
  }
}

//add quiz en prof
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'paddquiz' && $_SESSION['key'] == 'sunny7785068889') {
    $name = $_POST['name'];
    $name = ucwords(strtolower($name));
    $total = $_POST['total'];
    $sahi = $_POST['right'];
    $wrong = $_POST['wrong'];
    $time = $_POST['time'];
    $tag = $_POST['tag'];
    $desc = $_POST['desc'];
    $id = uniqid();
    $q3 = mysqli_query($con, "INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

    header("location:dashprof.php?q=4&step=2&eid=$id&n=$total");
  }
}

//add question en prof
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'paddqns' && $_SESSION['key'] == 'sunny7785068889') {
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];
    $ch = @$_GET['ch'];

    for ($i = 1; $i <= $n; $i++) {
      $qid = uniqid();
      $qns = $_POST['qns' . $i];
      $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
      $oaid = uniqid();
      $obid = uniqid();
      $ocid = uniqid();
      $odid = uniqid();
      $a = $_POST[$i . '1'];
      $b = $_POST[$i . '2'];
      $c = $_POST[$i . '3'];
      $d = $_POST[$i . '4'];
      $qa = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
      $qb = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
      $qc = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
      $qd = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
      $e = $_POST['ans' . $i];
      switch ($e) {
        case 'a':
          $ansid = $oaid;
          break;
        case 'b':
          $ansid = $obid;
          break;
        case 'c':
          $ansid = $ocid;
          break;
        case 'd':
          $ansid = $odid;
          break;
        default:
          $ansid = $oaid;
      }


      $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$qid','$ansid')");
    }
    header("location:dashprof.php?q=0");
  }
}
