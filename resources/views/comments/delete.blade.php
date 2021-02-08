@extends('layouts.app')

@section('title', 'Odstrániť komentár')

@section('content')

    <section class="recipe">
        <div class="container">

        {!! Form::model($comment, ['route' => ['comment.destroy', $comment->id ] , 'method' => 'delete', 'class' => 'post', 'id' => 'delete-form']) !!}

        <header class="post-header">
            <h2 class="box-heading">
                Odstrániť komentár
            </h2>
        </header>


        <p class="comment-remove">{{ $comment->text }}

        </p>
            <small> {{ $comment->created_at }}</small>


        <div class="form-group">
            {!! Form::button('Odstrániť', ['type' => 'submit', 'class' => 'btn btn-auth']) !!}
            <span class="or">
               {!! link_back('cancel') !!}
            </span>

        </div>



        {!! Form::close() !!}
        </div>
    </section>


@endsection
