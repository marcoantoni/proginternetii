# Resumo da Aula – Programação para Internet

**Data:** 01/06/2026

Esta foi a primeira aula sobre **CRUD (Create, Read, Update e Delete)**, na qual foi desenvolvida a operação **Create**, responsável por inserir dados em um banco de dados.

Para alcançar esse objetivo, foram realizados os seguintes passos:

## 1. Download do repositório e organização da estrutura de pastas

Inicialmente, foi realizado o download do repositório utilizado na disciplina. O objetivo era garantir que todos os alunos possuíssem a seguinte estrutura de diretórios:

```text
aula-crud
│
├── docker-compose.yml
├── Dockerfile
└── www
    └── form
```

Foram adicionados dois novos arquivos ao projeto:

* `docker-compose.yml`
* `Dockerfile`

Esses arquivos têm como objetivo configurar o ambiente de desenvolvimento utilizando Docker. Além disso, foram instaladas as extensões necessárias para que o PHP possa realizar operações com banco de dados MySQL e foi habilitado o módulo do Apache responsável pela listagem de diretórios, evitando a necessidade de informar URLs completas para acessar os arquivos do projeto.

---

## 2. Reconstrução do container

Após a criação ou alteração do arquivo `Dockerfile`, foi demonstrado como reconstruir o container para que as novas configurações fossem aplicadas.

O processo consiste em acessar a pasta do projeto e executar o comando:

```bash
docker compose up -d --build
```

Esse comando força a reconstrução da imagem Docker utilizando as instruções presentes no `Dockerfile` e recria os containers necessários para a execução da aplicação.

Também foi explicado que, sempre que houver alterações no `Dockerfile`, será necessário reconstruir a imagem para que as mudanças entrem em vigor.

---

## 3. Renomeação da pasta do projeto

A pasta `form` foi renomeada para `aluno`.

Essa alteração foi realizada para manter um padrão de organização do projeto. Como anteriormente foi desenvolvido um formulário para cadastro de alunos, todos os arquivos relacionados à manipulação dessa tabela ficarão dentro da pasta `aluno`, facilitando a organização e manutenção do sistema.

---

## 4. Atualização da interface utilizando Inteligência Artificial

Foi solicitado que cada aluno utilizasse alguma ferramenta de Inteligência Artificial para criar uma nova interface para o sistema.

Após a geração da interface, cada aluno atualizou o arquivo `cad_aluno.php`, aplicando melhorias visuais ao formulário de cadastro.

---

## 5. Criação do banco de dados

Foi demonstrado o processo de criação do banco de dados utilizando o phpMyAdmin.

Foram apresentados dois cenários de acesso:

### Utilizando Docker

```text
http://127.0.0.1:8081
```

### Utilizando XAMPP

```text
http://127.0.0.1/phpmyadmin
```

Durante a demonstração, foi explicado como acessar a ferramenta e criar a estrutura necessária para armazenar os dados do sistema.

---

## 6. Criação da tabela `alunos`

Após a criação do banco de dados, foi criada uma tabela chamada `alunos`.

Essa tabela será responsável por armazenar todas as informações cadastradas através do formulário desenvolvido nas aulas.

---

## 7. Integração do formulário com o banco de dados

Por fim, foi realizada a atualização do arquivo [processa.php](https://github.com/marcoantoni/proginternetii/blob/main/www/alunos/processa.php).

Nas aulas anteriores, esse arquivo apenas recebia os dados enviados pelo formulário e os exibia na tela para fins de teste.

Nesta aula, o comportamento foi alterado para que os dados recebidos sejam inseridos diretamente na tabela `alunos` do banco de dados, permitindo que as informações cadastradas sejam armazenadas de forma permanente.

---

## Observação

Este resumo foi gerado com o auxílio do ChatGPT e revisado pelo professor, com base nos tópicos abordados durante a aula e organizados em ordem cronológica para facilitar a consulta dos estudantes.

