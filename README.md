# primeiro-app-laravel

Dependências para criar esta aplicação no Laravel:

-wsl 2.0
-laravel 9.4.1  / composer 2.2.7
-docker 20.10.7 / docker-compose 1.29.2 / Laradock

-------------------------
Resumo da aplicação:
 
Site constitucional com formulário de contato e vizualição de categorias e produtos feito com Laravel 9.4.1 e PHP 8.1. 

Funcionalidades:

- Rotas e Controllers criados para todas as páginas.
- Models e Migrações criados para as páginas de categorias de produtos, produtos, blog e contato.	
- Relação criada entre produtos e categorias de produtos.
- Integração do banco de dados nas páginas de categorias de produtos, produtos e contato.
- Slug inserido nas páginas de categoria de produtos.
- Usadas as funções do laravel de extensão do layout em todas as páginas e de conteúdo.
- Notificação de e-mail criada para o formulário de contato dentro da página de contato.
- Validações criadas para todos os campos do formulário de contato.
- Notificação de contato criado com sucesso usando o Toastr.

-------------------------

Para o funcionamento da aplicação:
	- sudo apt-get update
	- composer install
	- php artisan key:generate

Para o levantamento do ambiente foi usado Docker e Laradock, dos quais usei os seguintes containers:
	- sudo docker-compose up -d nginx mysql phpmyadmin

Para entrar dentro do workspace da aplicação:
	- sudo docker-compose exec --user=laradock workspace bash

Comandos utilizados dentro do workspace:
	- php artisan migrate
	- php artisan tinker

Instalando o toastr ( https://github.com/yoeunes/toastr ): 
	- composer require yoeunes/toastr

Notificação de e-mail usando o MailTrap ( https://mailtrap.io/ ):
	- Fazer as alterações no .env de acordo com o MailTrap.
	- Alterar também no .env: QUEUE_CONNECTION=database
	- Para ativar a fila e enviar o e-mail : php artisan queue:work --tries=3
	- Depois basta preencher o formulário e enviar. 	

Inserindo uma categoria de produtos no banco de dados através do tinker:
	- $category = Category::create(['name' => 'Categoria de teste 2', 'image' => 'images/markus-spiske-hvSr_CVecVI-unsplash.jpg', 'description' => 'Descrição da categoria de teste 2']);

Inserindo um produto no banco de dados com o tinker:
	- $product = Product::create(['category_id' => '2', 'name' => 'Produto categoria 2', 'description' => 'Descrição do produto categoria 2', 'exclusive' => '1']);
