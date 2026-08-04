<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrar Novo Aluguel</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">

  <?php
  require_once 'menu.php';
  ?>
  <div class="mx-4 mb-6 bg-red-700 text-white px-5 py-3 rounded-lg shadow-md flex items-start gap-3 max-w-4xl mx-auto">
    <svg class="w-6 h-6 mt-1 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z"/>
    </svg>
    <div class="flex-1">
      <strong class="block font-bold mb-1">Erro:</strong>
      <span>erro aqui</span>
    </div>
  </div>
  
  <section class="pt-6 pb-2 max-w-4xl mx-auto">
    <a href="lista_alugueis.php" 
      class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Voltar
    </a>
  </section>

  <!-- Título da Página -->
  <section class="p-6 max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold mb-6 border-b border-gray-700 pb-2">Registrar Aluguel</h2>
  </section>

  <!-- Formulário de Novo Aluguel -->
  <section class="p-6 max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg">
    <form method="POST" class="space-y-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <!-- Usuário (simulando já selecionado e fixo) -->
        <div>
          <label for="usuario" class="block text-sm font-medium text-gray-300 mb-2">Usuário</label>
          <input type="text" readonly class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600" value="" />
          <select id="usuario" name="usuario" required class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Selecione o Usuário</option>
            <option value=""> Maria Angela</option>
          </select>
        </div>

        <!-- Livro (simulando já selecionado e fixo) -->
        <div>
          <label for="livro" class="block text-sm font-medium text-gray-300 mb-2">Livro</label>
          <input type="text" readonly class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600" value="" />
          <select id="livro" name="livro" required class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Selecione o Livro</option>
            <option value="">
              Um Amor para recordar
            </option>
          </select>
        </div>

        <!-- Data da Locação -->
        <div>
          <label for="data_locacao" class="block text-sm font-medium text-gray-300 mb-2">Data da Locação</label>
          <input type="text" readonly class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600" value="" />
        </div>
        
        <!-- Data da Devolução Prevista -->
        <div>
          <label for="data_devolucao_prevista" class="block text-sm font-medium text-gray-300 mb-2">Data da Devolução Prevista</label>
          <input type="text" readonly class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600" value="" />
          <input type="date" name="data_devolucao_prevista" value="" class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-2">Data da Devolução</label>
          <input type="text" readonly class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600" value="" />
        </div>
        <div>
          <label class="block text-sm font-semibold mb-2">Situação</label>
          <input type="text" readonly class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600" value="" />
        </div>
      </div>

      <!-- Botão de ação -->
      <div class="mt-8 flex justify-end">
        <!--<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition" name="devolver">
          Devolver
        </button> -->
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition" name="salvar">
          Salvar
        </button>
      </div>
    </form>
  </section>

</body>
</html>
