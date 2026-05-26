<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Título do Post</label>
                            <input type="text" name="title" id="title" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="text" class="block text-sm font-medium text-gray-700">Texto / Descrição</label>
                            <textarea name="text" id="text" rows="5" required
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="categorias_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select name="categorias_id" id="categorias_id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="" disabled selected>Selecione uma categoria...</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <hr class="mb-6 border-gray-200">

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Imagem do Post (Opcional)</label>
                            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)"
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="mb-6">
                            <img id="image-preview" src="" alt="Preview da Imagem"
                                 class="hidden w-64 h-auto rounded-lg shadow-md border border-gray-300 object-cover">
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <button type="submit" class="px-6 py-2 bg-gray-800 text-white font-semibold rounded-md shadow hover:bg-gray-700 transition-colors">
                                Salvar Post
                            </button>
                            <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-900 underline">
                                Cancelar e Voltar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('image-preview');

            // Se o usuário selecionou um arquivo
            if (input.files && input.files[0]) {
                var reader = new FileReader();
               
                reader.onload = function(e) {
                    preview.src = e.target.result; // Coloca a imagem na tag <img>
                    preview.classList.remove('hidden'); // Mostra a imagem
                }
               
                reader.readAsDataURL(input.files[0]); // Lê o arquivo
            } else {
                preview.classList.add('hidden'); // Esconde a imagem se o usuário cancelar
                preview.src = "";
            }
        }
    </script>
</x-app-layout>