<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Usuários Cadastrados</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">
 
<?php
require_once 'menu.php';
?>
  <!-- Breadcrumb -->
  <nav class="px-6 py-3 text-sm text-gray-400" aria-label="Breadcrumb">
    <ol class="list-reset flex space-x-2 items-center">
      <li><a href="../index.php" class="hover:text-white transition">Início</a></li>
      <li>/</li>
      <li class="text-gray-300 font-semibold">Usuários</li>
    </ol>
  </nav>

  <!-- Cabeçalho e botão Novo -->
  <section class="relative max-w-7xl mx-auto px-6 py-8">
    <div class="text-center">
      <h1 class="text-3xl font-bold">Usuários Cadastrados</h1>
      <p class="text-gray-400 mt-1">Aqui estão os usuários cadastrados na biblioteca.</p>
    </div>
    <a href="cadastro_usuario.php" 
      class="absolute right-6 top-1/2 -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">
      + Novo Usuário
    </a>
  </section>

  <!-- Filtros -->
  <form method="POST" class="max-w-7xl mx-auto px-6 mt-8 flex flex-col md:flex-row gap-4 md:gap-6 justify-center items-center">
    <input
      type="text"
      maxlength="100"
      value=""
      name="cpf"
      placeholder="Filtrar por CPF..."
      class="w-full md:w-1/4 p-3 rounded bg-gray-800 text-white placeholder-gray-500 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
      autocomplete="off"
    />
    <input
      type="text"
      maxlength="100"
      value=""
      name="nome_usuario"
      placeholder="Filtrar por nome..."
      class="w-full md:w-1/4 p-3 rounded bg-gray-800 text-white placeholder-gray-500 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
      autocomplete="off"
    />
    <button
      type="submit"
      class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded shadow transition"
    >
      Pesquisar
    </button>
  </form>

  <section class="max-w-7xl mx-auto px-6 mt-10">
    <div class="rounded-lg overflow-x-auto shadow-lg bg-gray-800 border border-gray-700">
      <table class="min-w-full table-auto text-sm text-gray-200">
        <thead class="bg-gray-900 border-b border-gray-700">
          <tr>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wide text-gray-400">CPF</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wide text-gray-400">Nome</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wide text-gray-400">E-mail</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wide text-gray-400">Telefone</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wide text-gray-400 max-w-xs">Endereço</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wide text-gray-400">Situação</th>
            <th class="px-6 py-3 text-center font-semibold uppercase tracking-wide text-gray-400">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr class="hover:bg-gray-700 transition-colors duration-200 border-b border-gray-700 last:border-b-0">
            <td class="px-6 py-4 whitespace-nowrap">999.999.999-99</td>
            <td class="px-6 py-4 whitespace-nowrap font-medium text-white">Maria</td>
            <td class="px-6 py-4 whitespace-nowrap">maria@gmail.com</td>
            <td class="px-6 py-4 whitespace-nowrap">(15) 99988-8888</td>
            <td class="px-6 py-4 max-w-xs truncate" title="Rua das Flores, 123, Centro, São Paulo - SP">Rua Jose Santos, 200</td>
            <td class="px-6 py-4 whitespace-nowrap">Ativo</td>
            <td class="px-6 py-4 text-center">
              <div class="flex justify-center gap-3">
                <a href="ficha_usuario.php?id=00" class="flex items-center justify-center w-9 h-9 bg-gray-700 hover:bg-gray-600 rounded-md text-white shadow-sm transition-colors" title="Ver ficha">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4" /><path d="M5.5 21a7 7 0 0113 0" /></svg>
                </a>
                <a href="cadastro_usuario.php?id=00" class="flex items-center justify-center w-9 h-9 bg-yellow-500 hover:bg-yellow-400 rounded-md text-white shadow-sm transition-colors" title="Editar usuário">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9" /><path d="M16.5 3.5a2.121 2.121 0 113 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                </a>
                <a href="excluir_usuario.php?id=00" class="flex items-center justify-center w-9 h-9 bg-red-600 hover:bg-red-500 rounded-md text-white shadow-sm transition-colors" title="Excluir usuário">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6" /><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" /><path d="M10 11v6" /><path d="M14 11v6" /><path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" /></svg>
                </a>
                <a href="lista_alugueis.php?id_usuario=00" class="flex items-center justify-center w-9 h-9 bg-green-600 hover:bg-green-500 rounded-md text-white shadow-sm transition-colors" title="Ver aluguéis">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2" /><path d="M16 3v4M8 3v4M3 11h18" /></svg>
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
  
  <div style="text-align: center; margin-top: 40px;">
    <p>Nenhum usuário cadastrado!</p>
  </div>
</body>
</html>
