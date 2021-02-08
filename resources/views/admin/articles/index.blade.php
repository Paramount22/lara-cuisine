@extends('layouts.app')

@section('title', 'Blog')

@section('content')

@include('partials.blog-section')


    <section class="articles">
        <div class="container">

            @forelse( $articles as $article)

            <div id="article-{{ $article->id }}" class="card col-lg-6 offset-lg-3 shadow p-2 rounded">
                 @if( isset($article->file_name))
                    <div class="index-cover"
                         style="background-image:url({{asset('images/' .$article->file_name )}})">

                    </div>
                @endif    
                <div class="card-body">
                    <h2 class="card-title text-center">{{ $article->title }}</h2>
                    <h6 class="card-subtitle text-muted text-center mb-4 mt-2">
                        <span class="author">{{ $article->user->name }}</span> /
                        <time datetime="{{ $article->datetime }}">
                            {{ $article->created_at }}
                        </time>
                    </h6>
                    <p class="card-text"> {{ $article->teaser }} </p>
                    <a href="{{ route('show.article', $article->slug) }}" class="card-link">Read more</a>

                </div>
            </div>

                @empty
                <p>No articles yet</p>
            @endforelse
        </div>




    </section>



@endsection
