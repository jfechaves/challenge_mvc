
# Aplicativo de Gerenciamento de Usuários

Este é um aplicativo simples para gerenciar usuários, exibindo uma tabela em tempo real com funcionalidades de CRUD (Criar, Ler, Atualizar e Excluir). O projeto foi desenvolvido utilizando **PHP**, **MySQL**, **HTML**, **CSS**, **JavaScript (AJAX)** e **Bootstrap** para a interface. O aplicativo também utiliza **SweetAlert2** para exibir alertas e mensagens amigáveis.

## Requisitos

- **PHP 8+**
- **MySQL** (ou outro banco de dados compatível)
- **Composer** (para gerenciar dependências PHP)
- **Bootstrap** (para a interface do usuário)
- **SweetAlert2** (para alertas e feedbacks)

## Instalação

1. **Clone o repositório:**
   ```
   git clone https://github.com/jfechaves/challenge_mvc
   cd challenge_mvc
   ```

2. **Instale as dependências:**
   Se houver dependências de PHP (via Composer), execute o seguinte comando:
   ```
   composer install
   ```

3. **Configure o banco de dados:**
   No arquivo `config/database.php`, configure as credenciais do banco de dados MySQL (ou outro que preferir):
   ```
   'host' => 'localhost',
   'dbname' => 'nome_do_banco',
   'user' => 'usuario',
   'password' => 'senha',
   ```

4. **Crie a tabela de usuários no MySQL:**
   Execute o seguinte comando SQL para criar a tabela de usuários e criar os usuários:
   ```
   https://github.com/jfechaves/challenge_mvc/config/users.sql
   ```

5. **Execute o servidor PHP:**
   No diretório raiz do projeto, execute o seguinte comando para rodar o servidor PHP:
   ```
   php -S localhost:8000 -t public
   ```

6. **Acesse o aplicativo:**
   Abra seu navegador e acesse `http://localhost:8000`.

## Funcionalidades

- **CRUD Completo:** Criação, leitura, atualização e exclusão de usuários.
- **Atualização em Tempo Real:** A tabela de usuários é atualizada dinamicamente via **AJAX** sem a necessidade de recarregar a página.
- **Validação de Formulário:** O formulário de adição de usuários realiza validação básica dos campos.
- **Filtros de Pesquisa:** O aplicativo permite pesquisar e filtrar usuários com base no nome, email e status.
- **Feedback com SweetAlert2:** Mensagens amigáveis de sucesso, erro ou confirmação são exibidas utilizando a biblioteca **SweetAlert2**.

## Tecnologias Utilizadas

- **PHP 8+** para o backend.
- **MySQL** para armazenar os dados dos usuários.
- **AJAX (via JavaScript)** para atualizações em tempo real.
- **Bootstrap** para a estilização da interface.
- **SweetAlert2** para alertas e mensagens interativas.

## Estrutura de Diretórios

```
/app
   /controllers
       UserController.php
   /models
       User.php
   /views
       users.php
/public
   index.php
/config
   database.php
.gitignore
README.md
```

## Suporte

Se você encontrar qualquer problema, sinta-se à vontade para abrir uma issue no repositório.

## Licença

Este projeto está licenciado sob os termos da licença MIT. Veja o arquivo LICENSE para mais detalhes.
