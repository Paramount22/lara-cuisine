@extends('layouts.app')

@section('content')
    <section class="search-results">
        <header>
            <div class="container">
                <h2>Vyhľadávanie</h2>
            </div>
        </header>

        <div class="container">

            <p class="search-result mt-0 mb-4">Hľadaný výraz: <span class="query"> {{ $query }} </span></p>

            @if( count( $recipes ) === 0 )
                <p>Žiadne nájdené záznamy </p>
                <i class="far fa-sad-tear"></i>

            @else
                <section class="recipes-box">
                    <div class="container">



                        @include('partials.recipes')

                    </div>
                </section>

            @endif
        </div>

    </section>


@endsection
