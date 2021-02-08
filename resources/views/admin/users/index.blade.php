@extends('layouts.admin')

@section('title', 'Users')

@section('admin-content')

    <section class="admin">
        @include('partials.admin-menu')
        <div class="container">

            <h1>Users</h1>

            <h4>Records: {{ $users->count() }}</h4>

                <table class="table table-striped table-dark mt-4">
                    <thead>
                    <tr>

                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">password</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td><a href="{{ route('edit.user', $user->id) }}">edit</a></td>
                        <td><a href="">delete</a></td>
                    </tr>

                    </tbody>
                    @endforeach
                </table>

        </div>
    </section>



@endsection
