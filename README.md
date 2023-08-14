# About Address

Este é um projeto `laravel+Vuejs` feito com `docker and docker-compose`

# <span style="color:#007bff"> Conteúdo </span>

-   [Pré requisitos](#Pré-requisitos)
-   [Tecnologias](#Tecnologias)
-   [Configuração do Ambiente](#Configuração-do-Ambiente)

## Pré requisitos
---

Certifique-se de que você tenha instalado os seguintes pré-requisitos em sua máquina de desenvolvimento ou produção.

-   `Docker` - [Download & install Docker](https://docs.docker.com/get-docker/) Certifique-se de que a versão mais recente do Docker tenha sido instalada em sua máquina.
-   `Docker-Compose`- [Download & install Docker-Compose](https://docs.docker.com/compose/install/) Certifique-se de que a versão mais recente do Docker-Compose tenha sido instalada em sua máquina.

### Tecnologias
---

Lista de tecnologias utilizadas neste projeto.

-   PHP : Version 8.1
-   Laravel: Version 9.50.0
-   MySQL: Version 8
-   Node: Version 16.x

### Configuração para ambiente de desenvolvimento:
---

A depender da sua versão do docker compose, os comandos poderão ser executados como docker-compose ou como docker compose, então caso uma não funcione, tente a outra.

-   Copie o `.env.example` para `.env`.
-   Build com `docker-compose build` ou `docker compose build`.
-   Execute com  `docker-compose up -d` ou `docker compose up -d` o ambiente de desenvolvimento.
-   Instale as dependências com `docker-compose exec app composer install` ou `./on-app.sh composer install`
-   Gere a chave da aplicação `docker compose exec app php artisan key:g` ou `./on-app.sh php artisan key:g`
-   Instale as dependencias do front-end com `docker compose exec app npm i` ou `./on-app.sh npm i`.
-   Compile o front-end com `docker compose exec npm run watch` ou `./on-app.sh npm run watch`.
-   Para criar as tabelas no banco execute as migrations com `docker compose exec app php artisan migrate` ou `./on-app.sh php artisan migrate`.
-   Acesse com seu browser favorito `http://localhost:8000`.

### Outras informações
---

-   Para gerar dados fakes para testar a aplicação utilize a factory de Address com `docker compose exec app php artisan db:seed` ou `./on-app.sh php artisan db:seed`.
-   Para rodar os testes primeiro rode as migrations para a base de testes com `docker compose exec app php artisan migrate --env=testing` ou `./on-app.sh php artisan migrate --env=testing`. Em seguida execute os testes com `docker compose exec app php artisan test` ou `./on-app.sh php artisan test`

### Imagens
---

#### Desktop (1080p)
![Busca CEP](https://i.imgur.com/0YoAk5G.png)
#### Desktop (768p)
![Busca CEP](https://i.imgur.com/kbWnT6n.png)
#### Mobile (iPhone 12 Pro)
![Busca CEP](https://i.imgur.com/62ffCIP.png)

