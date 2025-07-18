<?php
if ($_POST['paso'] == 1) {
  // Creamos un instancia de la clase ZipArchive
 $zip = new ZipArchive();
 $nom='';
 for ($i=0; $i < 5; $i++) { 
    $nom  .= rand();
 }
 $nom .= ".zip";
 // Creamos y abrimos un archivo zip temporal
  $zip->open($nom,ZipArchive::CREATE);
  // Añadimos un directorio
  $dir = 'miDirectorio';
  $zip->addEmptyDir($dir);
  $zip->addFile($_POST['img'], $dir."/".$_POST['img']);
  $zip->addFile($_POST['video'], $dir."/".$_POST['video']);
  $zip->addFile($_POST['pdf'], $dir."/".$_POST['pdf']);
  $zip->addFile($_POST['excel'], $dir."/".$_POST['excel']);
 
  // Una vez añadido los archivos deseados cerramos el zip.
  $zip->close();
  // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
  header("Content-type: application/octet-stream");
  header("Content-disposition: attachment; filename=$nom");
  echo $nom;
}
else if ($_POST['paso'] == 2) {
  echo $_POST['nombre'];
  unlink($_POST['nombre']);
}

?>