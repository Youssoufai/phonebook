<x-layout>
    <h1>Update Contact</h1>
    <a href="{{ route('dashboard') }}" class=" underline text-blue-900">Go back to your dashboard</a>
    <form action="{{ route('contacts.update', $contact) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-x-8 m-4">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $contact->name }}" />
            @error('name')
                <p> {{ $message }} </p>
            @enderror
        </div>
        @if ($contact->image)
            <div class="space-x-8 m-4 w-1/4">
                <label>Current Image</label>
                <img src="{{ asset('storage/' . $contact->image) }}" alt="">
            </div>
        @endif
        <div class="space-x-8 m-4">
            <label for="image">Contact Image</label>
            <input name="image" type="file" />
            @error('image')
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
