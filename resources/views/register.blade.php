<x-layout>
    <div class="flex items-center justify-center min-h-screen">
        <form
            action="{{ route('create-account') }}"
            class="gap-6 grid max-w-sm w-full"
            method="post">
            @csrf

            <h1 class="font-bold text-center text-2xl">Create an account</h1>

            <label>
                <div>Name</div>

                <input
                    autofocus
                    class="border border-gray-300 rounded h-10 px-4 w-full"
                    name="name"
                    placeholder="Name"
                    value="{{ old('name') }}" />

                @if ($errors->has('name'))
                    <div class="text-red-500 text-xs">{{ $errors->first('name') }}</div>
                @endif
            </label>

            <label>
                <div>Email address</div>

                <input
                    autofocus
                    class="border border-gray-300 rounded h-10 px-4 w-full"
                    name="email"
                    placeholder="Email address"
                    type="email"
                    value="{{ old('email') }}" />

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

            <label>
                <div>Confirm password</div>

                <input
                    class="border border-gray-300 rounded h-10 px-4 w-full"
                    name="password_confirmation"
                    placeholder="Confirm password"
                    type="password" />

                @if ($errors->has('password_confirmation'))
                    <div class="text-red-500 text-xs">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </label>

            <button
                class="bg-blue-600 hover:bg-blue-500 h-10 px-4 rounded text-center text-white"
                type="submit">
                Create account
            </button>

            <a
                class="flex gap-1 items-center justify-center hover:text-blue-500"
                href="{{ route('login') }}">
                <x-icon name="arrow-left" size="16" />
                
                <span>Log in</span>
            </a>
        </form>
    </div>
</x-layout>
