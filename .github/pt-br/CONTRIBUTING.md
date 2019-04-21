# Contribuindo to Appa Browser.
1. [Configurando a aplicação.](#configurando-a-aplicação)
2. [Executando a aplicação.](#executando-a-aplicação)
3. [Gerando dados de teste.](#gerando-dados-de-teste)
4. [Reportando um problema.](#reportando-um-problema)
5. [Enviando um pedido de pull.](#enviando-um-pedido-de-pull)

## Configurando a aplicação.

Para configurar a aplicação, siga as instruções abaixo.

1. Clone o repositório: `git clone https://github.com/xmanolos/appa-browser`
2. Acesse o diretório do clone: `cd appa-browser`
3. Duplique o arquivo `.env.example` renomeando-o para `.env` apenas.
4. Instale as dependências do [Composer](https://getcomposer.org/): `composer install`
5. Instale as dependências do [Yarn](https://yarnpkg.com/): `yarn install`
6. Gere uma chave para a aplicação com o [Artisan](https://laravel.com/docs/master/artisan): `php artisan key:generate`

## Executando a aplicação.

Para rodar a aplicação, siga as instruções abaixo.

##### Utilizando o [Docker](https://www.docker.com/):
1. Acesse o diretório do clone: `cd appa-browser`
2. Execute: `docker-compose -f docker\application.yml up -d`

##### Utilizando o [Laravel Serving](https://laravel.com/docs/master/installation#installing-laravel):
1. Siga as [instruções de instalção do Laravel Docs](https://laravel.com/docs/master/installation#installing-laravel). _Nota: nós usamos a versão 5.8._

## Gerando dados de teste.

Para gerar dados de teste, siga as instruções abaixo.

##### Utilizando o [Docker](https://www.docker.com/):
1. Acesse o diretório do clone: `cd appa-browser`
2. Abra o seu arquivo `.env`.
3. Aponte-o para os containers de teste. As informações de conexão podem ser encontradas no arquivo `docker\application.yml`.
4. Feche o arquivo.
5. Execute: `php artisan data:generate {driver}`

##### Caso contrário:
1. Crie um banco de dados [PostgreSQL](https://www.postgresql.org/) ou [MySQL](https://www.mysql.com/) (ou ambos).
2. Acesse o diretório do clone: `cd appa-browser`
3. Abra o seu arquivo `.env`.
4. Aponte-o para o banco de dados criado.
5. Feche o arquivo.
6. Execute: `php artisan data:generate {driver}`

Os drivers disponíveis são `pgsql` para [PostgreSQL](https://www.postgresql.org/) e `mysql` para [MySQL](https://www.mysql.com/).

Em ambos os casos você pode usar métodos JavaScript para popular as informações de conexão na tela de conexão. Execute no console:
1. Para conexão com [PostgreSQL](https://www.postgresql.org/): `testConnectionPgsql();`.
2. Para conexão com [MySQL](https://www.mysql.com/): `testConnectionMysql();`.

## Reportando um problema.

Antes de enviar um problema, veja o [issue tracker](https://github.com/xmanolos/appa-browser/issues), talvez já exista um issue para o seu problema e a discussão possa informá-lo de soluções prontamente disponíveis.

Queremos corrigir todos os problemas o mais rápido possível, mas antes de corrigir um bug, precisamos reproduzi-lo e confirmá-lo. Para reproduzir erros, sistematicamente pediremos que você forneça um cenário mínimo de reprodução.

## Enviando um pedido de pull.

Antes de enviar sua Solicitação de Pull (RP), considere as seguintes diretrizes:

1. Procure neste repositório por um PR (aberto ou fechado) relacionado ao seu envio. Você não quer duplicar o esforço.
2. Bifurque este repositório.
3. Crie uma ramificação para suas alterações, então seremos mais fáceis de mesclar:

    ```shell
    git checkout -b my-fix-branch master
    ```

5. Faça suas alterações com um código bem escrito.
6. Certifique-se de que suas alterações não são perigosas.
7. Confime suas alterações usando uma mensagem de confirmação descritiva. Se você está corrigindo um problema, por favor informe em seu commit.
8. Envie sua ramificação para o GitHub:

    ```shell
    git push origin my-fix-branch
    ```

9. No GitHub, envie um pedido de pull para este repositório.

É isso aí! Obrigado pela sua contribuição!