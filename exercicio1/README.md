## Informações do Projeto
O Projeto foi desendolvido usando `Laravel 9.x`, `PHP 8.1` e de banco de dados `Mysql`.
Projeto desenvolvido por: Isaac Lopes

## Requisitos para Instalar

- Docker
- Docker Compose

## Instalando

- Clone o repositório do projeto.
- Acesse a pasta do repositório através do terminal e digite o comando: `docker-compose up`.
- Após terminar de subir o docker vá novamente na pasta do projeto e renomeie o arquivo `.env.template` para `.env`.
- Configure o env com os dados do seu banco de dados.
- Abra o terminal e digite o comando: `docker exec -it php bash`.
- Em seguida digite `cd NOME_DA_PASTA_DO_PROJETO`.
- Em seguida digite o comando: `php artisan key:generate`.
- Em seguida digite o comando: `php artisan migrate`
- Acesse o projeto em "http://localhost:80"