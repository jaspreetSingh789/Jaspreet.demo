<x-layout>
    @include('components.header')
    @include('components.sidebar')

    <section class="display-inline-block border px-6 py-8">


        <h1 class="font-bold text-xl text-center">Register</h1>

        <form method="post" action="/users/store" class="mt-10">
            @csrf

            <div class="inputs-container mb-6">

                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="name">Name</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="text" name="name" value="{{ old('name')}}" id="name" required>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="email">Email</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="email" name="email" value="{{ old('email')}}" id="email" required>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="phone">Phone no</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="number" name="phone" value="{{ old('phone')}}" id="phone" required>


                <label class="mb-2 text-xs uppercase block font-bold text-gray-700" for="city">City</label>
                <input class="border border-grey-400 p-2 w-full mb-2" type="text" name="city" id="city" value="{{ old('city')}}" required>

            </div>

            <div class="mb-6">
                <button type="submit" class=" create-button bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500">
                    Submit
                </button>
            </div>

            @foreach($errors->all() as $error)
            <li class="text-red-500 text-xs mt-1"> {{ $error }}</li>
            @endforeach
        </form>


    </section>

</x-layout>