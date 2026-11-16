<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Upload de Arquivo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .upload-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      color: #333333;
    }

    input[type="file"] {
      display: none;
    }

    .custom-file-upload {
      display: inline-block;
      padding: 10px 20px;
      cursor: pointer;
      background-color: #007BFF;
      color: #fff;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .custom-file-upload:hover {
      background-color: #0056b3;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="upload-container">
    <h2>Envie seu Arquivo</h2>
    <form method="post" enctype="multipart/form-data">
      <label for="file-upload" class="custom-file-upload">
        Escolher Arquivo
      </label>
      <input id="file-upload" type="file" name="arquivo" required>
      <br>
      <button type="submit" name="salvar_arquivo">Salvar como arquivo</button>
      <button type="submit" name="salvar_blob">Salvar como blob</button>
      <?php
        if (isset($_SESSION["msg"])){
          echo ('<p style="color: red;"> ' . $_SESSION["msg"] . '</p>');
          unset($_SESSION["msg"]);
        }
      ?>
    </form>
  </div>
  <?php
    
    /* 
      CÓDIGO RESPONSÁVEL POR SALVAR O ARQUIVO NO DISCO
    */
    if (isset($_POST["salvar_arquivo"])){

      $uploadfile = "";

      /*
      A chave de array error contém os códigos de erros, conforme apresentado em https://www.php.net/manual/en/features.file-upload.errors.php

      O código de erro 4 indica que não foi escolhido o arquivo, logo, o != de 4 indica que foi enviado um arquivo.
      */

      if ($_FILES['arquivo']['error'] != 4){
       
        $uploaddir = 'fotos/';  // definindo a pasta para onde os arquivos serão enviados
        $ext = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);  // pegando a extensão do arquivo
        $nome_arquivo = time() . "." . $ext;  // gerando um nome aleatório, no formato 1750178591 e mantendo a extensão do arquivo - nome do arquivo pode ser armazenado no banco de dados
        $uploadfile = $uploaddir . $nome_arquivo; // string que representa o caminho do arquivo

        // movendo o arquivo enviado para o caminho especificado em $uploadfile
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
          $_SESSION["msg"] = "Arquivo enviado com sucesso.";

          require ("conecta.php");

          // criando a consulta para inserir o nome do arquivo no banco
          $stmt = mysqli_prepare($con, "INSERT INTO arquivos (arquivo_path) VALUES (?)");

          if (!$stmt) {
              die("Erro ao preparar statement: " . mysqli_error($con));
          }

          // associa os parâmetros da consulta
          mysqli_stmt_bind_param($stmt, "s", $nome_arquivo);

          // executa a query
          if (mysqli_stmt_execute($stmt)) {
              $_SESSION["msg"] .= "Entrada do arquivo inserida com no banco de dados";
          } else {
              $_SESSION["msg"] .= "Houve um erro na hora de armazenar a entrada do arquivo no banco de dados";

          }

        } else {
          $_SESSION["msg"] = "Houve um erro ao salvar o arquivo: Código do erro: " . $_FILES['arquivo']['error'];
        }
      } 

      echo '<script>
        window.location.href = "mensagem.php";
      </script>';
    }


    /* 
      CÓDIGO RESPONSÁVEL POR SALVAR O ARQUIVO NO BANCO DE DADOS
    */

    if (isset($_POST["salvar_blob"])) {

      // is_uploaded_file retorna true se o arquivo foi enviado via POST
      if (is_uploaded_file($_FILES['arquivo']['tmp_name'])) {
        
        // transforma o arquivo lido em bytes
        $imgData = file_get_contents($_FILES['arquivo']['tmp_name']);
        
        // pegando o tipo do arquivo
        $tipo_arquivo = $_FILES['arquivo']['type'];
        
        // armazenando o tamanho do arquivo - valor em bytes (int)
        $tamanho_arquivo = $_FILES['arquivo']['size'];

        require ("conecta.php");

        // criando a consulta para inserir as informações do arquivo no banco
        $stmt = mysqli_prepare($con, "INSERT INTO arquivos (arquivo_blob, tipo_arquivo, tamanho_arquivo) VALUES (?, ?, ?)");

        if (!$stmt) {
            die("Erro ao preparar statement: " . mysqli_error($con));
        }

        // associa os parâmetros da consulta
        mysqli_stmt_bind_param($stmt, "bsi", $imgData, $tipo_arquivo, $tamanho_arquivo);

        // envia os dados binários
        mysqli_stmt_send_long_data($stmt, 0, $imgData);

        // executa a query
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["msg"] = "Inserido com sucesso";
        } else {
            $_SESSION["msg"] = "Houve falha: " . mysqli_stmt_error($stmt);
        }
      }
      echo '<script>
        window.location.href = "mensagem.php";
      </script>';
    }

  ?>
</body>
</html>
