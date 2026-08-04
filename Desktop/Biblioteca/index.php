<!DOCTYPE html>
<html lang="pt-BR" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>📚 Biblioteca Digital - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">
  
  <?php require_once 'views/menu.php'; ?>

  <main class="max-w-7xl mx-auto px-6 py-10">
    <!-- Título -->
    <header class="mb-10 text-center">
      <h1 class="text-4xl font-extrabold mb-2">Biblioteca Digital</h1>
      <p class="text-gray-400 text-lg">Painel de controle e cadastros</p>
    </header>

    <!-- Estatísticas -->
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
      <div class="bg-gradient-to-r from-blue-700 to-blue-500 rounded-xl p-6 shadow-lg flex flex-col items-center">
        <div class="w-12 h-12 mb-3 text-blue-200">
          <!-- Book Open Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-12v12a2 2 0 01-2 2H8a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2z" />
          </svg>
        </div>
        <h2 class="text-3xl font-bold">10</h2>
        <p class="uppercase tracking-widest text-sm text-blue-200">Livros cadastrados</p>
      </div>
      <div class="bg-gradient-to-r from-indigo-700 to-indigo-500 rounded-xl p-6 shadow-lg flex flex-col items-center">
        <div class="w-12 h-12 mb-3 text-indigo-200">
          <!-- Pencil Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M16.5 3.5l4 4M12 19l7-7" />
          </svg>
        </div>
        <h2 class="text-3xl font-bold">10</h2>
        <p class="uppercase tracking-widest text-sm text-indigo-200">Autores cadastrados</p>
      </div>
      <div class="bg-gradient-to-r from-purple-700 to-purple-500 rounded-xl p-6 shadow-lg flex flex-col items-center">
        <div class="w-12 h-12 mb-3 text-purple-200">
          <!-- Tag Icon (categories) -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 7v10a2 2 0 002 2h6a2 2 0 002-2V7h-4l-4-4z" />
          </svg>
        </div>
        <h2 class="text-3xl font-bold">10</h2>
        <p class="uppercase tracking-widest text-sm text-purple-200">Categorias cadastradas</p>
      </div>
      <div class="bg-gradient-to-r from-teal-700 to-teal-500 rounded-xl p-6 shadow-lg flex flex-col items-center">
        <div class="w-12 h-12 mb-3 text-teal-200">
          <!-- User Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A7.966 7.966 0 0112 15a7.966 7.966 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <h2 class="text-3xl font-bold">10</h2>
        <p class="uppercase tracking-widest text-sm text-teal-200">Usuários cadastrados</p>
      </div>
    </section>

    <!-- Cards de navegação -->
   <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
      <a href="views/lista_editoras.php" class="group bg-gray-800 rounded-2xl p-8 flex flex-col items-start shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-transparent hover:border-blue-400">
        <div class="w-12 h-12 mb-6 text-blue-500 group-hover:text-blue-400 transition-colors duration-300">
          <!-- Building Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4a1 1 0 011-1h3v5H3zM7 21V8a1 1 0 011-1h3v14H8a1 1 0 01-1-1zm7 0v-5h3a1 1 0 011 1v4h-4zm0-6V4a1 1 0 00-1-1H9a1 1 0 00-1 1v11h6z" />
          </svg>
        </div>
        <h3 class="text-2xl font-semibold mb-2 group-hover:text-blue-300 transition-colors duration-300">Editoras</h3>
        <p class="text-gray-400 text-base leading-relaxed">Gerencie editoras cadastradas.</p>
      </a>

      <a href="views/lista_autores.php" 
        class="group bg-gray-800 rounded-2xl p-8 flex flex-col items-start shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-transparent hover:border-blue-400">
        <div class="w-12 h-12 mb-6 text-blue-500 group-hover:text-blue-400 transition-colors duration-300">
          <!-- Pencil Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M16.5 3.5l4 4M12 19l7-7" />
          </svg>
        </div>
        <h3 class="text-2xl font-semibold mb-2 group-hover:text-blue-300 transition-colors duration-300">Autores</h3>
        <p class="text-gray-400 text-base leading-relaxed">Gerencie autores cadastrados.</p>
      </a>

      <a href="views/lista_usuarios.php" 
        class="group bg-gray-800 rounded-2xl p-8 flex flex-col items-start shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-transparent hover:border-blue-400">
        <div class="w-12 h-12 mb-6 text-blue-500 group-hover:text-blue-400 transition-colors duration-300">
          <!-- User Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A7.966 7.966 0 0112 15a7.966 7.966 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <h3 class="text-2xl font-semibold mb-2 group-hover:text-blue-300 transition-colors duration-300">Usuários</h3>
        <p class="text-gray-400 text-base leading-relaxed">Gerencie usuários do sistema.</p>
      </a>

      <a href="views/lista_livros.php" 
        class="group bg-gray-800 rounded-2xl p-8 flex flex-col items-start shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-transparent hover:border-blue-400">
        <div class="w-12 h-12 mb-6 text-blue-500 group-hover:text-blue-400 transition-colors duration-300">
          <!-- Book Open Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-12v12a2 2 0 01-2 2H8a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2z" />
          </svg>
        </div>
        <h3 class="text-2xl font-semibold mb-2 group-hover:text-blue-300 transition-colors duration-300">Livros</h3>
        <p class="text-gray-400 text-base leading-relaxed">Gerencie livros cadastrados.</p>
      </a>

      <a href="views/lista_categorias.php" 
        class="group bg-gray-800 rounded-2xl p-8 flex flex-col items-start shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-transparent hover:border-blue-400">
        <div class="w-12 h-12 mb-6 text-blue-500 group-hover:text-blue-400 transition-colors duration-300">
          <!-- Tag Icon (categories) -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-full h-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 7v10a2 2 0 002 2h6a2 2 0 002-2V7h-4l-4-4z" />
          </svg>
        </div>
        <h3 class="text-2xl font-semibold mb-2 group-hover:text-blue-300 transition-colors duration-300">Categorias</h3>
        <p class="text-gray-400 text-base leading-relaxed">Gerencie categorias de livros.</p>
      </a>
    </section>
  </main>
</body>
</html>
