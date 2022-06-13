<x-layout>
    @include('components.header')
    @include('components.sidebar')

    <section class="px-6 py-8">


        <h1 class="font-bold text-xl text-center">Register</h1>

        @foreach($users as $user)
        <form method="post" action="/users/{{ $user->id }}/update" class="mt-10">
            @csrf

            <div class="inputs-container mb-6">

                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="name">Name</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="text" name="name" value="{{ $user->name }}" id="name" required>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="email">Email</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="email" name="email" value="{{ $user->email }}" id="email" required>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="phone">Phone no</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="number" name="phone" value="{{ $user->phone }}" id="phone" required>

                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="city">City</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="text" name="city" id="city" value="{{ $user->city }}" required>

            </div>

            <div class="mb-6">
                <button type="submit" class=" create-button bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>

        @endforeach
        @foreach($errors->all() as $error)
        <li class="text-red-500 text-xs mt-1"> {{ $error }}</li>
        @endforeach

    </section>

</x-layout>