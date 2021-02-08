@extends('layouts.admin')

@section('title', 'Admin portal')

@section('admin-content')

    <section class="admin">
        <h1 class="admin-title">Admin portal</h1>
        <div class="container">

            <ul class="main-admin-menu offset-lg-1 mt-3">
                <li><a href="{{ route('users') }}"><i class="fas fa-users"></i>Users</a></li>
                <li><a href="{{ route('recipes') }}"><i class="fas fa-drumstick-bite"></i>Recipes</a></li>
                <li><a href="{{ route('comments') }}"><i class="fas fa-comments"></i>Comments</a></li>
                <li><a href="{{ route('categories') }}"><i class="fas fa-book-open"></i>Categories</a></li>
            </ul>

        </div>



    </section>



@endsection