# Banco Fadergs

## Instalação
```
$ git clone https://github.com/JonatanColussi/banco-fadergs

$ cd banco-fadergs/

$ composer install

$ cp .env.example .env

$ php artisan key:generate
```

### Editar .env

É necessário criar um banco de dados com o nome de "fadergs" ou o que desejar. Feito isto, inserir as configurações de banco nas sequintes linhas do arquivo .env:

DB_CONNECTION=mysql  	# Tipo de conexão
 
DB_HOST=127.0.0.1 		# Host

DB_PORT=3306			# Porta

DB_DATABASE=fadergs 	# Nome do banco

DB_USERNAME=root 		# Usuário

DB_PASSWORD= 			# Senha

### Voltando ao terminal
```
$ php artisan migrate
```

### Iniciando Servidor
```
$ php artisan serve
```