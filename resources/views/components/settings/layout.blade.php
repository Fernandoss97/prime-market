<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <x-mary-menu>
            <x-mary-menu-item title="{{ __('Profile') }}" :link="route('profile.edit')" />
            <x-mary-menu-item title="{{ __('Password') }}" :link="route('user-password.edit')" />
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <x-mary-menu-item title="{{ __('Two-Factor Auth') }}" :link="route('two-factor.show')" />
            @endif
            <x-mary-menu-item title="{{ __('Appearance') }}" :link="route('appearance.edit')" />
        </x-mary-menu>
    </div>

    {{-- <x-mary-separator class="md:hidden" /> --}}

    <div class="flex-1 self-stretch max-md:pt-6">
        <h2 class="text-2xl font-bold">{{ $heading ?? '' }}</h2>
        <p class="mt-2 text-base-content/70">{{ $subheading ?? '' }}</p>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
