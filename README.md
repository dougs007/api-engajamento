<h1 align="center">API Engajamento</h1>
<p align="center">
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#️-instalação">Instalação</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-como-usar">Como usar</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#memo-licença">Licença</a>
</p>
<p align="center">

[comment]: <> (<img src="https://i.imgur.com/" alt="Engajamento Sample Image">)
</p>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-blue.svg?cacheSeconds=2592000" />
</p>

## :rocket: Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

Backend:
- PHP/Laravel
- Docker Compose
- JWT
- PostgreSQL as database

## 💻 Projeto

API Engajamento é o backend da aplicação de gerência e controle de atividades de líderes da igreja sara nossa terra.

## 🏃🏽‍♂️ Instalação

Faça o clone desse projeto na sua máquina.

Vamos dividir em `3 passos` simples.

1. Utilização com Docker.
2. Utilização sem Docker.
3. Start da aplicação.

Vamos lá!

---

### 🗂 1 Utilizar com Docker

1. Na raiz do projeto, rode o código abaixo.

```sh
docker-compose up -d
```

*Verifique se sua internet está estável, pois isso poderá levar um tempo (3 min)*

2. Após finalizado o passo acima, pule para o passo 3.
---

### 🗄 2 Utilizar sem Docker.

1. Considerando que tenha em sua máquina o ambiente PHP/PostgreSQL/Laravel, rode o comando abaixo.

```sh
composer install
```

2. Após o comando executado acima, copie o arquivo ```.env-example``` e crie um chamado
   ```.env```, após isso configure as variáveis de banco da aplicação.

*Caso esteja no Linux, é necessário verificar as permissões do diretório /storage.*

3. Após finalizada as etapas acima, basta executar o comando ```php artisan serve``` e
   abrir o browser no endereço ```localhost:8080/```.

**IMPORTANTE**
- O arquivo com os endpoints é o ```api.php```, posteriomente termos documentação dos endpoints.

Se tudo deu certo, então, vá para o próximo passo.

---

### 🌱 3 Start da aplicação


1. Após finalizado as etapas acima, caso esteja usando docker, acesse:
    http://localhost:8082

*Caso queira popular registros na base de dados, execute os comandos abaixo:*

```sh
docker exec -it api-php-engajamento /bin/bash
```

```sh
php artisan migrate:fresh --seed
```

Após executado os passos acima, Agora abra seu navegador e navegue até:
http://localhost:8082

## :memo: Licença

Esse projeto está sob a licença MIT.

---
