<div>
    <!-- 2. Hero Section -->
    <section class="relative bg-white overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
                <div class="mb-12 lg:mb-0 text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Encontre tudo o que</span>
                        <span class="block text-indigo-600 xl:inline">precisa em um só lugar</span>
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        O marketplace mais completo para você. Eletrônicos, moda, casa e muito mais com as melhores
                        ofertas e entrega rápida.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="#"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Explorar produtos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lg:relative">
                    <img class="w-full rounded-xl shadow-xl ring-1 ring-black/5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                        src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        alt="Shopping illustration" style="max-height: 400px; object-fit: cover; width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Categories Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Navegue por Categorias</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @foreach (['Eletrônicos', 'Moda', 'Casa & Jardim', 'Esportes', 'Beleza', 'Brinquedos'] as $category)
                    <a href="#"
                        class="group flex flex-col items-center p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                        <div
                            class="h-16 w-16 bg-indigo-50 rounded-full flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                            <!-- Placeholder Icon -->
                            <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </div>
                        <span
                            class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">{{ $category }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. Featured Products -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Produtos em Destaque</h2>
                <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">Ver todos</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @for ($i = 1; $i <= 8; $i++)
                    <div
                        class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-200 group-hover:opacity-75 h-64 overflow-hidden">
                            <img src="https://picsum.photos/seed/{{ $i }}/400/400" alt="Product image"
                                class="w-full h-full object-center object-cover">
                        </div>
                        <div class="flex-1 p-4 space-y-2 flex flex-col">
                            <h3 class="text-sm font-medium text-gray-900">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Produto Exemplo {{ $i }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500">Uma breve descrição do produto.</p>
                            <div class="flex-1 flex flex-col justify-end">
                                <p class="text-lg font-bold text-gray-900">R$ {{ rand(50, 500) }},00</p>
                            </div>
                            <button
                                class="mt-4 w-full bg-gray-100 text-gray-900 py-2 px-4 rounded-md text-sm font-medium hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Ver mais
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- 5. Benefits -->
    <section class="py-16 bg-indigo-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Benefit 1 -->
                <div class="flex items-start space-x-4">
                    <div class="shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Entrega Rápida</h3>
                        <p class="mt-2 text-base text-gray-500">Receba seus produtos em tempo recorde com nossa
                            logística otimizada.</p>
                    </div>
                </div>

                <!-- Benefit 2 -->
                <div class="flex items-start space-x-4">
                    <div class="shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Pagamento Seguro</h3>
                        <p class="mt-2 text-base text-gray-500">Transações protegidas e diversas opções de pagamento
                            para sua comodidade.</p>
                    </div>
                </div>

                <!-- Benefit 3 -->
                <div class="flex items-start space-x-4">
                    <div class="shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Suporte 24/7</h3>
                        <p class="mt-2 text-base text-gray-500">Nossa equipe está sempre pronta para ajudar você em
                            qualquer momento.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
