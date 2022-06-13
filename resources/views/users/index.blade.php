<x-layout>
    @include('components.header')
    @include('components.sidebar')

    <section>
        <div>
            <a class="button create-button" href="/users/create">Create New User</a>
        </div>

        <div class="table-container m-auto">

            <?php
            $number = 1;
            ?>

            <table class="uppercase table">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>city</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$number++}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->city }}</td>
                        <td><a class="button" href="/users/{{ $user->id }}/delete">Delete</a></td>
                        <td><a class="button" href="/users/{{ $user->id }}/edit">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </section>

</x-layout>