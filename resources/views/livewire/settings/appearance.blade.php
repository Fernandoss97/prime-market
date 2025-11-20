<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <div x-data="{
            theme: localStorage.getItem('theme') || 'system',
            setTheme(newTheme) {
                this.theme = newTheme;
                localStorage.setItem('theme', newTheme);
        
                if (newTheme === 'dark') {
                    document.documentElement.classList.add('dark');
                    document.documentElement.setAttribute('data-theme', 'dark');
                } else if (newTheme === 'light') {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.setAttribute('data-theme', 'light');
                } else {
                    // system
                    const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    if (isDark) {
                        document.documentElement.classList.add('dark');
                        document.documentElement.setAttribute('data-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        document.documentElement.setAttribute('data-theme', 'light');
                    }
                }
            }
        }" class="space-y-3">
            <div class="join join-vertical w-full lg:join-horizontal">
                <button type="button" @click="setTheme('light')" :class="theme === 'light' ? 'btn-active' : ''"
                    class="btn join-item flex-1">
                    <x-mary-icon name="o-sun" class="w-5 h-5" />
                    Claro
                </button>
                <button type="button" @click="setTheme('dark')" :class="theme === 'dark' ? 'btn-active' : ''"
                    class="btn join-item flex-1">
                    <x-mary-icon name="o-moon" class="w-5 h-5" />
                    Escuro
                </button>
                <button type="button" @click="setTheme('system')" :class="theme === 'system' ? 'btn-active' : ''"
                    class="btn join-item flex-1">
                    <x-mary-icon name="o-computer-desktop" class="w-5 h-5" />
                    Sistema
                </button>
            </div>
        </div>
    </x-settings.layout>
</section>
