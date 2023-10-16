<x-app-layout>
    @auth
        <h3>Bienvenido</h3>
    @else
        <H3>Inicio</H3>
    @endauth
</x-app-layout>

