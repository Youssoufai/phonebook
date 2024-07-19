<x-layout>
    @auth
        <div class="text-center h-screen flex justify-center">
            <h1 class="text-3xl text-center">Phonebook</h1>
        </div>
    @endauth
    @guest
        <div class="text-center h-screen flex justify-center">
            <h1 class="text-3xl text-center">Ban!</h1>
        </div>
    @endguest
</x-layout>
