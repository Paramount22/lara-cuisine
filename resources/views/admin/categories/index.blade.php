@extends('layouts.admin')

@section('title', 'Categories')

@section('admin-content')

    <section class="admin">
        @include('partials.admin-menu')

        <div class="container">
            <h1>Categories</h1>
            <h4>Records: {{ $categories->count() }}</h4>

            <span class="add-category">
                <a href="{{ route('category.create') }}"><i class="fas fa-plus-square fa-3x"></i></a>
            </span>


            <table class="table table-striped table-dark mt-4 col-lg-5 ">
                <thead>
                <tr>
                    <th scope="col">Category</th>

                </tr>
                </thead>
                @foreach($categories as $category )
                    <tbody>
                    <tr>
                        <td id="item-{{$category->id}}">{{ $category->category_name }}</td>
                        <td class="text-right"><a href="{{ route('category.destroy', $category->id) }}" class="delete-recipe">Delete</a></td>
                    </tr>

                    </tbody>
                @endforeach
            </table>
        </div>


    </section>



@endsection
