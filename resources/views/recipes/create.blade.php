@extends('layouts.app')

@section('title', 'Nový recept')

@section('content')

    <div class="create-recipe-cover" style="background-image: url({{ asset('images/create-cover.jpg') }})">
        <div class="container">
            <h2 class="create-title">Nový recept</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <section class="box animated zoomIn">

                    {!! Form::open([ 'url'=> 'recipe/create', 'method' => 'post', 'files' => true, 'id' => 'add-form']) !!}

                        @include('partials.form')

                    {!! Form::close() !!}


                </section>
            </div>

            <div class="col-sm-12 col-md-3 animated zoomIn">
                <img src="{{ asset('images/image_1.jpg') }}" class="img-cover" width="500" alt="">
            </div>


        </div>

    </div>




@endsection


