@extends('layouts.admin')

@section('title', 'Comments')

@section('admin-content')


    <section class="admin">

        @include('partials.admin-menu')

        <div class="container">
            <h1>Comments</h1>

            <h4>Records:
                @foreach($total as $count)
                    {{ $count->total }}
                @endforeach
            </h4>

            <h6>Count records per page: {{ $comments->count() }}</h6>
            <table class="table table-striped table-dark mt-4 ">
                <thead>
                <tr>
                    <th scope="col">Comment</th>
                    <th scope="col">Date</th>
                    <th scope="col">User</th>
                    <th scope="col">Recipe</th>

                </tr>
                </thead>
                @foreach($comments as $comment)
                    <tbody>
                    <tr>
                        <td id="item-{{$comment->id}}">{{ $comment->text }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>{{ $comment->user->name }}</td> <!-- vztah v modeli commet - user -->
                        <td>{{ $comment->recipe->title }}</td> <!-- vztah v modeli commet - recept -->
                        <td class="text-right"><a href="{{ route('comment.destroy', $comment->id) }}" class="delete-recipe">Delete</a></td>
                    </tr>

                    </tbody>
                @endforeach
            </table>
        </div>

    </section>





    <section class="pagination">
        <div class="container">
            {{ $comments->links() }}
        </div>

    </section>


@endsection
