# Banco Yaakov

## Instalação

Instale as dependências do projeto via composer

```
composer install
```

Configure o autoload

```
composer dump-autoload
```

## Configuração

Copiar a estrutura dos arquivo exemplo de váriáveis de ambiente

```
cp .env.example .env
```

Em seguida

```
php artisan key:generate
```

Configure as credenciais de acesso ao banco

```
DB_CONNECTION=sqlite
DB_FOREIGN_KEYS=true
```

Crie um arquivo `database.sqlite` na raiz da pasta database

Caso não tenha o php-sqlite habilitado colocar no seu php.ini

```
extension_dir = "<php installation directory>/php-7.4.3/ext"
extension=php_pdo_sqlite.dll
extension=php_sqlite3.dll
sqlite3.extension_dir = "<php installation directory>/php-7.4.3/ext"
```

Gerar a estrutura base do banco de dados:

```
php artisan migrate
```

Em seguida criar os dados de teste

```
php artisan db:seed
```

## Execução

Executar o sistema

```
php artisan serve
```

## Exemplos

Para criar uma nova conta, com saldo, o payload abaixo deve ser enviado para o endpoint **/api/accounts** com uma requisição do tipo POST:

```
{
    "name": "Teste",
    "password":"1111",
    "account_number":"111",
    "balance": 100.00,
    "account_code":"22",
    "agency":"333"
}
```

A conta padrão criada pela seeder é a seguinte:

```
{
    "name": "Thiago Dantas",
    "password" : "1111",
    "account_number" : "111",
    "account_code" : "22",
    "balance" : 1000,
    "agency": "333"
}
```


Para criar a conta usando a factory basta executar o seguinte comando:

```
php artisan db:seed --class=AccountFakeTableSeeder
```

## Padrões de Desenvolvimento

**Estilo do Código**

[PSR-2](http://www.php-fig.org/psr/psr-2/)

**Divisão das camadas**

```
Controller -> Service -> Repository -> Model
```
