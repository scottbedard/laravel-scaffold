<x-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="gap-6 grid max-w-sm w-full">
            <div class="text-center">Welcome back, {{ auth()->user()->name }}!</div>

            <a
                class="bg-blue-600 hover:bg-blue-500 flex h-10 items-center justify-center px-4 rounded text-white"
                href="{{ route('logout') }}">
                Log out
            </a>
        </div>
    </div>
</x-layout>
