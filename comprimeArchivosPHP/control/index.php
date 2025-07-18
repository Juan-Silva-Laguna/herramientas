<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form>
<input type="text" id="img" value="../Proyectos/img.jpg">
<input type="text" id="video" value="../Proyectos/video.mp4">
<input type="text" id="pdf" value="../Proyectos/pdf.pdf">
<input type="text" id="excel" value="../Proyectos/excel.xlsx">
<input type="submit" id="env" value="enviar">
  </form>
  <script src="jquery.js"></script>
  <script>
  $(document).ready(function() {
    $(document).on('click', '#env', function (e) {   
        const datos = {
            img: $('#img').val(),
            video: $('#video').val(),
            pdf: $('#pdf').val(),
            excel: $('#excel').val(),
            paso: 1
        };        
        $.post('zip.php', datos, function (respuesta) {
          window.location.href = respuesta;
          setTimeout(() => {
            $.post('zip.php', {nombre: respuesta, paso: 2}, function (res) {
              console.log(res);
            });
          }, 5000);
            
        });
            
        e.preventDefault();
    }); 
  })
  
  </script>
</body>
</html>