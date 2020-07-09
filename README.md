# Teste Supera

Teste construído em Laravel, com o template Argon. 

## Iniciando

Clone o projeto, usando o comando abaixo (usando https):

```bash
git clone https://github.com/ogalmeida/testeSupera.git
```

Depois de clonar, acesse o repositório e instale as dependências com os comandos abaixo (para isso, utilize o [composer](https://getcomposer.org/)):

```bash
cd testeSupera
composer install
```

Após instalar as dependências, duplique o arquivo `.env.example` e renomei um deles para `.env`.

Gere uma nova chave da aplicação:

```bash
php artisan key:generate
```

Altere as configurações no arquivo `.env` para que o projeto se conecte ao banco de dados.

Execute o comando abaixo para que as tabelas sejam criadas no banco de dados:

```bash
php artisan migrate
```

Caso queira dados fictícios no banco, utilize o comando:

```bash
php artisan db:seed
```

Por fim, inicie o servidor da aplicação com o comando:

```bash
php artisan serve
```
Para ver o projeto em execução acesse seu [http://localhost:8000](http://localhost:8000)

## Construído com

* [Laravel](https://laravel.com/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
