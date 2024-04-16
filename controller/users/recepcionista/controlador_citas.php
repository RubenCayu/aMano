<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once('../../../model/php/funciones.php');
session_init();
$themeState = session_theme();

if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'R' && $_SESSION['id'] > 0) {

  // Declaración de variables
  $day = date('d');
  $month = date('m');
  $año = isset($_GET['year']) ? $_GET['year'] : date('Y');
  $firstWeekDay = date('N', strtotime($año."-01-01"));
  function days_in_month($mes, $año) {
    return $mes == 2 ? ($año % 4 ? 28 : ($año % 100 ? 29 : ($año % 400 ? 28 : 29))) : (($mes - 1) % 7 % 2 ? 30 : 31);
  }

  // Sessions solicitudes
  include('../../../model/php/citas.php');
  $citas = new Citas();


  // Head
  include('../../../view/users/recepcionista/citas/recepcionista_head.php');
  
  // Body recepcionista - citas
  include('../../../view/users/recepcionista/citas/recepcionista_body.php');

  include('../../../view/users/recepcionista/citas/recepcionista_bodyScript.php');

  include('../../../view/users/recepcionista/citas/recepcionista_body2.php');

  include('../../../view/users/recepcionista/citas/recepcionista_bodyGlobalScript.php');

  include('../../../view/users/recepcionista/citas/recepcionista_body3.php');

  
  // https://alvarotrigo.com/blog/css-calendar/
  // 
  // Para el fotógrafo
  // https://codepen.io/alvarotrigo/pen/KKQzvdr?editors=1100
  
  // End
  include('../../../view/users/recepcionista/recepcionista_end.php');

} else {
  header("Location: ../../../index.php");
}