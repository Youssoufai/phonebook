<x-layout class="bg-black w-64 h-128 rounded-3xl shadow-lg relative">
    <form action="{{ route('register') }}" method="POST" class="space-y-8 flex justify-center flex-col items-center">
        @csrf
        <div class="space-x-8">
            <label for="username">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" />
            @error('username')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8">
            <label for="email">E-mail Address</label>
            <input type="text" name="email" value="{{ old('email') }}" />
            @error('email')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8">
            <label for="password">Password</label>
            <input name="password" type="password" />
            @error('password')
                <p> {{ $message }} </p>
            @enderror
        </div>
        <div class="space-x-8">
            <label for="password_confirmation">Confirm Password</label>
            <input name="password_confirmation" type="password" />
            @error('password_confirmation')
                <p> {{ $message }} </p>
            @enderror
        </div>
        </div>
        <div>
            <input type="checkbox" name="subscribe" id="subscribe">
            <label for="subscribe">Subscribe to our newsletter</label>
        </div>
        <div>
            <button type="submit" class="px-8 py-2 bg-green-600 text-white rounded-sm">Register</button>
        </div>
    </form>
</x-layout>
