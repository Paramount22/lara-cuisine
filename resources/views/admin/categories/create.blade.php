@extends('layouts.admin')

@section('title', 'Category add')

@section('admin-content')

    <section class="admin">
        @include('partials.admin-menu')

        <div class="container">
            <h1>Add category</h1>

            <form action="{{ route('store.category') }}" method="POST" class="form-category mt-4 col-lg-5">
                @csrf

                <div class="form-group ">
                    <label for="">Category</label>

                    <input type="text" name="category_name" autofocus required="" class="form-control" id="" placeholder="category">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-secondary">Save</button>
                </div>
            </form>


        </div>


    </section>


@endsection
