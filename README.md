# Resumo da Avaliação 2 - Programação Web

## Objetivo
Com base no que nós aprendemos em sala precisamos desenvolver uma aplicação web completa utilizando o framework Laravel, com autenticação baseada no Jetstream e CRUDs implementados em um dashboard. A aplicação deve incluir relações one-to-many entre entidades e ser estilizada com Bootstrap.

## Requisitos Gerais
1. **Autenticação**: Sistema de login, registro e recuperação de senha com Laravel Jetstream. Acesso ao dashboard restrito a usuários logados.
2. **CRUDs**: Implementação de CRUDs para entidades principais e relacionadas, incluindo categorias.
3. **Página Principal**: Acessível a todos os usuários, apresentando informações relevantes em cards.
4. **Dashboard**: Exclusivo para usuários logados, com gerenciamento completo das entidades via CRUDs.
5. **Estilo e Responsividade**: Uso do Bootstrap para criar uma interface amigável e responsiva.
6. **Extras**: Mensagens de validação, feedback e uso de ícones ou imagens ilustrativas.

---

## Tema do projeto - Sistema de Receitas Culinárias
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

### Entrega
- **Data**: 06/02/2025
- **Formato**: Apresentação do projeto rodando e entrega em repositório Git.
- **Critérios de Avaliação**:
  - Funcionalidade dos CRUDs e relações one-to-many.
  - Implementação correta da autenticação.
  - Front-end estilizado e responsivo.

### Link da documentação no Notion
https://www.notion.so/leafarel/Sistema-de-Receitas-Culin-rias-173e3cc5ff30806281fec971c9eb9e68?pvs=4

## Configurar o Projeto Laravel em Outra Máquina

### Requisitos Específicos
- **Dependências necessárias**:
  - **PHP**: Certifique-se de que a máquina possui a versão adequada para o Laravel (ex.: PHP 8.1).
  - **Composer**: Para gerenciar as dependências do Laravel.
  - **Node.js e NPM**: Caso o projeto utilize assets (CSS/JS).
  - **Banco de Dados**: MySQL ou outro configurado no projeto.

---

### Passo a Passo para Configuração.

1. **Clonar o Repositório**
   - Abra o terminal e vá até o diretório onde deseja clonar o projeto:
     ```bash
     cd /caminho/escolhido
     ```
   - Clone o repositório do Git:
     ```bash
     git clone https://github.com/RafaDalmagro/sistema-receitas-culinarias.git
     ```
   - Entre no diretório do projeto:
     ```bash
     cd sistema-receitas-culinarias
     ```

2. **Instalar Dependências**
   - Instale as dependências do PHP com o Composer:
     ```bash
     composer install
     ```
     
3. **Configurar o Arquivo `.env`**
   - Copie o arquivo de exemplo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - Configure as informações do banco de dados no `.env`, ajuste conforme o banco de dados que está usando:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=
     DB_USERNAME=
     DB_PASSWORD=
     ```
     
4. **Gerar a Chave da Aplicação**
   - Execute o comando para gerar a chave:
     ```bash
     php artisan key:generate
     ```

5. **Configurar o Banco de Dados**
   - Certifique-se de que o banco de dados configurado no `.env` existe.
   - Execute as migrations para criar as tabelas:
     ```bash
     php artisan migrate
     ```
   - Se desejar, o projeto contém seeders, execute para popular o banco:
     ```bash
     php artisan db:seed
     ```

6. **Iniciar o Servidor**
   - Rode o servidor local do Laravel:
     ```bash
     php artisan serve
     ```
   - Acesse o projeto no navegador em [http://127.0.0.1:8000](http://127.0.0.1:8000).

# Parte de Autenticação no Laravel

## Objetivo
Configurar a autenticação no Laravel utilizando o Jetstream, integrando funcionalidades de login, registro e personalização de usuários.

## Requisitos Gerais
1. **Instalar o Jetstream**: Instalação e configuração do Laravel Jetstream para autenticação.
2. **Livewire**: Integração com Livewire para criação de interfaces dinâmicas.
3. **Migrações e Dependências**: Execução de migrações e configuração do ambiente de desenvolvimento.
4. **Redirecionamento Padrão**: Alteração do redirecionamento pós-login no Fortify.
5. **Personalização da Tabela de Usuários**: Adição de campos personalizados na tabela `users` e integração com formulários.

---

## Passo a Passo

### Passo 1: Instalar o pacote Jetstream
- Execute o seguinte comando para instalar o Jetstream via Composer:
  ```bash
  composer require laravel/jetstream
  ```

## Passo 2: Instalar o Livewire
- Instale o Livewire, que será utilizado para criar interfaces dinâmicas:
  ```bash
  php artisan jetstream:install livewire
  ```

## Passo 3: Rodar as Migrations e Instalar Dependências
- Após a instalação do Jetstream e do Livewire, rode os seguintes comandos para configurar o ambiente:
  ```bash
  php artisan migrate
  npm install
  npm run dev
  ```
## Passo 4: Alterar o Redirecionamento Padrão
- Atualize o redirecionamento após login no arquivo `config/fortify.php`:
  ```php
  return [
      'home' => '/',
  ];

## Passo 5: Adicionar um Campo à Tabela `users`
- Adicione o campo `address` (endereço) para personalizar a tabela de usuários:

### 5.1 Criar uma Migration
- Crie uma migration para adicionar o campo `address` à tabela `users`:

  ```bash
    php artisan make:migration add_address_users --table=users
  ```
### 5.2 Rodar as Migrations.
-  Caso instale o Jetstream e o Livewire ele também podera solicitar para rodar as `Migrations`:
  ```bash
    php artisan migrate
  ```
### 5.3 Atualizar modelo `User`.
- No arquivo `app/Models/User.php`, adicione o campo address à propriedade `$fillable`:
  ```php
      protected $fillable = [
      'name',
      'email',
      'password',
      'address',
    ];
  ```
### 5.4 Atualizar o Formulário de Registro.
- Atualize o arquivo `app/Actions/Fortify/CreateNewUser.php` para incluir validação e salvamento do campo `address`:
 ```php
    Validator::make($input, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => $this->passwordRules(),
      'address' => ['required', 'string', 'max:255'],
    ])->validate();
  
    User::create([
      'name' => $input['name'],
      'email' => $input['email'],
      'password' => Hash::make($input['password']),
      'address' => $input['address'],
    ]);
```
