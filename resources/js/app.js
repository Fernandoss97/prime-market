// Reinicializar componentes após navegação Livewire (SPA)
document.addEventListener("livewire:navigated", () => {
    // Mary UI usa componentes DaisyUI que precisam ser reinicializados
    // Isso garante que tooltips, dropdowns, modals, etc continuem funcionando

    // Forçar Alpine.js a processar novos elementos
    if (window.Alpine) {
        window.Alpine.initTree(document.body);
    }
});
