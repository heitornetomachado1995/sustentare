# sustentare
# Sustentare - Plataforma de Educação em Sustentabilidade Empresarial

## Descrição do Projeto
Sustentare é uma aplicação web educativa que promove o aprendizado sobre práticas sustentáveis em empresas. A plataforma oferece:  
- Materiais de estudo sobre sustentabilidade empresarial.  
- Quizzes interativos para testar o conhecimento do usuário.  
- Acompanhamento do progresso com pontuação e feedback.  
- Sistema de autenticação com cadastro e login de usuários.  

O projeto foi desenvolvido como parte do **Projeto Integrador Transdisciplinar de Engenharia de Software**.

## Tecnologias Utilizadas
- **Front-end:** HTML, CSS, JavaScript  
- **Back-end:** PHP  
- **Banco de Dados:** MySQL / MariaDB  
- **Controle de versões:** Git / GitHub  

## Estrutura de Arquivos

/ (raiz do projeto)
│-- index.php          # Página inicial  
│-- conteudos.php      # Materiais de estudo  
│-- quiz.php           # Quizzes interativos  
│-- progresso.php      # Visualização de progresso do usuário  
│-- login.php          # Formulário de login  
│-- logout.php         # Encerramento de sessão  
│-- register.php       # Cadastro de usuários  
│-- db.php             # Conexão com o banco de dados  
│-- style.css          # Estilo visual do sistema  
│-- script.js          # Script JS simples  
│-- quiz.sql           # Banco de dados e dados iniciais  

## Banco de Dados
O projeto utiliza um banco MySQL/MariaDB com as seguintes tabelas:  

1. **usuarios**
- id (INT, PK, AUTO_INCREMENT)  
- nome (VARCHAR)  
- email (VARCHAR, UNIQUE)  
- senha (VARCHAR)  
- data_cadastro (TIMESTAMP)  

2. **quizzes**
- id (INT, PK, AUTO_INCREMENT)  
- pergunta (VARCHAR)  
- opcao_a, opcao_b, opcao_c, opcao_d (VARCHAR)  
- resposta_correta (CHAR)  

3. **respostas**
- id (INT, PK, AUTO_INCREMENT)  
- usuario_id (INT, FK para usuarios)  
- quiz_id (INT, FK para quizzes)  
- resposta (CHAR)  
- data_resposta (TIMESTAMP)  

O arquivo **quiz.sql** já contém a criação das tabelas e alguns dados de exemplo.

## Instalação e Execução

1. Clone o repositório:
```bash
git clone https://github.com/heitornetomachado1995/sustentare.git
```

2. Importe o banco de dados:
```bash
mysql -u SEU_USUARIO -p nome_do_banco < quiz.sql
```

3. Configure as credenciais do banco de dados no arquivo `db.php`:
```php
$host = "localhost";      // Host do banco
$user = "seu_usuario";    // Usuário MySQL
$pass = "sua_senha";      // Senha MySQL
$db   = "nome_do_banco";  // Nome do banco criado
```

4. Abra o navegador e acesse a página inicial:
```
index.php
```

5. Crie uma conta ou faça login com um usuário já cadastrado.

## Funcionalidades

- Cadastro e login de usuários com criptografia de senha.  
- Visualização de conteúdos educativos sobre sustentabilidade.  
- Realização de quizzes interativos e armazenamento das respostas.  
- Acompanhamento do progresso do usuário com feedback visual.  
- Logout seguro com encerramento de sessão.  

## Observações

- Todos os dados de quizzes e respostas são salvos no banco MySQL/MariaDB.  
- A plataforma utiliza PHP Sessions para controle de autenticação.  
- Front-end responsivo, compatível com desktop, tablets e celulares.  
- Para testes, utilize o usuário demo cadastrado ou crie novos usuários via interface.  

## Links Úteis
- Repositório GitHub: [https://github.com/heitornetomachado1995/sustentare](https://github.com/heitornetomachado1995/sustentare)  

## Contato
Desenvolvido por **Heitor Neto Machado** – 2025
