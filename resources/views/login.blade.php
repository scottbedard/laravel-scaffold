<x-layout>
    <div class="flex items-center justify-center min-h-screen">
        <form
            action="{{ route('authenticate') }}"
            class="gap-6 grid max-w-sm w-full"
            method="post">
            @csrf

            <h1 class="font-bold text-center text-2xl">Log in</h1>

            <label>
                <div>Email address</div>

                <input
                    autofocus
                    class="border border-gray-300 rounded h-10 px-4 w-full"
                    name="email"
                    placeholder="Email address"
                    type="email" />

                @if ($errors->has('email'))
                    <div class="text-red-500 text-xs">{{ $errors->first('email') }}</div>
                @endif
            </label>

            <label>
                <div>Password</div>

                <input
                    class="border border-gray-300 rounded h-10 px-4 w-full"
                    name="password"
                    placeholder="Password"
                    type="password" />

                @if ($errors->has('password'))
                    <div class="text-red-500 text-xs">{{ $errors->first('password') }}</div>
                @endif
            </label>

            <button
                class="bg-blue-600 hover:bg-blue-500 h-10 px-4 rounded text-center text-white"
                type="submit">
                Submit
            </button>

            <a
                class="flex gap-1 items-center justify-center hover:text-blue-500"
                href="{{ route('register') }}">
                <span>Create account</span>
                
                <x-icon name="arrow-right" size="16" />
            </a>
        </form>
    </div>
</x-layout>
