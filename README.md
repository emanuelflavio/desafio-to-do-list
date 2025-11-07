# To-Do List 

Um sistema de gerenciamento de tarefas desenvolvido com **PHP**, **Laravel**, **Blade Templates**, e **MySQL**.  
Permite criar, editar, excluir e restaurar tarefas.

---

## Tecnologias utilizadas

- **PHP 8.2+**
- **Laravel 12**
- **MySQL**
- **Node.js v22**
- **Tailwind CSS + Vite**
- **Blade Templates**

---

## Pré-requisitos

Certifique-se de ter instalado em sua máquina:

- [PHP 8.2+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/)
- [Node.js (v22+)](https://nodejs.org/)
- [MySQL](https://www.mysql.com/)
- [Git](https://git-scm.com/)

---

## Instalação do projeto

 **Clone o repositório**

```bash
   git clone https://github.com/emanuelflavio/desafio-to-do-list.git
   cd nome-do-projeto
```


**Instalar dependências**

```bash
composer install
```

---

**Instalar dependências JavaScript**



Rode:

```bash
npm install
npm run dev
```


---

 **Configurar o arquivo `.env`**

Crie uma cópia do arquivo de exemplo:

```bash
cp .env.example .env   # Se você estiver usando Linux ou Mac
# ou
copy .env.example .env # Windows
```

Edite o arquivo `.env` e configure o banco de dados:

Exemplo:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

Verifique também se há:

---

**Gere a chave da aplicação**

```bash
php artisan key:generate
```

---

**Rodar as migrations**

```bash
php artisan migrate
```

---

 **Iniciar o servidor**

Rode o servidor local do Laravel (Em outro terminal):

```bash
php artisan serve
```

---

O projeto estará acessível em:

👉 [http://127.0.0.1:8000](http://127.0.0.1:8000)

---







