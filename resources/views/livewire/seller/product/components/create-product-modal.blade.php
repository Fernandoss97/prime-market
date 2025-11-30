<x-mary-modal wire:model="open" title="Novo Produto" class="backdrop-blur  " persistent>
    <div class="space-y-4 max-h-[70vh] overflow-y-auto pr-2">
        <!-- Nome -->
        <x-mary-input wire:model="name" label="Nome do Produto" placeholder="Digite o nome do produto"
            hint="Escolha um nome descritivo e único" />
        <x-mary-input wire:model="brand" label="Marca do Produto" placeholder="Digite a marca do produto" />

        <!-- Categoria -->
        <x-mary-select wire:model="category_id" label="Categoria" :options="$categories"
            placeholder="Selecione uma categoria" />

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Preço -->
            <x-mary-input wire:model="price" label="Preço" step="0.01" min="0" placeholder="0,00"
                prefix="R$" locale="pt-BR" money />

            <!-- Quantidade em Estoque -->
            <x-mary-input wire:model="stock" label="Quantidade em Estoque" type="number" min="0"
                placeholder="0" />
        </div>

        <!-- Descrição -->
        <x-mary-textarea wire:model="description" label="Descrição" placeholder="Descreva o produto..." rows="4"
            hint="Inclua detalhes importantes sobre o produto" />

        <!-- Upload de Imagem -->
        <label class="mb-2 block text-sm font-medium text-base-content/70">Imagem do Produto</label>
        <div class="flex items-center justify-center">
            <x-mary-file wire:model="image" accept="image/png" crop-after-change change-text="Alterar Imagem"
                crop-text="Cortar" crop-title-text="Cortar Imagem" crop-cancel-text="Cancelar" crop-save-text="Cortar">
                <img src="{{ '/add-image-placeholder.jpg' }}" class="h-25 rounded-lg" />
            </x-mary-file>
        </div>
    </div>

    <x-slot:actions>
        <x-mary-button label="Cancelar" @click="$wire.open = false" />
        <x-mary-button label="Criar Produto" class="btn-primary" wire:click="create" />
    </x-slot:actions>
</x-mary-modal>
