# Desafio Multti

## Descrição do **[Docker compose](https://docs.docker.com/compose/)**

- php `v8.61.0`.
- servidor [nginx](https://www.nginx.com/) rodando nas portas **8000**.
- [mysql](https://www.mysql.com/) na porta **3306**.
- [phpmyadmin](https://www.phpmyadmin.net/) na porta **8080**.

### Diretórios do projeto
- **[docker-compose](https://github.com/joaopedro1997/teste-multti/tree/master/docker-compose)**: contém arquivos de configuração do **nginx** e configurações e persistência do **mysql**.

## Como executar o projeto?

### Pré-requisitos
* git
* docker
* docker-compose

### Executando o projeto

Clone o projeto:
```
git clone https://github.com/joaopedro1997/teste-multti.git
```

O arquivo `.env.example` possuem dados genéricos para configuração da aplicação. Faça uma copia do `.env.example` e renomeie para `.env`.

No arquivo **[docker-composer.yml](https://github.com/joaopedro1997/teste-multti/blob/master/docker-compose.yml)**,  altere em args, o `user`, de joaop para seu username do linux.

Execute os contêineres do docker:
```
docker-compose up -d
```

Entre no contêiner do PHP:
```
docker exec -it teste-multti-app bash
```

Obs: O comando anterior te levará direto para o WORKDIR do contêiner: /var/www/.

Dentro do contêiner, instale as dependências:
```
composer install
```

Gere o APP_KEY executando:
```
php artisan key:generate
```
Rode as migrations :
```
php artisan migrate
```

Rode o comando :
```
php artisan optimize 
```

## Sobre o autor
> [João Pedro Amaral Dias](https://www.linkedin.com/in/jo%C3%A3o-pedro-amaral-dias/)
> 
> [joaopedrodiasamaral@gmail.com](mailto:joaopedrodiasamaral@gmail.com)

### ROTAS
`caso utilize o insomnia o arquivo de importação esta na raiz do projeto.`

version:
```
GET:
http://localhost:8000/api
```
index:
```
GET:
http://localhost:8000/api/multti
```
show:
```
GET:
http://localhost:8000/api/multti/1
```
post:
```
POST:
http://localhost:8000/api/multti
{
	"nome":"MULTTI",
	"email":"mullti@test.com",
	"telefone":"999999999",
	"senha":"123"
}
```
update:
```
PUT:
http://localhost:8000/api/multti/1
{
	"nome":"MULTTI2",
	"email":"mullti@test.com",
	"telefone":"999999999",
	"senha":"123456"
}
```
delete:
```
DELETE:
http://localhost:8000/api/multti/1
```

