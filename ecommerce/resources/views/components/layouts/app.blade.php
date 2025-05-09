<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'DCodeMania' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <class="bg-slate-200 dark:bg-slate-700">
        @livewire('partials.navbar')
        <main>
        {{ $slot }}
        </main>
        @livewire('partials.footer')
        @livewireScripts
        @push('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        window.HS && window.HS.init && window.HS.init();
    });

    document.addEventListener('livewire:load', () => {
        Livewire.hook('message.processed', () => {
            window.HS && window.HS.init && window.HS.init();
        });
    });
</script>
@endpush
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/preline@1.7.0/dist/preline.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @stack('scripts')
    </body>
</html>
