<h1>Cadastro de Usuário - API</h1>
<p>API em laravel para um sistema simples que faz o controle de usuário englobando cadastro, login, recuperação de senha e listagem</p>
<h2>Instalação</h2>
<p>Clonar o repositório</p>
<pre>> git clone https://github.com/CodeSamplesAgain/CadastroUsuarioUI.git</pre>
<p>Instalar as dependências usando composer</p>
<pre>> composer install</pre>
<p>Renomear o arquivo <b>/.env.example</b> para <b>/.env</b> e colocar nele as credenciais de banco de dados e e-mail</p>
<pre>
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
</pre>
<p>Criar a estrutura de banco</p>
<pre>> php artisan migrate --seed</pre>
<p>Rodar o servidor</p>
<pre>> php artisan serve</pre>
<br/>
<p>Após isso a API deve estar funcionando normalmente. Um arquivo postman foi incluído na raíz do projeto exemplificando como acessar as rotas.</p>
