@extends('layouts.app')

@section('content')

    <div class="cover" style="background-image: url({{ asset('images/cover.jpg') }})">
        <div class="container">
            <h1 class="cover-heading animated fadeInUp">Chutné online recepty</h1>
            <span class="add animated zoomInDown">
                <a href="{{ url('recipe/create') }}" class="btn btn-add-recipe">
                    <i class="fas fa-plus-circle"></i> Pridať recept
                </a>
            </span>


        </div>
    </div>


    <section class="category-menu">
    <nav>
        <div class="container">
            <H1>Kategórie receptov</H1>

            @if( isset($categories))
                <ul class="menu navigation">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ url('category/' . $category->id . '/'. $category->slug) }}">{{ $category->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </nav>
    </section>

    <section class="recipes-box">
        <div class="container">
            <H2 class="recipes-title">Všetky recepty</H2>

        @include('partials.recipes')

        </div>
    </section>

    <section class="pagination">
        <div class="container">
            {{ $recipes->links() }}
        </div>

    </section>



@endsection

@section('footer')

    @include('partials.footer')

@endsection
