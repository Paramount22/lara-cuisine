<div id="discussion">


    {!! Form::open(['route' => 'comment.store', 'method' => 'post', 'id' => 'comments' ]) !!}

            <div class="form-group col-md-8">
                {!! Form::textarea('text', null, [
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => 'vložte komentár',
                    'rows' => 3,
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::hidden('recipe_id', $recipe->id) !!} {{-- Id receptu, ku ktoremu pridavam  koment --}}

                {!! Form::button('Odoslať', [
                    'type' => 'submit',
                    'class' => 'btn btn-primary btn-auth'

                ]) !!}

            </div>

            {!! Form::close() !!}



    @if($recipe->comments)

        <ol class="discussion col-md-8">
            

            @foreach($recipe->comments as $comment)
                @include('partials.comment')
            @endforeach
        </ol>



    @endif


</div>
