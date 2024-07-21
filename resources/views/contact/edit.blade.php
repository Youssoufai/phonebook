<x-layout>
    <h1>Update Contact</h1>
    <a href="{{ route('dashboard') }}" class=" underline text-blue-900">Go back to your dashboard</a>
    <form action="{{ route('contacts.update', $contact) }}" method="post">
        @csrf
        @method('PUT')
        <div class="space-x-8 m-4">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $contact->name }}" />
            @error('name')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8 m-4">
            <label for="phone">Phone Number</label>
            <input name="phone" type="number" value="{{ $contact->phone }}" />
            @error('phone')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8 m-4">
            <label for="email">Email Address</label>
            <input name="email" type="email" value="{{ $contact->email }}" />
            @error('email')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <button class="m-3 bg-slate-700 text-white px-6 rounded-sm py-4">Update</button>
    </form>
</x-layout>
