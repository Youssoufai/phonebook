<x-layout>
    <h1>Dashboard</h1>
    <h2>Welcome {{ auth()->user()->username }} </h2>
    @foreach ($contacts as $contact)
        <div class="m-4 flex gap-3">
            <p> {{ $contact->name }} </p>
            <p> {{ $contact->phone }} </p>
            <p> {{ $contact->email }} </p>
            <a href="{{ route('contacts.edit', $contact) }}">Update</a>
        </div>
    @endforeach
    {{--     <table>
        <tr>
            <thead>ID</thead>
        </tr>
        <tr>
            <thead>Name</thead>
        </tr>
        <tr>
            <thead>Phone</thead>
        </tr>
    </table> --}}
    <div>
        {{ $contacts->links() }}
    </div>
</x-layout>
