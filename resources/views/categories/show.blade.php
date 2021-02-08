@extends('layouts.app')
@section('title', isset($category->category_name) ? $category->category_name : 'Recepty')

@section('content')

    <div class="category-cover" style="background-image: url({{ asset('images/category_cover.jpg') }})">
        <div class="container">
            <h1 class="category-title">{{ $category->category_name }}</h1>
        </div>
    </div>


    <section class="recipes-box animated fadeIn">
        <div class="container">

        @if( count($recipes) )

                @include('partials.recipes')
        @endif
        </div>
    </section>
    
    <section class="pagination">
        <div class="container">
            {{ $recipes->links() }}
        </div>

    </section>



@endsection
