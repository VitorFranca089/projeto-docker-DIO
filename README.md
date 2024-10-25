# Desafio DIO: Aplicação WEB com Docker 🐋

Bem vindo(a) ao meu repositório! Aqui você encontrará a minha resolução do desafio de projeto da [DIO](https://www.dio.me/en) de [Docker](https://github.com/denilsonbonatti/docker-projeto1-dio), presente no Bootcamp [Spring Boot e Angular](https://web.dio.me/track/coding-the-future-spring-boot-angular-17).

## Sobre o desafio

O desafio consistiu em criar um container de uma aplicação web básica utilizando os recursos abordados no curso (como Dockerfile e Docker Compose).

Eu criei uma aplicação simples em PHP, em que o usuário pode cadastrar o seu nome de usuário e email, e ver as informações adicionadas em uma tabela.

Dessa forma eu pude praticar conceitos como:
- Utilização prática do Docker Compose para rodar os containers necessários para a aplicação rodar (PHP, Apache e MySQL).
- Utilização do Dockerfile para instalar e habilitar a extensão MySQLi no PHP.
- Inicialização do MySQL com a tabela `users` criada pelo script `init.sql` definida no `docker-compose.yml`.

## Como executar o projeto

1. Clone o repositório:
```bash
git clone https://github.com/VitorFranca089/projeto-docker-DIO.git
```
2. Execute o docker-compose dentro da pasta do projeto:
```bash
docker-compose up --build
```
3. Após a execução abra o seu navegador em [localhost](http://localhost:8080).