<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema de Biblioteca</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
<?php
require_once 'menu.php';
?>
  <!-- Breadcrumb -->
  <nav class="px-6 py-3 text-sm text-gray-400" aria-label="Breadcrumb">
    <ol class="list-reset flex space-x-2">
      <li><a href="../index.php" class="hover:text-white">Início</a></li>
      <li>/</li>
      <li class="text-gray-300">Livros</li>
    </ol>
  </nav>

  <section class="px-6 py-2 flex justify-end">
    <a href="cadastro_livro.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
      Novo
    </a>
  </section>

  <section class="p-4">
    <form method="POST" action="lista_livros.php" class="bg-gray-800 p-4 rounded-xl shadow-md flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0 border border-gray-700">
      <input
        type="text"
        name="titulo"
        value=""
        placeholder="Título..."
        class="w-full md:w-1/5 p-2 rounded bg-gray-800 text-white border border-gray-700"
      />
      
      <input
        type="text"
        name="autor"
        value=""
        placeholder="Autor..."
        class="w-full md:w-1/5 p-2 rounded bg-gray-800 text-white border border-gray-700"
      />
      
      <input
        type="text"
        name="editora"
        value=""
        placeholder="Editora..."
        class="w-full md:w-1/5 p-2 rounded bg-gray-800 text-white border border-gray-700"
      />
    
      <select name="categoria" class="w-full md:w-1/5 p-2 rounded bg-gray-800 text-white border border-gray-700">
        <option value="">Todas as categorias</option>
        <option value="">Romance</option>
      </select>
      <button type="submit" class="w-full md:w-1/5 bg-blue-600 hover:bg-blue-700 text-white font-semibold p-2 rounded">
        Pesquisar
      </button>
    </form>
  </section>

  <main class="p-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <div class="bg-gray-800 hover:bg-gray-700/80 border border-gray-700 rounded-2xl p-4 shadow-md hover:shadow-lg transition-all duration-200 flex gap-4">
      <img src="../imagens/" alt="Capa do livro" class="w-28 h-40 object-cover rounded-lg border border-gray-700 shadow-sm" />
      <div class="flex flex-col justify-between">
        <div>
          <h2 class="text-lg font-semibold">Um amor para recordar</h2>
          <p class="text-sm text-gray-400">Autor: Dadiv Shilan</p>
          <p class="text-sm text-gray-400">Editora: Editora Livros Bons</p>
          <p class="text-sm text-gray-400">Categoria: Romance</p>
        </div>
        <div class="flex items-center gap-2 mt-2">
          <span class="bg-green-500/20 text-green-300 text-xs font-medium px-2 py-0.5 rounded-full">
            Disponível
          </span>
          <!--
          <span class="bg-red-500/20 text-red-300 text-xs font-medium px-2 py-0.5 rounded-full">
            Indisponível
          </span> -->
          <a href="ficha_livro.php?id=000" class="text-sm text-blue-400 border border-blue-500 hover:bg-blue-600 hover:text-white px-3 py-1 rounded transition-all duration-150">
            Ver detalhes
          </a>
        </div>
      </div>
    </div>
  </main>
  <p class="text-center text-gray-400 mt-4">Dados não encontrados.</p>
</body>
</html>
