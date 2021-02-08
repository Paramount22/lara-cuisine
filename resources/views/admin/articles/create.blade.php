@extends('layouts.app')

@section('title', 'New article')

@section('content')
    @include('partials.blog-section')

    <div class="container">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center pb-2">New article</h5>

                    <form method="POST" action="{{ route('store.article') }}" class="col-lg-8 offset-lg-2 " enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"  placeholder="Title" >

                        </div>

                        <div class="form-group">
                            <label for="textarea">Your text</label>
                            <textarea name="text" id="textarea" placeholder="your article" class="form-control" rows="5"></textarea>

                        </div>

                        <label for="image">Image</label>
                        <input type="file" class="form-control mb-4" id="image" name="image">

                        <button type="submit" class="btn btn-secondary btn-block">Save</button>
                    </form>
                </div>
            </div>


        </section>


    </div>




@endsection
