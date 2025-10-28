Guia de Instalação, Execução e Especificações Técnicas da Aplicação de Tarefas

Este documento combina o guia prático de execução local da aplicação com um resumo das decisões técnicas e sugestões de melhorias futuras.

1. Guia de Instalação e Dependências

Este guia detalha os passos necessários para configurar e rodar o projeto localmente, usando o Composer, as ferramentas do Laravel e a configuração padrão do MySQL.

Pré-requisito: O testador deve ter o PHP, Composer e um servidor de banco de dados local (como XAMPP, WAMP, MAMP, Laragon ou Docker) instalados e rodando.

1.1. Dependências PHP (Composer)

O Composer instalará todos os pacotes do Laravel e outras bibliotecas de PHP:

composer install


1.2. Dependências Frontend (NPM)

Instale as dependências JavaScript (para componentes Blade e compilação de ativos):

npm install


1.3. Geração da Chave da Aplicação

O Laravel precisa de uma chave de segurança. Se o seu arquivo .env não existir, copie-o e gere a chave:

# 1. Copia o arquivo de ambiente de exemplo (se necessário)
cp .env.example .env

# 2. Gera a chave da aplicação
php artisan key:generate


2. Configuração do Banco de Dados (MySQL/MariaDB Local)

Você deve configurar o arquivo .env para apontar para o banco de dados local padrão.

2.1. Variáveis no Arquivo .env

Abra o arquivo .env na raiz do projeto e configure as variáveis de conexão.

Importante: Crie um banco de dados vazio chamado tarefas_app no seu servidor MySQL/MariaDB local antes de rodar as migrações.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tarefas_app
DB_USERNAME=root
DB_PASSWORD=


2.2. Configuração do Paginator (Bootstrap)

Confirme que o app/Providers/AppServiceProvider.php contém a linha para usar o estilo Bootstrap 5 na paginação, corrigindo os ícones quebrados:

// Dentro do método boot() em app/Providers/AppServiceProvider.php
use Illuminate\Pagination\Paginator; 
// ...
public function boot(): void
{
    Paginator::useBootstrapFive();
}


3. Comandos Artisan e Migração

3.1. Limpar e Configurar

Limpe o cache do Laravel para garantir que as novas configurações do .env sejam lidas:

php artisan config:clear
php artisan cache:clear


3.2. Rodar as Migrações

Este comando criará as tabelas necessárias (incluindo a tabela de tarefas) no seu banco de dados local:

php artisan migrate


4. Execução da Aplicação

4.1. Iniciar o Servidor PHP

Inicie o servidor de desenvolvimento embutido do PHP:

php artisan serve


4.2. Compilar o Frontend (Opcional, mas Recomendado)

Compile os ativos frontend (CSS/JS):

npm run dev
# OU
# npm run watch # Para que as alterações de CSS/JS sejam aplicadas automaticamente


4.3. Acessar a Aplicação

Acesse a aplicação no seu navegador: http://127.0.0.1:8000. Você será redirecionado para a tela de Login/Registro.

5. Considerações do Projeto e Melhorias Futuras

5.1. Decisões Técnicas Principais

As decisões tomadas durante a construção e refatoração do projeto foram:

Área

Decisão Técnica

Justificativa

Autenticação

Laravel Auth / UI (Padrão).

Utilizou-se o scaffolding de autenticação padrão do Laravel, garantindo rapidamente telas funcionais de login, registro e a proteção das rotas principais com o middleware('auth').

Estilização

Bootstrap 5.

O frontend foi migrado para o Bootstrap 5, o que exigiu a remoção de classes e componentes do Breeze/Tailwind e a substituição por sintaxe Blade clássica e classes do Bootstrap.

Paginação

Paginator::useBootstrapFive()

Configuração explícita para resolver o problema de ícones quebrados na paginação, garantindo a compatibilidade visual com o Bootstrap.

Banco de Dados

MySQL Local.

A configuração foi padronizada para MySQL local (DB_CONNECTION=mysql) para maximizar a compatibilidade com o ambiente de teste.

Rotas

Redirecionamento do Dashboard.

A rota /dashboard foi adicionada com um redirecionamento para /tarefas, resolvendo um erro de rota não definida no menu de navegação do layout padrão (layouts/navigation.blade.php).

5.2. Melhorias Futuras Sugeridas

Para aprimorar a aplicação, as seguintes melhorias são recomendadas:

Soft Deletes (Exclusão Lógica): Adotar a trait SoftDeletes no modelo Tarefa. Isso preserva os dados no banco de dados, permitindo futuras funcionalidades como "restauração" ou "lixeira".

Mensagens de Feedback (Toasts/Alerts): Implementar o uso de flashing sessions do Laravel em conjunto com componentes Toast ou Alert do Bootstrap para fornecer um feedback visual mais elegante após ações de sucesso ou erro (CRUD).

Refatoração do Frontend: Refazer o carregamento do Bootstrap via npm install e compilando via Vite/Mix localmente, em vez de usar CDNs. Isso melhora o desempenho e permite a customização do tema.

Validação Detalhada: Implementar classes de requisição (Form Requests) no Laravel para validação mais robusta no lado do servidor, especialmente para a criação e atualização de tarefas.