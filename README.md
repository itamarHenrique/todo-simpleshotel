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
DB_DATABASE=tarefas
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

> 💡 **Dica:** você pode escolher qualquer nome para o seu banco de dados, 
> por exemplo `tarefas`.  

#### 5. Gere a chave de aplicação:

```bash
php artisan key:generate
```

#### 6. Execute as migrations para criar as tabelas:

> Apenas certifique-se de criar o banco manualmente no MySQL **antes de rodar** o comando:
> 
> ```bash
> php artisan migrate
> ```

### 7. Acessar no navegador

Abra o navegador e acesse:

```
http://127.0.0.1:8000
```

Assim que acessar, você será redirecionado para a **tela de login**. Como o banco de dados está vazio, será necessário **fazer o cadastro de um novo usuário**.

> A senha deve conter **no mínimo 8 caracteres**.

---

## Melhorias Futuras

* Limitar tentativas de login e adicionar bloqueio temporário.
* Adicionar pesquisa por título de tarefa.
* Notificações ou alertas para tarefas próximas do prazo, juntamente com adição de data final.
* Adicionar testes automatizados (PHPUnit)