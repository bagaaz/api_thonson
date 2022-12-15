
# Front-End Chamados Thonson

Esse projeto é o back-end de um sistema de chamados para o laboratório [thonson](https://thonson.com.br), desenvolvido em php (Laravel). Tem outra parte do projeto, que é o [front-end](https://github.com/bagaaz/front_thonson), desenvolvido em React (JavaScript).




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
    