<?php 
    // 17 de agosto. Operação de edição. Esse arquivo é uma cópia de cad_aluno.php. Ele será terminado na próxima aula.
    
    // Inclui o arquivo responsável pela conexão com o banco de dados.
    require_once("../conecta.php");

    // Obtém, pela URL, o ID do aluno que será consultado.
    $id_aluno = $_GET["id"];

    // Monta uma consulta SQL para buscar o aluno pelo seu ID.
    $sql = "SELECT * FROM alunos WHERE id = $id_aluno";

    // Executa a consulta no banco de dados.
    $resultado = mysqli_query($conn, $sql);

    // Verifica se a consulta encontrou exatamente um aluno.
    if (mysqli_num_rows($resultado) == 1) {

        // Obtém os dados do aluno encontrado.
        $aluno = mysqli_fetch_array($resultado);

        // Armazena os dados do aluno em variáveis.
        $nome = $aluno["nome"];
        $nascimento = $aluno["nascimento"];
        $email = $aluno["email"];
        $curso = $aluno["curso"];
        $turno = $aluno["turno"];

        // Áreas de interesse
        $programacao = $aluno["programacao"];
        $banco_dados = $aluno["banco_dados"]; 
        $redes = $aluno["redes"];
        $eng_software = $aluno["eng_software"];

    } else {
        // Aluno não encontrado.
        // O tratamento dessa situação será desenvolvido posteriormente.
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionando novo aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0">Adicionando novo estudante</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="processa.php">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $nome ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nascimento" class="form-label">Nascimento</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?= $nascimento ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                            </div>

                            <div class="mb-3">
                                <label for="curso" class="form-label">Curso</label>

                                <!-- 
                                    Os valores (1, 2, 3, etc.) representam os identificadores
                                    dos cursos cadastrados no banco de dados. Esses IDs serão
                                    armazenados na tabela relacionada como chave estrangeira,
                                    referenciando a chave primária da tabela de cursos.

                                    Nas próximas aulas, esse select será desenvolvido com
                                    informações vindas do banco de dados. Por esse motivo, não foi tratado.
                                -->
                                <select class="form-select" id="curso" name="curso">
                                     <?php
                                        // Inclui o arquivo responsável pela conexão com o banco de dados
                                        require_once("../conecta.php");

                                        // Monta a consulta para buscar todos os cursos,
                                        // ordenando os resultados pelo nome em ordem alfabética
                                        $sql = "SELECT * FROM cursos ORDER BY nome ASC";

                                        // Executa a consulta no banco de dados
                                        $resultado = mysqli_query($conn, $sql);

                                        // Percorre todos os cursos retornados pela consulta
                                        while ($row = mysqli_fetch_array($resultado)) {

                                            // se o id da tabela curso for o mesmo que o aluno tem no campo id_curso, insere o atributo selected
                                            if ($row["id"] == $curso)
                                                echo ("<option value=\"$row[id]\" selected> $row[nome]</option>");
                                            else
                                                echo ("<option value=\"$row[id]\"> $row[nome]</option>");
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Turno</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="turno_m" name="turno" value="m"
                                        <?= $turno == 'm' ? 'checked' : '' ?> >
                                    <!-- Se o turno do aluno for "m", inclui o atributo checked. -->
                                    <label class="form-check-label" for="turno_m">Manhã</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="turno_t" name="turno" value="t"
                                        <?= $turno == 't' ? 'checked' : '' ?> >
                                    <!-- Se o turno do aluno for "t", inclui o atributo checked. -->
                                    <label class="form-check-label" for="turno_t">Tarde</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="turno_n" name="turno" value="n"
                                        <?= $turno == 'n' ? 'checked' : '' ?>>
                                    <!-- Se o turno do aluno for "n", inclui o atributo checked. -->
                                    <label class="form-check-label" for="turno_n">Noite</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label d-block">Áreas de interesse</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="programacao" name="interesses[]" value="programacao"
                                        <?= $programacao == 1 ? 'checked' : '' ?> >
                                    <!-- Se programação for uma área de interesse do aluno, marca o checkbox. -->
                                    <label class="form-check-label" for="programacao">
                                        Programação
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="banco_de_dados" name="interesses[]" value="banco_de_dados"
                                        <?= $banco_dados == 1 ? 'checked' : '' ?> >
                                    <!-- Se banco de dados for uma área de interesse do aluno, marca o checkbox. -->
                                    <label class="form-check-label" for="banco_de_dados">
                                        Banco de dados
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="redes" name="interesses[]" value="redes"
                                        <?= $redes == 1 ? 'checked' : '' ?> >
                                    <!-- Se redes for uma área de interesse do aluno, marca o checkbox. -->
                                    <label class="form-check-label" for="redes">
                                        Redes de computadores
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="engenharia_de_software" name="interesses[]" value="engenharia_de_software"
                                        <?= $eng_software == 1 ? 'checked' : '' ?> >
                                    <!-- Se engenharia de software for uma área de interesse do aluno, marca o checkbox. -->
                                    <label class="form-check-label" for="engenharia_de_software">
                                        Engenharia de software
                                    </label>
                                </div>
                            </div>

                            <!-- 
                                Campo oculto que envia o ID do aluno para o processa.php.
                                O ID permite identificar qual cadastro deve ser atualizado.
                            -->
                            <input type="hidden" name="id_aluno" value="<?= $id_aluno ?>" >

                            <button type="submit" name="enviar" class="btn btn-primary w-100">
                                Cadastrar aluno
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>