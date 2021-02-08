@extends('layouts.app')

@section('title', $article->title)

@section('content')

    @include('partials.blog-section')

    <section class="article">
        <div class="container">
            <div id="article-{{ $article->id }}" class="card col-lg-8 offset-lg-2 shadow p-2 rounded mb-4">
                @if( isset($article->file_name))
                   <div class="cover"
                         style="background-image:url({{asset('images/' .$article->file_name )}})">

                    </div>
                @endif
                <div class="card-body">
                    <h1 class="card-title text-center pb-2">{{ $article->title }}</h1>
                    <h6 class="card-subtitle text-muted text-center mb-4 mt-2">
                        <span class="author">{{ $article->user->name }}</span> /
                        <time datetime="{{ $article->datetime }}">
                            {{ $article->created_at }}
                        </time>
                    </h6>
                    <p class="card-text"> {!! $article->save_text  !!} </p>

                    <a href="{{ route('blog') }}" class="card-link"> <i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
                
                 @if( Auth::user()->hasRole('administrator') )
                        <span class="edit-links">
                            <a href=""><i class="fas fa-edit"></i></a>
                            <a href="{{ route('article.destroy', $article->id) }}" class="delete-recipe"> <i class="fas fa-trash-alt"></i></a>

                        </span>


                    @endif
            </div>
            
           


        </div>





    </section>


@endsection
