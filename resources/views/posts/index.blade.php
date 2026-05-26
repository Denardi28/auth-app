<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 mb-6">
                        <a href="{{ route('posts.create') }}" style="color: white; text-decoration: none;">➕ Adicione um novo Post</a>
                    </button>

                    <div class="mb-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <form method="GET" action="{{ route('posts.index') }}" class="flex items-end gap-4">
                            <div class="flex-1">
                                <label for="filtrar_categoria" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Filtrar por Categoria:</label>
                                <select name="categoria_filtro" id="filtrar_categoria" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100">
                                    <option value="">Todas os posts (Sem filtro)</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ request('categoria_filtro') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="flex gap-2">
                                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md text-xs uppercase tracking-widest transition">
                                    Filtrar
                                </button>
                                
                                @if(request('categoria_filtro'))
                                    <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-md text-xs uppercase tracking-widest transition text-center no-underline">
                                        Limpar
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    @forelse($posts as $post)
                        <div class="py-4">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-xl border border-gray-100 dark:border-gray-700">
                                    
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        
                                        <div class="h-24 bg-gradient-to-r from-blue-500 to-purple-600 relative overflow-hidden flex items-end justify-between p-4 rounded-lg mb-4">
                                            <div class="absolute inset-0 bg-black/20"></div>
                                            
                                            <h3 class="text-3xl font-bold text-white line-clamp-2 relative z-10">
                                                {{ $post->title }}
                                            </h3>

                                            <div class="flex gap-2 relative z-10">
                                                <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors text-sm">
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Tem certeza?')" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors text-sm">
                                                        Deletar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full uppercase tracking-wider">
                                                @foreach ($categorias as $categoria)
                                                    @if($categoria->id == $post->categorias_id)
                                                        {{ $categoria->name }}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>

                                        <p class="pl-1 h-auto text-lg text-gray-700 dark:text-gray-300 line-clamp-3 mb-4">
                                            {{ $post->text }}
                                        </p>

                                        @if($post->image)
                                            <div class="w-full overflow-hidden rounded-lg shadow-sm mb-4">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-contain">
                                            </div>
                                        @endif

                                        <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 mt-4">Nenhum post encontrado</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>