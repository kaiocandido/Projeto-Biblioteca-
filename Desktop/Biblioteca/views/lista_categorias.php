<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listagem de Categorias</title>
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
      <li class="text-gray-300">Categorias</li>
    </ol>
  </nav>

  <!-- Botão Novo -->
  <section class="px-6 py-2 flex justify-end">
    <a href="cadastro_categoria.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
      Novo
    </a>
  </section>

  <!-- Título e Filtros -->
  <form class="p-6 text-center" method="POST">
    <h2 class="text-2xl font-semibold">Categorias Cadastradas</h2>
    <p class="text-gray-400 mt-2">Aqui estão as categorias cadastradas na biblioteca.</p>

    <!-- Filtros -->
    <div class="mt-6 flex justify-center space-x-4">
      <input
        type="text"
        value=""
        name="nome_categoria"
        placeholder="Filtrar por nome..."
        class="w-1/3 p-2 rounded bg-gray-700 text-white placeholder-gray-400 border border-gray-600"
      />
      <button type="submit" class="w-full md:w-1/5 bg-blue-600 hover:bg-blue-700 text-white font-semibold p-2 rounded">
        Pesquisar
      </button>
    </div>
  </form>

  <!-- Lista de categorias (exemplos fixos) -->
  <section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <div class="bg-gray-700 hover:bg-gray-600 rounded-lg p-6 shadow-lg">
      <h3 class="text-xl font-semibold mb-4 break-words">Romance</h3>
      <p class="text-sm text-gray-300 mb-4">10 livro(s)</p>
      <div class="flex space-x-4">
        <a href="cadastro_categoria.php?id=00" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-4 rounded">Editar</a>
        <a href="excluir_categoria.php?id=00" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-4 rounded">Excluir</a>
      </div>
    </div>
  </section>

  <!-- Mensagem se vazio -->
  <p style="text-align: center;">Dados não encontrados.</p>
</body>
</html>
