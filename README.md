# 🚀 Laravel Blade Posts Manager

Um sistema de gerenciamento de publicações robusto e dinâmico construído com **Laravel**, **Blade** e **Tailwind CSS**. O projeto foi desenvolvido com foco em boas práticas de arquitetura MVC, oferecendo uma experiência de usuário fluida para criação, leitura, edição e exclusão de conteúdos (CRUD), além de um sistema inteligente de filtragem por categorias e tratamento avançado de mídia.

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** Laravel 11 (PHP 8.2+)
* **Frontend:** Blade Templates & Tailwind CSS
* **Banco de Dados:** SQLite / MySQL
* **Autenticação & UI:** Componentes nativos do ecossistema Laravel Breeze

---

## ✨ Funcionalidades Principais

* **CRUD Completo de Posts:** Criação, listagem, edição e exclusão de publicações em tempo real.
* **Filtro por Categorias:** Mecanismo de busca refinada direto na listagem principal (`index`), atualizando os resultados dinamicamente via requisições `GET`.
* **Upload Inteligente de Imagens:** Suporte a arquivos de mídia com sistema de *preview* dinâmico.
* **Renderização de Mídia Inteligente:** Algoritmo CSS/Tailwind adaptado para exibir imagens horizontais ou verticais em proporção real (`object-contain`), eliminando cortes indesejados ou distorções no layout.
* **Gerenciamento de Disco Rigoroso:** O controlador remove fisicamente imagens antigas do diretório `Storage` ao atualizar ou deletar um post, evitando o acúmulo de arquivos órfãos no servidor.

---

## 🚀 Guia de Instalação e Execução (Tudo Junto)

Siga a sequência de comandos abaixo no terminal do seu computador para clonar, configurar e colocar a aplicação para rodar imediatamente.

### 📋 Pré-requisitos
Antes de começar, certifique-se de que tem instalado na sua máquina:
* **Git** (Para clonar o projeto)
* **PHP (>= 8.2)** e **Composer**
* **Node.js & NPM**

### 💻 Passo a Passo Sequencial no Terminal

Execute os comandos abaixo, um por um, dentro do seu terminal de preferência:

```bash
# 1. Clone o repositório para a sua máquina
git clone [https://github.com/Denardi28/auth-app](https://github.com/Denardi28/auth-app)

# 2. Acesse a pasta do projeto que foi criada
cd auth-app

# 3. Instale as dependências de pacotes do PHP/Laravel
composer install

# 4. Instale as dependências do Frontend (Tailwind CSS, Vite, etc.)
npm install

# 5. Crie o arquivo de configuração do ambiente (.env)
cp .env.example .env

# 6. Gere a chave única de segurança do Laravel
php artisan key:generate

# 7. Crie o banco de dados, rode as migrations e adicione as categorias padrão (Seeders)
php artisan migrate --seed

# 8. Crie o link do Storage (Passo obrigatório para que as imagens fiquem visíveis na tela)
php artisan storage:link

# 9. Inicialize o compilador do Tailwind CSS (Deixe este terminal aberto rodando)
npm run dev

# 10. Ligue o servidor local do PHP/Laravel
php artisan serve