<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Locações de Livros</title>
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
    <li class="text-gray-300">Locações</li>
  </ol>
</nav>

<!-- Botão Novo -->
<section class="px-6 py-2 flex justify-end">
  <a href="cadastro_aluguel.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
    Novo
  </a>
</section>

<!-- Formulário filtros -->
<section class="p-4">
  <form action="lista_alugueis.php" method="POST" 
    class="bg-gray-800 p-4 rounded-xl shadow-md border border-gray-700 flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0"
  >
    <input
      type="text"
      id="usuario"
      name="usuario"
      placeholder="Nome do usuário"
      value=""
      class="w-full md:w-1/4 p-2 rounded bg-gray-800 text-white border border-gray-700"
    />
    <input
      type="text"
      id="livro"
      name="titulo"
      placeholder="Titulo do livro"
      value=""
      class="w-full md:w-1/4 p-2 rounded bg-gray-800 text-white border border-gray-700"
    />
    <select
      id="status"
      name="status"
      class="w-full md:w-1/4 p-2 rounded bg-gray-800 text-white border border-gray-700"
    >
      <option value="">Todos os status</option>
      <option value="1"> Pendente</option>
      <option value="2"> Em Atraso</option>
      <option value="3"> Devolvido</option>
    </select>
    <button
      type="submit"
      class="w-full md:w-1/4 bg-blue-600 hover:bg-blue-700 text-white font-semibold p-2 rounded"
    >
      Pesquisar
    </button>
  </form>
</section>

<!-- Listagem das locações -->
<main class="p-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
  <div class="bg-gray-800 hover:bg-gray-700/80 border border-gray-700 rounded-2xl p-4 shadow-md hover:shadow-lg transition-all duration-200 flex gap-4">
    <img src="../imagens/" alt="Capa do livro" class="w-28 h-40 object-cover rounded-lg border border-gray-700 shadow-sm" />
    <div class="flex flex-col justify-between w-full">
      <div>
        <h2 class="text-lg font-semibold">Maria Antonia</h2>
        <p class="text-sm text-gray-400">Livro: Um amor para Recordar</p>
        <p class="text-sm text-gray-400">Data Locação: 10/10/2024</p>
        <p class="text-sm text-gray-400">Data Prevista Devolução: 13/10/2024</p>
      </div>
      <div class="flex items-center gap-2 mt-2">
        <a href="cadastro_aluguel.php?id=00"
          class="text-blue-400 border border-blue-500 hover:bg-blue-600 hover:text-white px-3 py-1 rounded transition-all duration-150">
          Editar
        </a>
        <span class="text-xs font-medium px-2 py-0.5 rounded-full">
          Alugado
        </span>
      </div>
    </div>
  </div>

  <p> Nenhum dado encontrado.</p>
</main>

</body>
</html>
