<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Livro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">

  <?php
    require_once 'menu.php';
  ?>
  
  <section class="p-4 max-w-4xl mx-auto">

    <!-- Botão Voltar com ícone -->
    <a href="lista_livros.php" 
       class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow transition mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Voltar
    </a>

    <h2 class="text-3xl font-bold mb-6 border-b border-gray-700 pb-2">Cadastro de Livro</h2>

    <div class="mb-6 bg-red-700 text-white px-5 py-3 rounded-lg shadow-md flex items-start gap-3 animate-pulse">
      <svg class="w-6 h-6 mt-1 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z"/>
      </svg>
      <div>
        <strong class="block font-bold mb-1">Erro:</strong>
        <span>Erro aqui</span>
      </div>
    </div>
  
    <form method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-xl shadow-lg space-y-6">

      <div>
        <label for="titulo" class="block text-sm font-medium text-gray-300 mb-2">Título</label>
        <input
          type="text"
          id="titulo"
          name="titulo"
          value=""
          maxlength="200"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="descricao" class="block text-sm font-medium text-gray-300 mb-2">Descrição</label>
        <input
          type="text"
          id="descricao"
          name="descricao"
          maxlength="2000"
          value=""
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="autor" class="block text-sm font-medium text-gray-300 mb-2">Autor</label>
        <select
          id="autor"
          name="autor"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
          <option value="">Selecione uma opção</option>
          <option value="">Autor 1</option>
        </select>
      </div>

      <div>
        <label for="ano_publicacao" class="block text-sm font-medium text-gray-300 mb-2">Ano de Publicação</label>
        <input
          type="text"
          id="ano_publicacao"
          name="ano_publicacao"
          maxlength="4"
          value=""
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="editora" class="block text-sm font-medium text-gray-300 mb-2">Editora</label>
        <select
          id="editora"
          name="editora"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
          <option value="">Selecione uma opção</option>
          <option value="">Editora 1</option>
        </select>
      </div>

      <div>
        <label for="categoria" class="block text-sm font-medium text-gray-300 mb-2">Categoria</label>
        <select
          id="categoria"
          name="categoria"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
          <option value="">Selecione uma opção</option>
          <option value="">
            Romance
          </option>
        </select>
      </div>

      <div>
        <label for="isbn" class="block text-sm font-medium text-gray-300 mb-2">ISBN</label>
        <input
          type="text"
          id="isbn"
          name="isbn"
          maxlength="20"
          value=""
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        />
      </div>

      <div>
        <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Status</label>
        <select
          id="status"
          name="status"
          required
          class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
          <option value="1">Ativo</option>
          <option value="0">Inativo</option>
        </select>
      </div>

      <div>
        <label for="imagem" class="block text-sm font-medium text-gray-300 mb-2">Imagem da Capa</label>
        <input
          id="imagem"
          name="imagem"
          type="file"
          accept="image/*"
          class="w-full text-white"
        />
      </div>

      <!-- Pré-visualização -->
      <div id="preview-container" 
           class="mt-3 relative max-w-[200px] 'hidden' ?>">
        <input type="hidden" id="remover_imagem_flag" name="remover_imagem" value="0">
        
        <img id="preview-imagem"
             src=""
             class="rounded-lg shadow-md w-full h-auto border border-gray-600"
             alt="Pré-visualização">

        <button type="button" id="remover-imagem" 
                class="absolute top-0 right-0 bg-red-600 hover:bg-red-700 text-white p-2 rounded-full shadow-md transform translate-x-1/3 -translate-y-1/3">
          ✕
        </button>
      </div>

      <div class="text-right">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg text-white font-semibold shadow-lg transition">
          Salvar Alterações
        </button>
      </div>

    </form>
  </section>

  <script>
    document.getElementById('ano_publicacao').addEventListener('keydown', function (e) {
      const allowedKeys = ['Backspace', 'ArrowLeft', 'ArrowRight', 'Tab', 'Delete'];
      if (
        allowedKeys.includes(e.key) ||
        (e.key >= '0' && e.key <= '9')
      ) {
        return;
      }
      e.preventDefault();
    });
  </script>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const inputImagem = document.getElementById('imagem');
    const previewContainer = document.getElementById('preview-container');
    const previewImagem = document.getElementById('preview-imagem');
    const btnRemover = document.getElementById('remover-imagem');

    inputImagem.addEventListener('change', function() {
      const file = this.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          previewImagem.src = e.target.result;
          previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
      } else {
        previewImagem.src = '';
        previewContainer.classList.add('hidden');
      }
    });

    btnRemover.addEventListener('click', function() {
      inputImagem.value = '';
      previewImagem.src = '';
      previewContainer.classList.add('hidden');
      document.getElementById('remover_imagem_flag').value = '1';
    });
  </script>

</body>
</html>
