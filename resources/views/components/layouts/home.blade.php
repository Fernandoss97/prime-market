<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    {{-- Vite assets: ensure TailwindCSS and JS are loaded --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200">
    <!-- Global Header outside of x-mary-main so it always renders -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="#" class="text-2xl font-bold text-indigo-600 tracking-tight">PrimeMarket</a>
            </div>

            <!-- Search Bar (Hidden on mobile, visible on md+) -->
            <div class="hidden md:flex flex-1 max-w-2xl mx-8">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:bg-white focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Buscar produtos, marcas e muito mais...">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-4">
                <a href="#"
                    class="text-gray-500 hover:text-gray-900 font-medium text-sm hidden sm:block">Login</a>
                <a href="#"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors hidden sm:block">Criar
                    Conta</a>

                <!-- Cart Icon -->
                <button class="relative p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Ver carrinho</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-red-600 rounded-full">0</span>
                </button>
            </div>
        </div>
        <!-- Mobile Search (Visible only on mobile) -->
        <div class="md:hidden px-4 pb-3">
            <input type="text"
                class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:bg-white focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Buscar...">
        </div>
    </header>



    <!-- Main content area wrapped by Mary UI -->
    <x-mary-main full-width>
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    <!-- Global Footer outside of x-mary-main so it always renders -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <span class="text-2xl font-bold tracking-tight text-white">PrimeMarket</span>
                    <p class="mt-4 text-gray-400 text-sm">
                        O seu destino número um para compras online. Qualidade, variedade e confiança.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Sobre</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Quem somos</a>
                        </li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Carreiras</a>
                        </li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Ajuda</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Central de
                                Ajuda</a>
                        </li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Termos de Uso</a>
                        </li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Política de
                                Privacidade</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Contato</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#"
                                class="text-base text-gray-400 hover:text-white">contato@primemarket.com</a>
                        </li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">+55 11
                                9999-9999</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8">
                <p class="text-base text-gray-400 text-center">
                    &copy; {{ date('Y') }} PrimeMarket. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
