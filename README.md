# To-Do List 

Um sistema de gerenciamento de tarefas desenvolvido com **PHP**, **Laravel**, **Blade Templates**, e **MySQL**.  
Permite criar, editar, excluir e restaurar tarefas.

---

## Tecnologias utilizadas

- **PHP 8.2+**
- **Laravel 12**
- **Composer**
- **MySQL**
- **Node.js v22**
- **Tailwind CSS + Vite**
- **Blade Templates**

---


## Instalação do projeto

 **Clone o repositório**

```bash
   git clone https://github.com/emanuelflavio/desafio-to-do-list.git
   cd desafio-to-do-list
```
 
---

**Instalar dependências**

```bash
composer install
```

---

**Instalar dependências JavaScript**


```bash
npm install
npm run dev
```


---

 **Configurar o arquivo `.env`**

Crie uma cópia do arquivo .env:

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


**Ao Acessar**

Ao acessar o sistema pela primeira vez, o usuário deve começar pela tela de registro. Lá, é preciso informar o nome, e-mail e senha. Essa senha tem algumas regras de segurança importantes: ela precisa ter pelo menos uma letra maiúscula, uma minúscula, um número, um símbolo especial e deve ter no mínimo 6 caracteres. Depois de preencher tudo corretamente e clicar em “Registrar”, a conta é criada e o usuário é automaticamente redirecionado para a tela de login. Nessa tela, basta informar o e-mail e a senha cadastrados para entrar no sistema. Se as credenciais estiverem certas, o login é feito e o usuário é levado para a página principal.

Cada tarefa aparece dentro de um card, que exibe o título, a descrição, o status (pendente, concluída ou na lixeira) e também a data e hora de criação.

Do lado esquerdo, há um menu lateral com as opções principais. A primeira delas é “Nova Tarefa”, que leva o usuário até o formulário de criação. Lá, basta preencher o título e, se quiser, adicionar uma descrição. Ao clicar em Salvar Tarefa, a tarefa é registrada e o sistema redireciona automaticamente para a tela inicial, onde a nova tarefa já aparece na lista.

Cada tarefa conta também com botões de ação. O ícone de lixeira vermelha serve para excluir uma tarefa — mas essa exclusão não é definitiva, pois o sistema utiliza o recurso de Soft Delete. Isso significa que a tarefa é apenas movida para a Lixeira, podendo ser restaurada depois, caso o usuário mude de ideia.

Dentro da lixeira, os botões mudam de função: o restaura a tarefa, trazendo-a de volta à lista principal, e apaga a tarefa de forma permanente, removendo-a do banco de dados.

Além disso, o sistema tem um filtro por status, que facilita bastante a organização. O usuário pode escolher entre visualizar apenas tarefas pendentes, concluídas, as que estão na lixeira ou todas de uma vez.

Para editar uma tarefa, basta clicar no título do card. Isso leva o usuário até a tela de edição, onde ele pode mudar o título, a descrição ou o status. Depois de fazer as alterações, é só clicar em Confirmar Edição e o sistema salva tudo de imediato.

Quando terminar, o usuário pode clicar no botão Sair no menu lateral. Esse botão realiza o logout de forma segura, encerrando a sessão e voltando para a tela de login.




