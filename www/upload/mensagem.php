<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mensagem</title>
  <!-- redireciona para upload.php após 5 segundos -->
  <meta http-equiv="refresh" content="5; url=upload.php">
</head>
<body>
  <?php
    if (isset($_SESSION["msg"])) {
        echo '<p style="color: red;">' . $_SESSION["msg"] . '</p>';
        unset($_SESSION["msg"]);
        echo "<p>Você será redirecionado em 5 segundos...</p>";
    }
  ?>

</body>
</html>
