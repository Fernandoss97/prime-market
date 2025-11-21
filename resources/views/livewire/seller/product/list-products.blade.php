<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Produtos</h1>
            <p class="text-gray-500 dark:text-gray-400">Gerencie seus produtos e estoque</p>
        </div>

        <x-mary-button icon="o-plus" label="Novo produto" class="btn-primary"
            wire:click="$dispatch('open-create-modal')" />
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <x-mary-card class="border border-base-300 p-4 shadow-sm dark:border-base-content/10">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Total de produtos</div>
                    <div class="text-2xl font-semibold">128</div>
                </div>
                <x-mary-icon name="o-cube" class="h-10 w-10 text-primary" />
            </div>
        </x-mary-card>

        <x-mary-card class="border border-base-300 p-4 shadow-sm dark:border-base-content/10">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Ativos</div>
                    <div class="text-2xl font-semibold">103</div>
                </div>
                <x-mary-icon name="o-check-circle" class="h-10 w-10 text-emerald-500" />
            </div>
        </x-mary-card>

        <x-mary-card class="border border-base-300 p-4 shadow-sm dark:border-base-content/10">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Baixo estoque</div>
                    <div class="text-2xl font-semibold">12</div>
                </div>
                <x-mary-icon name="o-exclamation-triangle" class="h-10 w-10 text-amber-500" />
            </div>
        </x-mary-card>

        <x-mary-card class="border border-base-300 p-4 shadow-sm dark:border-base-content/10">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Fora de estoque</div>
                    <div class="text-2xl font-semibold">13</div>
                </div>
                <x-mary-icon name="o-x-circle" class="h-10 w-10 text-rose-500" />
            </div>
        </x-mary-card>
    </div>

    @php
        $users = [
            ['id' => 1, 'name' => 'Joe'],
            ['id' => 2, 'name' => 'Mary'],
            ['id' => 3, 'name' => 'John'],
            ['id' => 4, 'name' => 'Alice'],
            ['id' => 5, 'name' => 'Bob'],
            ['id' => 6, 'name' => 'Charlie'],
        ];
    @endphp

    <!-- Filters -->
    <x-mary-card class="border border-base-300 shadow-sm dark:border-base-content/10">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <x-mary-input label="Buscar" icon="o-magnifying-glass" placeholder="Buscar por nome ou SKU..." />

            <x-mary-select label="Categoria" :options="$users" />
            <x-mary-select label="Status" :options="$users" />

        </div>
    </x-mary-card>

    <!-- Products Table -->
    <x-mary-card class="overflow-hidden border border-base-300 shadow-sm dark:border-base-content/10">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr
                        class="border-b border-base-300 text-xs uppercase text-gray-500 dark:border-base-content/10 dark:text-gray-400">
                        <th class="px-4 py-3">Produto</th>
                        <th class="px-4 py-3">Categoria</th>
                        <th class="px-4 py-3">Preço</th>
                        <th class="px-4 py-3">Estoque</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Ativo</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-300 dark:divide-base-content/10">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                        class="h-15 w-15 rounded-md object-cover" />
                                    <div>
                                        <div class="font-medium">{{ $product->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $product->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">{{ $product->category->name }}</td>
                            <td class="px-4 py-4">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-4 py-4">{{ $product->stock }}</td>
                            <td class="px-4 py-4">
                                @if ($product->status->equals(\App\Enums\ProductStatusEnum::available()))
                                    <x-mary-badge value="Disponível" class="badge-success badge-outline" />
                                @elseif($product->status->equals(\App\Enums\ProductStatusEnum::lowStock()))
                                    <x-mary-badge value="Estoque baixo" class="badge-warning badge-outline" />
                                @else
                                    <x-mary-badge value="Sem estoque" class="badge-error badge-outline" />
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                @if ($product->is_active)
                                    <x-mary-badge value="Ativo" class="badge-success badge-outline" />
                                @else
                                    <x-mary-badge value="Inativo" class="badge-error badge-outline" />
                                @endif
                            </td>
                            <td class="px-4 py-4 text-right">
                                <div class="inline-flex items-center gap-2">

                                    <x-mary-button icon="o-ellipsis-vertical" class="btn-ghost btn-sm" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    </x-mary-card>

    <!-- Modal de Criação de Produto -->
    <livewire:seller.product.components.create-product-modal :categories="$categories" />
</div>
