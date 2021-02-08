@extends('layouts.app')
@section('title', isset($recipe->title) ? $recipe->title : 'Recepty')

@section('content')


    <section class="recipe animated fadeIn">
        <div class="container">
            
            @include('partials.covers')


            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="recept-category">
                        <a href="{{ url('category/' . $recipe->categorie->id . '/' . $recipe->categorie->slug) }}"      class="category-link">
                            {{ $recipe->categorie->category_name }}
                        </a>
                     </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="duration">
                       <i class="far fa-clock"></i> {{ $recipe->duration }} minút
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="edit">
                        @can('edit-recipe', $recipe)
                            <a href="{{ url('recipe/' .$recipe->id . '/' . $recipe->slug . '/edit-recipe') }}" class="edit-link">
                                <i class="fas fa-edit"></i>
                                Upraviť
                            </a>
                        @endcan

                                {{--<a href="{{ url('recipe/' .$recipe->id . '/' . $recipe->slug . '/delete-recipe') }}" class="delete-link">--}}
                                    {{--<i class="fas fa-trash-alt"></i>--}}

                                {{--</a>--}}



                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <ul class="list-group">
                        <h3>Ingrediencie</h3>
                        @foreach( $recipe->ingredients as $ingredients)
                            <li class="list-group-item"> {{  $ingredients  }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-8">
                    <h3>Postup</h3>

                    <div class="procedure">
                        {!! $recipe->rich_text  !!}

                        <p class="written-by small">
                            <a href="{{ url('user/' . $recipe->user->id . '/' .
                           strtolower( urlencode( iconv("UTF-8", "ASCII//TRANSLIT", $recipe->user->name) ) )   ) }}" class="link-written-by">
                                {{ $recipe->user->name }}
                            </a>
                            <time datetime="{{ $recipe->datetime }}">
                                {{ $recipe->created_at }}
                            </time>
                        </p>

                    </div>
                </div>
            </div>


            @if ( $recipe->categorie->id === 7 )
                <p class="taste">Na zdravie</p>
                    @else  <p class="taste">Dobrú chuť</p>
            @endif


        </div>
    </section>

    <section>
        <div class="container">

            <div class="comments">
               <p class="show-comments">Komentáre
                   {{ ( $recipe->comments->count() ) }} {{-- laravel kolekcia count() --}}
               </p>
            </div>
            @include('partials.discussion')
        </div>
    </section>





@endsection


	