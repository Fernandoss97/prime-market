<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Produtos</h1>
            <p class="text-gray-500">Gerencie seus produtos e estoque</p>
        </div>

        <x-mary-button icon="o-plus" label="Novo produto" />
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <x-mary-card class="p-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500">Total de produtos</div>
                    <div class="text-2xl font-semibold">128</div>
                </div>
                <x-mary-icon name="o-cube" class="h-10 w-10 text-primary" />
            </div>
        </x-mary-card>

        <x-mary-card class="p-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500">Ativos</div>
                    <div class="text-2xl font-semibold">103</div>
                </div>
                <x-mary-icon name="o-check-circle" class="h-10 w-10 text-emerald-500" />
            </div>
        </x-mary-card>

        <x-mary-card class="p-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500">Baixo estoque</div>
                    <div class="text-2xl font-semibold">12</div>
                </div>
                <x-mary-icon name="o-exclamation-triangle" class="h-10 w-10 text-amber-500" />
            </div>
        </x-mary-card>

        <x-mary-card class="p-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500">Fora de estoque</div>
                    <div class="text-2xl font-semibold">13</div>
                </div>
                <x-mary-icon name="o-x-circle" class="h-10 w-10 text-rose-500" />
            </div>
        </x-mary-card>
    </div>

    <!-- Filters -->
    <x-mary-card>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <x-mary-input label="Buscar" icon="o-magnifying-glass" placeholder="Buscar por nome ou SKU..." />

            <x-mary-select label="Categoria">
                <option value="">Todas</option>
                <option value="camisetas">Camisetas</option>
                <option value="calcas">Calças</option>
                <option value="acessorios">Acessórios</option>
            </x-mary-select>

            <x-mary-select label="Status">
                <option value="">Todos</option>
                <option value="ativo">Ativos</option>
                <option value="inativo">Inativos</option>
                <option value="baixo-estoque">Baixo estoque</option>
                <option value="fora-de-estoque">Fora de estoque</option>
            </x-mary-select>
        </div>
    </x-mary-card>

    <!-- Products Table -->
    <x-mary-card class="overflow-hidden">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-xs uppercase text-gray-500">
                        <th class="px-4 py-3">Produto</th>
                        <th class="px-4 py-3">Categoria</th>
                        <th class="px-4 py-3">Preço</th>
                        <th class="px-4 py-3">Estoque</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr>
                        <td class="px-4 py-4">
                            <div class="font-medium">Camiseta Básica</div>
                            <div class="text-xs text-gray-500">SKU: CAM-001</div>
                        </td>
                        <td class="px-4 py-4">Camisetas</td>
                        <td class="px-4 py-4">R$ 79,90</td>
                        <td class="px-4 py-4">42</td>
                        <td class="px-4 py-4">
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">Ativo</span>
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                <x-mary-button icon="o-eye" class="btn-ghost btn-sm" />
                                <x-mary-button icon="o-pencil-square" class="btn-ghost btn-sm" />
                                <x-mary-button icon="o-ellipsis-vertical" class="btn-ghost btn-sm" />
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="px-4 py-4">
                            <div class="font-medium">Calça Jeans Slim</div>
                            <div class="text-xs text-gray-500">SKU: CAL-023</div>
                        </td>
                        <td class="px-4 py-4">Calças</td>
                        <td class="px-4 py-4">R$ 159,90</td>
                        <td class="px-4 py-4">4</td>
                        <td class="px-4 py-4">
                            <span
                                class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-medium text-amber-700">Baixo
                                estoque</span>
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                <x-mary-button icon="o-eye" class="btn-ghost btn-sm" />
                                <x-mary-button icon="o-pencil-square" class="btn-ghost btn-sm" />
                                <x-mary-button icon="o-ellipsis-vertical" class="btn-ghost btn-sm" />
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="px-4 py-4">
                            <div class="font-medium">Boné Trucker</div>
                            <div class="text-xs text-gray-500">SKU: ACR-112</div>
                        </td>
                        <td class="px-4 py-4">Acessórios</td>
                        <td class="px-4 py-4">R$ 59,90</td>
                        <td class="px-4 py-4">0</td>
                        <td class="px-4 py-4">
                            <span
                                class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">Fora
                                de estoque</span>
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                <x-mary-button icon="o-eye" class="btn-ghost btn-sm" />
                                <x-mary-button icon="o-pencil-square" class="btn-ghost btn-sm" />
                                <x-mary-button icon="o-ellipsis-vertical" class="btn-ghost btn-sm" />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t px-4 py-3 text-sm text-gray-600">
            <div>Mostrando 1 a 10 de 50 resultados</div>
            <div class="flex items-center gap-1">
                <x-mary-button class="btn-ghost btn-sm" icon="o-chevron-left" />
                <x-mary-button class="btn-ghost btn-sm">1</x-mary-button>
                <x-mary-button class="btn-ghost btn-sm">2</x-mary-button>
                <x-mary-button class="btn-ghost btn-sm">3</x-mary-button>
                <x-mary-button class="btn-ghost btn-sm" icon="o-chevron-right" />
            </div>
        </div>
    </x-mary-card>
</div>
