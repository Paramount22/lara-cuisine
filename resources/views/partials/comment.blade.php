    <li id="comment-{{ $comment->id }}">
        <header>
            <a href="{{ url( 'user/' . $comment->user->id . '/' . strtolower( urlencode($comment->user->name) ) )  }}">
                <strong>{{  $comment->user->name }}</strong>
            </a>
            <time datetime="{{ $comment->created_at->toW3cString() }}" title="{{ $comment->created_at->toW3cString() }}">
             <small>{{ $comment->created_at->diffForHumans() }}</small>
            </time>
           @can('delete-comment', $comment) {{-- editacne linky iba pre autora prispevku --}}
                <a href="{{ url('comment/' . $comment->id . '/delete') }}" class="delete-comment" title="Vymazať" ><i class="fa fa-times"></i></a>

            @endcan


        </header>

        <p>
            {{ $comment->text }}
        </p>

    </li>

