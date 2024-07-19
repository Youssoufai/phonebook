<x-layout class="bg-black w-64 h-128 rounded-3xl shadow-lg relative">
    <form action="{{ route('login') }}" method="POST" class="space-y-8 flex justify-center flex-col items-center">
        @csrf
        <div class="space-x-8">
            <label for="email">E-mail Address</label>
            <input name="email" type="text" name="email" />
        </div>
        <div class="space-x-8">
            <label for="password">Password</label>
            <input name="password" type="password" />
        </div>
        <div>
            <input name="remember_me" type="checkbox" name="remember_me">
            <label for="remember me">Remember Me</label>
        </div>
        @error('failed')
            <p> {{ $message }} </p>
        @enderror
        <div>
            <button type="submit" class="px-8 py-2 bg-green-600 text-white rounded-sm">Login</button>
        </div>
    </form>
</x-layout>
