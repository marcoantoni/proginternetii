<?php

// Parâmetro recebido via GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id < 1) {
    die("ID inválido.");
}

require "conecta.php";

// busca o BLOB pelo ID

// o ? indica quais são os valores dos parametros
$sql = "SELECT arquivo_blob FROM arquivos WHERE id = ?";

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// verifica se a consulta retornou resultados
if (mysqli_stmt_num_rows($stmt) === 0) {
    die("Arquivo não encontrado.");
}

mysqli_stmt_bind_result($stmt, $arquivo_blob);
mysqli_stmt_fetch($stmt);

// fecha o $stmt e a conexão com o BD
mysqli_stmt_close($stmt);
mysqli_close($con);


// Converte o binário para Base64
$base64 = base64_encode($arquivo_blob);

// Detecta o tipo da imagem (opcional, mas bom para não fixar)
$info = getimagesizefromstring($arquivo_blob);
$mime = $info['mime'] ?? 'image/jpeg';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Exibir Imagem do Banco</title>
</head>
<body>
  <h2>Imagem lida diretamente do banco (convertida em Base64)</h2>
  <img src="data:<?php echo $mime; ?>;base64,<?php echo $base64; ?>" width="300" alt="Imagem do Banco">
</body>
</html>