<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Roboto', sans-serif; }
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="bg-[#f37021] m-0 p-0 overflow-x-hidden">

    <header class="bg-white flex items-center justify-between px-6 py-4 shadow-md sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <div class="bg-[#f37021] text-white font-bold text-xl rounded px-2.5 py-1 flex items-center justify-center">
                G D
            </div>
            <span class="text-xl font-medium text-gray-700 tracking-wide">Blog</span>
        </div>

        <nav class="flex items-center gap-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/inicio') }}" class="text-sm font-semibold text-gray-600 hover:text-[#f37021] transition">INÍCIO</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-[#f37021] transition">FAZER LOGIN</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-bold bg-[#f37021] text-white px-5 py-2.5 rounded shadow-sm hover:bg-orange-600 transition tracking-wider">
                            CRIAR UM BLOG
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <section class="w-full flex h-56 md:h-72 lg:h-80 overflow-hidden bg-white border-b-4 border-white">
        <div class="flex-1 border-r-4 border-white relative overflow-hidden bg-gray-100">
            <img src="{{ asset('img/jogadores.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
        </div>
        
        <div class="flex-1 border-r-4 border-white relative overflow-hidden bg-gray-100">
            <img src="{{ asset('img/familia.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
        </div>

        <div class="flex-1 relative overflow-hidden bg-gray-100">
            <img src="{{ asset('img/arte.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
            
            <a href="#conteudo-principal" class="absolute -bottom-5 right-6 md:right-12 bg-[#f37021] w-12 h-12 rounded-full flex items-center justify-center shadow-lg text-white hover:bg-orange-600 transition-all duration-300 transform hover:translate-y-1 animate-bounce z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 13l-7 7-7-7m14-6l-7 7-7-7" />
                </svg>
            </a>
        </div>
    </section>

    <main id="conteudo-principal" class="w-full px-8 py-20 md:px-24 md:py-36 flex flex-col md:flex-row items-center justify-between min-h-[80vh]">
        
        <div class="max-w-xl text-white mb-12 md:mb-0" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-light mb-6 leading-tight">Escolha o design perfeito</h1>
            <p class="text-lg md:text-xl font-light opacity-90 leading-relaxed">
                Crie um blog lindo que combine com seu estilo. Selecione um dos diversos modelos 
                fáceis de usar, com layouts flexíveis e centenas de imagens de plano de fundo, ou 
                crie o que quiser.
            </p>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center" data-aos="fade-left" data-aos-duration="1200">
            <div class="bg-white p-4 rounded-2xl shadow-2xl max-w-md rotate-3 hover:rotate-0 transition-transform duration-500">
                <img src="{{ asset('img/escrever.webp') }}" class="w-full h-auto rounded-xl object-cover">
            </div>
        </div>
    </main>

    <section class="bg-[#24292e] text-white px-8 py-24 md:px-24 md:py-36 flex flex-col md:flex-row-reverse items-center justify-between min-h-[80vh]">
        
        <div class="max-w-xl mb-12 md:mb-0" data-aos="fade-left" data-aos-duration="1000">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-light mb-6 leading-tight">Discutir gostos pessoais</h2>
            <p class="text-lg opacity-80 leading-relaxed mb-6">
                Compartilhe o que você mais ama com o mundo. Seja sobre livros, música, culinária, cinema ou hobbies peculiares, crie um espaço dedicado para debater suas preferências, encontrar pessoas com os mesmos interesses e construir sua própria comunidade de leitores.
            </p>
            <a href="#" class="inline-block border-2 border-white text-white px-6 py-2.5 rounded hover:bg-white hover:text-gray-900 transition font-medium">Saber mais</a>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center" data-aos="zoom-in-up" data-aos-duration="1200">
            <div class="bg-white p-6 rounded-2xl shadow-2xl max-w-md -rotate-3 hover:rotate-0 transition-transform duration-500">
                <img src="{{ asset('img/hobbies.jpg') }}" class="w-full h-auto rounded-xl object-cover">
            </div>
        </div>
    </section>

    <section class="bg-[#479383] text-white px-8 py-24 md:px-24 md:py-36 flex flex-col md:flex-row items-center justify-between min-h-[80vh]">
        
        <div class="max-w-xl mb-12 md:mb-0" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-light mb-6 leading-tight">Guarde as suas memórias</h2>
            <p class="text-lg opacity-90 leading-relaxed">
                Guarde os momentos mais importantes. O Blogger permite armazenar de forma segura milhares de publicações, fotos e muito mais com o Google.
            </p>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center" data-aos="fade-in" data-aos-delay="200" data-aos-duration="1500">
            <div class="max-w-xs p-4 bg-white/10 rounded-full backdrop-blur-sm animate-pulse">
                <img src="{{ asset('img/nuvem.png') }}" class="w-full h-auto object-contain">
            </div>
        </div>
    </section>

    <footer class="bg-white text-gray-600 text-center py-8 border-t border-gray-200 text-sm">
        <p>&copy; {{ date('Y') }} Blog. Desenvolvido em Laravel.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: false, 
            mirror: true 
        });
    </script>
</body>
</html>