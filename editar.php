<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulário de envio de mensagem</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php
		$id_atendimento = $_GET["id"];

		// conecta ao banco de dados
		$conn = mysqli_connect("127.0.0.1", "root", "", "programacaoparainternet");

		if ($conn){
			$sql = "SELECT * FROM atendimentos WHERE id = $id_atendimento";

			$resultado = mysqli_query($conn, $sql);

			if (mysqli_num_rows($resultado) == 1){
				$atendimento = mysqli_fetch_array($resultado);

				$nome	= $atendimento['nome'];
				$nasc	= $atendimento['nascimento'];
				$cpf	= $atendimento['cpf'];
				$fone	= $atendimento['telefone'];
				$email	= $atendimento['email'];
				$sexo	= $atendimento['sexo'];
				$msg 	= $atendimento['mensagem'];
			} else {
				die("Atendimento não encontrado");
			}
		}
	?>
	<form method="POST" action="atualizar.php">
		<fieldset>
			<legend>Enviando uma mensagem</legend>
			<div class="input-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" placeholder="Seu nome completo" value="<?php echo ($nome); ?>"> 
			</div>
			<div class="input-group">
				<label for="nome">Nascimento</label>
				<input type="date" name="nasc" value="<?php echo ($nasc); ?>">
			</div>
			<div class="input-group">
				<label for="cpf">CPF</label>
				<input type="text" name="cpf" value="<?php echo ($cpf); ?>">
			</div>
			<div class="input-group">
				<label for="cpf">Telefone</label>
				<input type="tel" name="fone" value="<?php echo ($fone); ?>">
			</div>
			<div class="input-group">
				<label for="cpf">Email</label>
				<input type="email" name="email" value="<?php echo ($email); ?>">
			</div>
			<div class="radio-group">
				<label for="sexo">Sexo</label> <br>
				<input type="radio" name="sexo" value="1" <?php if ($sexo == 1) echo ("checked"); ?> > Feminino 
				<input type="radio" name="sexo" value="2" <?php if ($sexo == 2) echo ("checked"); ?>>Masculino 
				<input type="radio" name="sexo" value="3" <?php if ($sexo == 3) echo ("checked"); ?>> Intersexo
			</div>
			Qual o melhor dia e horário para entrar em contato? <br>
			Horário <input type="time" name="horario"> <br>
			Dia da semana <br>
			<input type="checkbox" name="seg"> Segunda-feira 
			<input type="checkbox" name="ter"> Terça-feira 
			<input type="checkbox" name="qua"> Quarta-feira 
			<input type="checkbox" name="qui"> Quinta-feira 
			<input type="checkbox" name="sex"> Sexta-feira 
			<input type="checkbox" name="sab"> Sabádo 
			<br>
			Qual o seu problema?<br>
			<textarea cols="80" rows="5" name="mensagem"><?php echo ($msg); ?></textarea> <br>
			<!--<button>Enviar</button>-->
			<div class="input-group">
				<input type="submit" class="btn" name="enviar" value="Salvar"> 
			</div>
		</fieldset>
	</form>
</body>
</html>