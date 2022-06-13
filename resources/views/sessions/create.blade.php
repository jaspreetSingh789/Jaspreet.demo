<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 border border-gray-200 p-6 bg-gray-100 rounded-xl">
            <h1 class="font-bold text-xl text-center">Log In</h1>
            <form method="post" action="/login" class="mt-10">
                @csrf
                <div class="mb-6">

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="email">Email</label>
                    <input class="border border-grey-400 p-2 w-full mb-2" type="email" name="email" value="{{ old('email')}}" id="email" required>

                    <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="password">Password</label>
                    <input class="border border-grey-400 p-2 w-full mb-2" type="password" name="password" id="password" required>

                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500">
                        Log In
                    </button>
                </div>

                @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </form>
        </main>

    </section>
</x-layout>