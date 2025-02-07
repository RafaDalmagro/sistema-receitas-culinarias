# Resumo da Avaliação 2 - Programação Web

## Objetivo
Com base no que aprendemos em sala, precisamos desenvolver uma aplicação web completa utilizando o framework Laravel, com autenticação baseada no Jetstream e CRUDs implementados em um dashboard. A aplicação deve incluir relações one-to-many entre entidades e ser estilizada com Bootstrap.

## Requisitos Gerais
1. **Autenticação**: Sistema de login, registro e recuperação de senha com Laravel Jetstream. Acesso ao dashboard restrito a usuários logados.
2. **CRUDs**: Implementação de CRUDs para entidades principais e relacionadas, incluindo categorias.
3. **Página Principal**: Acessível a todos os usuários, apresentando informações relevantes em cards.
4. **Dashboard**: Exclusivo para usuários logados, com gerenciamento completo das entidades via CRUDs.
5. **Estilo e Responsividade**: Uso do Bootstrap para criar uma interface amigável e responsiva.
6. **Extras**: Mensagens de validação, feedback e uso de ícones ou imagens ilustrativas.

---

## Tema do Projeto - Sistema de Receitas Culinárias
### Requisitos Específicos
- **CRUDs**:
  - **Receitas**: Nome, ingredientes, modo de preparo e categoria.
  - **Categorias**: Tipo de receita (ex.: sobremesa, entrada).
  - **Comentários**: Comentários de usuários para cada receita.
- **Página Principal (/)**:
  - Exibir cards para receitas mais acessadas ou bem avaliadas.
- **Dashboard**:
  - Gerenciamento completo das receitas, categorias e comentários.

---

## Entrega
- **Data**: 06/02/2025
- **Formato**: Apresentação do projeto rodando e entrega em repositório Git.
- **Critérios de Avaliação**:
  - Funcionalidade dos CRUDs e relações one-to-many.
  - Implementação correta da autenticação.
  - Front-end estilizado e responsivo.

### Link da documentação no Notion
[Notion - Sistema de Receitas Culinárias](https://www.notion.so/leafarel/Sistema-de-Receitas-Culin-rias-173e3cc5ff30806281fec971c9eb9e68?pvs=4)

---

## Configurar o Projeto Laravel em Outra Máquina

### Requisitos Específicos
- **Dependências necessárias**:
  - **PHP**: Certifique-se de que a máquina possui a versão adequada para o Laravel.
  - **Composer**: Para gerenciar as dependências do Laravel.
  - **Node.js e NPM**: Para gerenciar as dependências do Jetstream e Livewire.
  - **Banco de Dados**: MySQL ou outro configurado no projeto.

---

### Passo a Passo para Configuração

1. **Clonar o Repositório**
   ```bash
   git clone https://github.com/RafaDalmagro/sistema-receitas-culinarias.git
   cd sistema-receitas-culinarias
   ```

2. **Instalar Dependências**
   ```bash
   composer install
   ```

3. **Configurar o Arquivo `.env`**
   ```bash
   cp .env.example .env
   ```
   - Configure as informações do banco de dados:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=usuario
   DB_PASSWORD=senha
   ```

4. **Gerar a Chave da Aplicação**
   ```bash
   php artisan key:generate
   ```

5. **Configurar o Banco de Dados**
   - Certifique-se de que o banco está criado antes de rodar as migrations.
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Iniciar o Servidor**
   ```bash
   php artisan serve
   ```
   - Acesse [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Parte de Autenticação no Laravel

### Passo a Passo

1. **Instalar o Jetstream e Livewire**
   ```bash
   composer require laravel/jetstream
   php artisan jetstream:install livewire
   ```

2. **Rodar as Migrations e Instalar Dependências**
   ```bash
   php artisan migrate
   npm install
   npm run dev
   ```
   - Acesse as páginas de autenticação:
     - [Login](http://127.0.0.1:8000/login)
     - [Registro](http://127.0.0.1:8000/register)

3. **Alterar o Redirecionamento Padrão**
   ```php
   return [
       'home' => '/',
   ];
   ```

4. **Alterar a Tabela `Users`**
   - Criar a migration para adicionar o campo de endereço:
     ```bash
     php artisan make:migration add_address_users --table=users
     ```
   - Rodar a migration:
     ```bash
     php artisan migrate
     ```
   - Atualizar o modelo `User.php` e o formulário de registro:
     ```bash
     app/Models/User.php
     app/Actions/Fortify/CreateNewUser.php
     ```

---

## Soluções dos problemas que enfrentei durante o proejto.

- Verifique se o Laravel Jetstream está instalado corretamente.
- Confirme que as migrations foram rodadas corretamente.
- Confira o arquivo `.env` para garantir que as credenciais do banco estão corretas.
- Confira a conexão com o banco de dados.

### Como resetar as migrations?
```bash
php artisan migrate:fresh --seed
```
Isso apagará todas as tabelas e recriará do zero com os seeders.

---



