<x-layout>
    <h1 class="text-3xl text-blue-300 font-bold">Create a new contact</h1>
    @if (session('success'))
        <div class="mb-2">
            <x-flashMsg msg="{{ session('success') }}" />
        </div>
    @endif
    <form action="{{ route('contacts.store') }}" method="post">
        @csrf
        <div class="space-x-8 m-4">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" />
            @error('name')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8 m-4">
            <label for="phone">Phone Number</label>
            <input name="phone" type="number" value="{{ old('phone') }}" />
            @error('phone')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8 m-4">
            <label for="email">Email Address</label>
            <input name="email" type="email" value="{{ old('email') }}" />
            @error('email')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <button class="m-3 bg-slate-700 text-white px-6 rounded-sm py-4">Create</button>
    </form>
</x-layout>
