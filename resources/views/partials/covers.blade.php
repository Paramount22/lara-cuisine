@if( isset( $recipe->cover )  )
            <div class="cover-recipe"
                 style="background-image:url({{asset('coverimg/recipes/'.$recipe->id.'/'.$recipe->cover)}})">
                <h2 class="recipe-title">{{ $recipe->title }}</h2>
            </div>
            @else
            
                @if( $recipe->categorie_id == 1 )
                        <div class="cover-recipe"
                             style="background-image:url({{asset('images/main.jpg')}})">
                            <h2 class="recipe-title">{{ $recipe->title }}</h2>
                        </div>
                    @endif
                    
                    @if( $recipe->categorie_id == 2 )
                        <div class="cover-recipe"
                             style="background-image:url({{asset('images/soup.jpg')}})">
                            <h2 class="recipe-title">{{ $recipe->title }}</h2>
                        </div>
                    @endif
                    
                    @if( $recipe->categorie_id == 3 )
                        <div class="cover-recipe"
                             style="background-image:url({{asset('images/salat.jpg')}})">
                            <h2 class="recipe-title">{{ $recipe->title }}</h2>
                        </div>
                    @endif
            
            
                @if( $recipe->categorie_id == 4 )
                    <div class="cover-recipe"
                         style="background-image:url({{asset('images/dezert.jpg')}})">
                        <h2 class="recipe-title">{{ $recipe->title }}</h2>
                    </div>
                @endif
    
               @if( $recipe->categorie_id == 5 )
                 <div class="cover-recipe"
                 style="background-image:url({{asset('images/pasta.jpg')}})">
            <h2 class="recipe-title">{{ $recipe->title }}</h2>
                  </div>
                 @endif
                 
                 @if( $recipe->categorie_id == 6 )
                        <div class="cover-recipe"
                             style="background-image:url({{asset('images/pizza.jpg')}})">
                            <h2 class="recipe-title">{{ $recipe->title }}</h2>
                        </div>
                    @endif
                    
                    @if( $recipe->categorie_id == 7 )
                        <div class="cover-recipe"
                             style="background-image:url({{asset('images/drinks.jpg')}})">
                            <h2 class="recipe-title">{{ $recipe->title }}</h2>
                        </div>
                    @endif
            @endif
