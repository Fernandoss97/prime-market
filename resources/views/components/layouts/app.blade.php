<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen font-sans antialiased bg-base-200">
    <x-mary-toast />
    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:brand>
            <div class="ml-5 pt-5">
                <a href="{{ route('dashboard') }}" wire:navigate>
                    <x-app-logo />
                </a>
            </div>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible
            class="bg-base-100 border-r border-base-300 dark:border-base-content/10">

            {{-- BRAND --}}
            <div class="ml-5 pt-5 mb-5">
                <a href="{{ route('dashboard') }}" wire:navigate>
                    <x-app-logo />
                </a>
            </div>

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
                @if ($user = auth()->user())
                    <x-mary-menu-separator />

                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                        class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-mary-button icon="o-arrow-right-on-rectangle" class="btn-circle btn-ghost btn-xs"
                                    tooltip-left="Sair" type="submit" />
                            </form>
                        </x-slot:actions>
                    </x-mary-list-item>

                    <x-mary-menu-separator />
                @endif
                <x-mary-menu-item title="Dashboard" icon="s-presentation-chart-bar" />
                <x-mary-menu-item title="Pedidos" icon="o-shopping-cart" />
                <x-mary-menu-item title="Produtos" icon="o-shopping-bag" :link="route('seller.products')" />
                <x-mary-menu-item title="Carteira" icon="o-wallet" />
                <x-mary-menu-item title="Avaliações" icon="o-hand-thumb-up" />
                <x-mary-menu-item title="Mensagens" icon="o-chat-bubble-bottom-center-text" />
                <x-mary-menu-sub title="Configurações" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Perfil" icon="o-user" :link="route('profile.edit')" />
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>
