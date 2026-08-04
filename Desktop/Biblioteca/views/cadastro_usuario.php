<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro de Usuário</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">

  <?php
    require_once 'menu.php';
  ?>
  
  <section class="p-4 max-w-4xl mx-auto">

    <!-- Botão Voltar com ícone -->
    <a href="lista_usuarios.php" 
       class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow transition mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Voltar
    </a>

    <div class="mb-6 bg-red-700 text-white px-5 py-3 rounded-lg shadow-md flex items-start gap-3 animate-pulse">
      <svg class="w-6 h-6 mt-1 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z"/>
      </svg>
      <div>
        <strong class="block font-bold mb-1">Erro:</strong>
        <span>Erro aqui</span>
      </div>
    </div>

    <h2 class="text-3xl font-bold mb-6 border-b border-gray-700 pb-2">Cadastro de Usuário</h2>

    <form method="POST" class="space-y-6 bg-gray-800 p-6 rounded-xl shadow-lg">
      <div>
        <label for="data_cadastro" class="block text-sm font-medium text-gray-300 mb-2">Data de cadastro</label>
        <input
          type="text"
          id="data_cadastro"
          value=""
          disabled
          title="Data de cadastro"
          class="w-full p-3 rounded-md bg-gray-700 text-gray-300 border border-gray-600 cursor-not-allowed"
        />
      </div>

      <div>
        <label for="cpf" class="block text-sm font-medium text-gray-300 mb-2">CPF</label>
        <input
          type="text"
          name="cpf"
          id="cpf"
          maxlength="14"
          placeholder="CPF"
          value=""
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="nome" class="block text-sm font-medium text-gray-300 mb-2">Nome completo</label>
        <input
          type="text"
          name="nome"
          id="nome"
          maxlength="100"
          placeholder="Nome completo"
          value=""
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">E-mail</label>
        <input
          type="email"
          name="email"
          id="email"
          maxlength="100"
          placeholder="E-mail"
          value=""
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="telefone" class="block text-sm font-medium text-gray-300 mb-2">Telefone</label>
        <input
          type="text"
          id="telefone"
          name="telefone"
          maxlength="20"
          placeholder="Telefone"
          value=""
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="endereco" class="block text-sm font-medium text-gray-300 mb-2">Endereço completo</label>
        <textarea
          name="endereco"
          id="endereco"
          maxlength="1000"
          placeholder="Endereço completo"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition resize-none"
          rows="4"></textarea>
      </div>

      <div>
        <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Status</label>
        <select
          name="status"
          id="status"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
          <option value="1">Ativo</option>
          <option value="0">Inativo</option>
        </select>
      </div>

      <button
        type="submit"
        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition"
      >
        Salvar Alterações
      </button>

    </form>

  </section>

  <script>
  document.getElementById('cpf').addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '').slice(0,11);
    if (v.length > 9) v = v.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
    else if (v.length > 6) v = v.replace(/(\d{3})(\d{3})(\d+)/, '$1.$2.$3');
    else if (v.length > 3) v = v.replace(/(\d{3})(\d+)/, '$1.$2');
    e.target.value = v;
  });
  </script>

</body>
</html>
