<x-layout class="bg-black w-64 h-128 rounded-3xl shadow-lg relative">
    <form action="" class="space-y-8 flex justify-center flex-col items-center">
        <div class="space-x-8">
            <label for="email">E-mail Address</label>
            <input type="text" name="email" />
        </div>
        <div class="space-x-8">
            <label for="password">Password</label>
            <input type="password" />
        </div>
        <div>
            <input type="checkbox" name="remember_me">
            <label for="remember me">Remember Me</label>
        </div>
        <div>
            <button type="submit" class="px-8 py-2 bg-green-600 text-white rounded-sm">Login</button>
        </div>
    </form>
</x-layout>
