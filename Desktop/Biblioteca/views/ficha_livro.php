<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ficha do Livro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
  
  <?php
  require_once 'menu.php';
  ?>
  <!-- Conteúdo principal -->
  <main class="p-4 max-w-5xl mx-auto mt-6 bg-gray-800 rounded-lg shadow-lg relative">

    <!-- Botões no topo da ficha -->
    <div class="flex justify-between mb-4">
      <a href="lista_livros.php" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-1 px-4 rounded text-sm">
        ← Voltar
      </a>
      <div class="flex gap-2">
        <a href="cadastro_livro.php?id=00" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-4 rounded text-sm">
          Alterar
        </a>
        <a href="excluir_livro.php?id=00" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-4 rounded text-sm">
          Excluir
        </a>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-6">
      
      <!-- Imagem do livro -->
      <div class="flex-shrink-0">
        <img src="../imagens/" alt="Capa do Livro" class="w-full lg:w-60 h-auto rounded-lg shadow-md" />
      </div>

      <!-- Informações do livro -->
      <div class="flex-1">
        <h2 class="text-3xl font-bold mb-2">Um amor para recordar</h2>
        <p class="text-gray-300 mb-4">
          Descrição aqui
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
          <div>
            <span class="text-gray-400">Autor:</span>
            <p class="text-white font-medium">Nome do Autor</p>
          </div>
          <div>
            <span class="text-gray-400">Editora:</span>
            <p class="text-white font-medium">Nome da Editora</p>
          </div>
          <div>
            <span class="text-gray-400">Data de Cadastro:</span>
            <p class="text-white font-medium">01/01/2001</p>
          </div>
          <div>
            <span class="text-gray-400">Categoria:</span>
            <p class="text-white font-medium">Romance</p>
          </div>
          <div>
            <span class="text-gray-400">ISBN:</span>
              <p class="text-white font-medium">000001</p>
            </div>
          <div>
            <span class="text-gray-400">Status:</span>
            <p class="text-white font-medium">Disponivel</p>
          </div>
          <div>
            <span class="text-gray-400">Ano de Publicação:</span>
            <p class="text-white font-medium">2010</p>
          </div>
          <div>
            <span class="text-gray-400">Exemplares Disponíveis:</span>
            <p class="text-white font-medium">1 unidades</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Lista de Exemplares -->
    <section class="mt-6 bg-gray-700 p-4 rounded-lg">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold">Exemplares Disponíveis</h3>
        <!-- Botão para Adicionar Novo Exemplar no canto superior direito -->
        <a href="cadastro_exemplar.php?id_livro=000" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
          Novo
        </a>
      </div>
      <table class="min-w-full table-auto text-sm">
        <thead>
          <tr>
            <th class="py-2 px-4 text-left text-sm font-semibold">ID</th>
            <th class="py-2 px-4 text-left text-sm font-semibold">Data Cadastro</th>
            <th class="py-2 px-4 text-left text-sm font-semibold">Status</th>
            <th class="py-2 px-4 text-left text-sm font-semibold"></th>
          </tr>
        </thead>
        <tbody>
          <tr class="hover:bg-gray-600">
            <td class="py-2 px-4">01135</td>
            <td class="py-2 px-4">01/01/2010</td>
            <td class="py-2 px-4">Disponivel</td>
            <td class="py-2 px-4">
              <a href="excluir_exemplar.php?id=00" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-4 rounded">Excluir</a>
            </td>
          </tr>
        </tbody>
      </table>
      <p> Nenhum exemplar cadastrado para este livro.</p>
    </section>
  </main>

</body>
</html>
