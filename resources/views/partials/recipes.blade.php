@forelse($recipes as $recipe)



    <a href="{{ url('recipe/' . $recipe->id . '/' . $recipe->slug) }}">
    @if( isset($recipe->cover) )
        <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('coverimg/recipes/'.$recipe->id.'/'.$recipe->cover)}})">
            <h3>{{ $recipe->title }}</h3>

        </article>
     @else

            @if( $recipe->categorie_id ==  1 )
                <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/main.jpg')}})">
                    <h3>{{ $recipe->title }}</h3>

                </article>
             @endif

                @if( $recipe->categorie_id ==  2 )
                    <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/soup.jpg')}})">
                        <h3>{{ $recipe->title }}</h3>

                    </article>
                @endif

                @if( $recipe->categorie_id ==  3 )
                    <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/salat.jpg')}})">
                        <h3>{{ $recipe->title }}</h3>

                    </article>
                @endif

                @if( $recipe->categorie_id ==  4 )
                    <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/dezert.jpg')}})">
                        <h3>{{ $recipe->title }}</h3>

                    </article>
                @endif

                @if( $recipe->categorie_id ==  5 )
                    <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/pasta.jpg')}})">
                        <h3>{{ $recipe->title }}</h3>

                    </article>
                @endif

                @if( $recipe->categorie_id ==  6 )
                    <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/pizza.jpg')}})">
                        <h3>{{ $recipe->title }}</h3>

                    </article>
                @endif

                @if( $recipe->categorie_id ==  7 )
                    <article id="item-{{ $recipe->id }}" class="recipe-box" style="background-image:url({{asset('images/drinks.jpg')}})">
                        <h3>{{ $recipe->title }}</h3>

                    </article>
                @endif


     @endif

    </a>
@empty
    <p> Žiadne recepty :-( </p>
@endforelse
