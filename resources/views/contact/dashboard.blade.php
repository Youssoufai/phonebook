<x-layout>
    <h1>Dashboard</h1>
    <h2>Welcome {{ auth()->user()->username }} </h2>
    @foreach ($contacts as $contact)
        <p> {{ $contact->name }} </p>
        <p> {{ $contact->phone }} </p>
        <p> {{ $contact->email }} </p>
    @endforeach
</x-layout>
