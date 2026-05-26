<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $query = Post::query();

    if ($request->filled('categoria_filtro')) {
        $query->where('categorias_id', $request->input('categoria_filtro'));
    }

    
    $posts = $query->latest()->get();

    
    $categorias = Categoria::all();

  
    return view('posts.index', compact('posts', 'categorias'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorias = Categoria::all();

        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // Variável para guardar o caminho da imagem (nulo por padrão)
    $imagePath = null;

    // Verifica se o usuário enviou uma imagem e se ela é válida
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Salva a imagem na pasta 'public/posts_images' e pega o caminho
        $imagePath = $request->file('image')->store('posts_images', 'public');
    }

    Post::create([
        'title' => $request->input('title'),
        'text' => $request->input('text'),
        'categorias_id' => $request->input('categorias_id'),
        'image' => $imagePath, // Salva o caminho no banco de dados
    ]);

    return redirect()->route('posts.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         $categorias = Categoria::all();

        return view('posts.edit', compact('categorias' , 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Post $post)
    {
        // Validar dados
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorias_id' => 'required|exists:categorias,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da nova imagem
        if ($request->hasFile('image')) {
            // Deletar imagem anterior se existir
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Armazenar nova imagem
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        // Atualizar post
        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
