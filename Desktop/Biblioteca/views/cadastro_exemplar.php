<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Exemplar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
  <?php
    require_once 'menu.php';
  ?>

  <!-- Conteúdo -->
  <main class="p-6 max-w-3xl mx-auto">
    <div class="mb-6 bg-red-700 text-white px-5 py-3 rounded-lg shadow-md flex items-start gap-3 animate-pulse">
      <svg class="w-6 h-6 mt-1 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z"/>
      </svg>
      <div>
        <strong class="block font-bold mb-1">Erro:</strong>
        <span>Código exemplar já cadastrado.</span>
      </div>
    </div>
    
    <!-- Botão Voltar -->
    <a href="ficha_livro.php?id=000" class="inline-block mb-4 bg-gray-700 hover:bg-gray-800 px-4 py-2 rounded text-white">
      ← Voltar
    </a>

    <!-- Formulário de cadastro de exemplar -->
    <form method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md space-y-4">
      <div>
        <label class="block text-sm font-semibold mb-1" for="codigo_exemplar">Código do exemplar</label>
        <input id="codigo_exemplar" name="codigo_exemplar" type="text" class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600" required placeholder="Digite o nome do exemplar" maxlength="20">
      </div>

      <!-- Botão Salvar -->
      <div class="text-right">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white font-semibold">
          Salvar Alterações
        </button>
      </div>
    </form>
  </main>
</body>
</html>
