<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ficha do Usuário</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
  <?php
  require_once 'menu.php';
  ?>
  <!-- Ficha do usuário -->
  <main class="p-4 max-w-5xl mx-auto mt-6 bg-gray-800 rounded-lg shadow-lg relative">

    <!-- Botões no topo -->
    <div class="flex justify-between mb-4">
      <a href="lista_usuarios.php" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-1 px-4 rounded text-sm">
        ← Voltar
      </a>
      <a href="cadastro_usuario.php?id=00" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-4 rounded text-sm">
        ✏️ Alterar
      </a>
    </div>

    <!-- Conteúdo da ficha -->
    <h2 class="text-3xl font-bold mb-4">Ficha do Usuário</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 text-sm">
      <div>
        <span class="text-gray-400">CPF:</span>
        <p class="text-white font-medium break-words">999.999.999-99</p>
      </div>
      <div>
        <span class="text-gray-400">Nome Completo:</span>
        <p class="text-white font-medium break-words">Maria Antonia</p>
      </div>
      <div>
        <span class="text-gray-400">E-mail:</span>
        <p class="text-white font-medium break-words">maria@gmail.com</p>
      </div>
      <div>
        <span class="text-gray-400">Telefone:</span>
        <p class="text-white font-medium break-words">(15) 99988-2232</p>
      </div>
      <div>
        <span class="text-gray-400">Data de Cadastro:</span>
        <p class="text-white font-medium break-words">10/10/2024</p>
      </div>
      <div>
        <span class="text-gray-400">Endereço:</span>
        <p class="text-white font-medium break-words">Rua Joao, 123</p>
      </div>
      <div>
        <span class="text-gray-400">Status:</span>
        <p class="text-white font-medium">Ativo</p>
      </div>
    </div>

    <!-- Histórico de aluguéis -->
    <div>
      <h3 class="text-2xl font-semibold mb-4">Histórico de Aluguéis</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-gray-700 p-4 rounded-lg shadow-md hover:bg-gray-600">
          <div class="flex items-center">
            <img src="../imagens/" alt="Capa do livro" class="w-16 h-20 object-cover rounded-md shadow border border-gray-600">
            <div class="ml-4">
              <h4 class="text-lg font-semibold">Um amor para Recordar</h4>
              <p class="text-sm text-gray-300 break-words">Locado em: 10/10/2024</p>
              <p class="text-sm text-gray-300 break-words">Devolvido em: 13/10/2024</p>
              <span class="bg-blue-500 text-white font-semibold py-1 px-2 rounded text-xs">Alugado</span>
              <span class="bg-red-500 text-white font-semibold py-1 px-2 rounded text-xs">Atrasado</span>
              <span class="bg-green-500 text-white font-semibold py-1 px-2 rounded text-xs">Devolvido</span>
            </div>
          </div>
        </div>
        <p> Nenhum aluguel realizado para este usuário.</p>
      </div>
    </div>

  </main>
</body>
</html>
