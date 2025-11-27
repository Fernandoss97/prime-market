<x-mary-modal wire:model="open" title="Novo Produto" class="backdrop-blur" persistent>
    <div class="space-y-4">
        <!-- Nome -->
        <x-mary-input wire:model="name" label="Nome do Produto" placeholder="Digite o nome do produto"
            hint="Escolha um nome descritivo e único" />
        <x-mary-input wire:model="brand" label="Marca do Produto" placeholder="Digite a marca do produto" />

        <!-- Categoria -->
        <x-mary-select wire:model="category_id" label="Categoria" :options="$categories"
            placeholder="Selecione uma categoria" />

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Preço -->
            <x-mary-input wire:model="price" label="Preço" type="number" step="0.01" min="0"
                placeholder="0,00" prefix="R$" />

            <!-- Quantidade em Estoque -->
            <x-mary-input wire:model="stock" label="Quantidade em Estoque" type="number" min="0"
                placeholder="0" />
        </div>

        <!-- Descrição -->
        <x-mary-textarea wire:model="description" label="Descrição" placeholder="Descreva o produto..." rows="4"
            hint="Inclua detalhes importantes sobre o produto" />

        <!-- Upload de Imagem -->
        <div>
            <label class="block text-sm font-medium mb-2">Imagem do Produto</label>
            <div class="flex items-center justify-center w-full">
                <label
                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-base-300 border-dashed rounded-lg cursor-pointer hover:bg-base-200 dark:border-base-content/10 dark:hover:bg-base-200/50">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <x-mary-icon name="o-cloud-arrow-up" class="w-8 h-8 mb-2 text-gray-500" />
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                            <span class="font-semibold">Clique para enviar</span> ou arraste e solte
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG ou WEBP (MAX. 2MB)</p>
                    </div>
                    <input type="file" class="hidden" accept="image/*" />
                </label>
            </div>
        </div>
    </div>

    <x-slot:actions>
        <x-mary-button label="Cancelar" @click="$wire.open = false" />
        <x-mary-button label="Criar Produto" class="btn-primary" wire:click="create" />
    </x-slot:actions>
</x-mary-modal>
