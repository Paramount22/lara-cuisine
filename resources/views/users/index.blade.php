@extends('layouts.app')

@section('title', $title)

@section('content')



    <div class="user-cover" style="background-image: url({{ asset('images/user_cover.jpg') }})">
        <div class="container">
            <h1 class="user-title">{{ $title }}</h1>
        </div>
    </div>

    <section class="recipes-box animated fadeIn">
        <div class="container">

            @include('partials.recipes')

        </div>
    </section>

    <section class="pagination">
        <div class="container">
            {{ $recipes->links() }}
        </div>

    </section>




@endsection
