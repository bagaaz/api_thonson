# Front-End Chamados Thonson

Esse projeto é o back-end de um sistema de chamados para o laboratório [thonson](https://thonson.com.br), desenvolvido em php (Laravel). Tem outra parte do projeto, que é o [front-end](https://github.com/bagaaz/front_thonson), desenvolvido em React (JavaScript).

## Funcionalidades

-   Autenticação de usuários
-   CRUD de chamados
-   CRUD de usuários
-   CRUD de comentários em chamados

## Instalação

Após clonar o projeto para sua pasta local, gere o .env com base no .env.example, e preecha os campos corretamente, principalmente o do banco de dados.

```bash
  cp .env.example .env
```

Instale as blibliotecas do composer (necessario ter o composer instalado em sua maquina).

```bash
  composer install
```

Gere o token da aplicação com o seguinte comando.

```bash
  php artisan key:generate
```

Rode as migrations, juntamente com as seed para gerar o banco de dados e as tabelas.
Usuario padrão admin@thonson.com.br e senha 123456

```bash
  php artisan migrate --seed
```

Caso precise popular o banco com dados fake, segue os comandos para seed de chamados e comentarios respectivamentes.

```bash
    php artisan db:seed --class=ChamadoSeeder
    php artisan db:seed --class=ComentarioSeeder
```

## Endpoints

### Autenticação

-   POST /api/login: Recebe um JSON com os campos email e password e retorna um token de acesso.

### Chamados

-   GET /api/chamado: Retorna a lista de todos os chamados.
-   POST /api/chamado/store: Recebe um JSON com os campos do chamado e cria um novo chamado.
-   GET /api/chamado/show/{id}: Retorna um chamado específico, conforme o id passado como parâmetro.
-   POST /api/chamado/update/{id}: Recebe um JSON com os campos do chamado e atualiza um chamado existente, conforme o id passado como parâmetro.
-   GET /api/chamado/destroy/{id}: Remove um chamado existente, conforme o id passado como parâmetro.

### Usuários

-   GET /api/usuario: Retorna a lista de todos os usuários.
-   POST /api/usuario/store: Recebe um JSON com os campos do usuário e cria um novo usuário.
-   GET /api/usuario/show/{id}: Retorna um usuário específico, conforme o id passado como parâmetro.
-   POST /api/usuario/update/{id}: Recebe um JSON com os campos do usuário e atualiza um usuário existente, conforme o id passado como parâmetro.
-   GET /api/usuario/destroy/{id}: Remove um usuário existente, conforme o id

### Comentários

-   GET /api/comentario: Retorna a lista de todos os comentários.
-   POST /api/comentario/store: Recebe um JSON com os campos do comentário e cria um novo comentário.
-   GET /api/comentario/show/{id}: Retorna um comentário específico, conforme o id passado como parâmetro.
-   POST /api/comentario/update/{id}: Recebe um JSON com os campos do comentário e atualiza um comentário existente, conforme o id passado como parâmetro.
-   GET /api/comentario/destroy/{id}: Remove um comentário existente, conforme o id passado como parâmetro.

## Rotas de autenticação

### Login

-   Rota: POST /api/login
-   Parâmetros:
-         email: string (required)
-         password: string (required)
-   Retorno:
-           Caso o usuário e senha sejam válidos:
-               token: string
-   Exemplo de retorno:

```
"token": "7|xUrfTw02nVTXGIPZiSRVFc66UIk9k1eDvcjxvYVb"
```
