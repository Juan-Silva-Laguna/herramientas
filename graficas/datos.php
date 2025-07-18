<?php  
  $servidor="localhost";
  $usuario="root";
  $password="";
  $bd="graficas";

  $conexion=mysqli_connect($servidor,$usuario,$password,$bd);

  $sql="SELECT * FROM datos";
  $ejecuta=mysqli_query($conexion,$sql);
  $result = mysqli_fetch_all($ejecuta);

  echo json_encode($result);
?>