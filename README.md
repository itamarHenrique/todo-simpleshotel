# Sistema de Tarefas - Laravel

## Descrição

Este projeto é um sistema de gerenciamento de tarefas desenvolvido com **Laravel**.
Ele permite que usuários façam cadastro, login, criem, editem, excluam e concluam tarefas.

**Decisões importantes do projeto:**

* **Soft Delete**: permite restaurar tarefas excluídas.
* **Autenticação customizada**: com login, registro e logout usando `AuthController`.
* **Paginação e filtros**: facilita a visualização de tarefas.
* **Validação no backend**: garante integridade dos dados antes de salvar no banco.

---

## Instalação e Configuração Local

### Pré-requisitos

* PHP >= 8.1
* Composer
* MySQL / MariaDB
### Passos

#### 1. Clone o projeto:

```bash
git clone https://github.com/itamarHenrique/todo-simpleshotel.git
cd sistema-tarefas
```

#### 2. Instale dependências:

```bash
composer install   # prioritário, para baixar todas as dependências do Laravel e pacotes necessários
```

#### 3. Copie o arquivo `.env.example` para criar seu `.env` local:

```bash
cp .env.example .env
```

#### 4. Configure o banco de dados no arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_tarefas
DB_USERNAME=root
DB_PASSWORD=
```

#### 5. Gere a chave de aplicação:

```bash
php artisan key:generate
```

#### 6. Execute as migrations para criar as tabelas:

```bash
php artisan migrate
```

#### 7. Inicie o servidor local:

```bash
php artisan serve
```

#### 8. Acesse no navegador:

```
http://127.0.0.1:8000
```

---

## Melhorias Futuras

* Limitar tentativas de login e adicionar bloqueio temporário.
* Adicionar pesquisa por título de tarefa.
* Notificações ou alertas para tarefas próximas do prazo, juntamente com adição de data final.
* Adicionar testes automatizados (PHPUnit / Pest).
