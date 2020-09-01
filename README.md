# Project7-API-bilemo

BileMo is a company offering a variety of premium mobile phones.
BileMo's business model is not to sell its products directly on the website, but to provide all platforms that want it with access to the catalog via an API (Application Programming Interface). It is therefore exclusively B2B (business to business) sales.

## Installation
1. Clone and download the repository GitHub :
```
    git clone https://github.com/Magali-Rezeau/Project7-API-bilemo.git
```
2. Configure your environment variables such as connection to the database or your SMTP server in the file `.env`.

3. Download and install the back-end dependencies of the project with [Composer](https://getcomposer.org/download/) :
```
    composer install
```
4. Create the database if it does not already exist, type the command below :
```
    php bin/console doctrine:database:create
```
5. Create the different tables in the database by applying migrations :
```
    php bin/console doctrine:migrations:migrate
```
6. Install fixtures to have a fictional data demo :
```
    php bin/console doctrine:fixtures:load
```
7. Generate the SSH keys with JWT :
```
    $ mkdir -p config/jwt
    $ openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
    $ openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
```
    You must put the key you chose in the .env file

## Usage
1. Documentation :
```
    http://localhost:{yourport}/api/doc
```   
2. You can also use Postman
