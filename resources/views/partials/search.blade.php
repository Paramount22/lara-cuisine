

{{--{!! Form::open(array('url' => 'queries', 'method' => 'get', 'class'=>'form navbar-form  searchform')) !!}--}}
{{--{!! Form::text('search', null,--}}
                       {{--array('required' => true,--}}
                            {{--'class'=>'form-control',--}}
                            {{--'placeholder'=>'Search field')) !!}--}}
{{--{!! Form::submit('Search',--}}
                           {{--array('class'=>'btn btn-default')) !!}--}}
{{--{!! Form::close() !!}--}}

<form class="form-inline md-form form-sm" method="POST" action="{{ route('search') }}">
    @csrf
    @method('GET')

    <input class="search-recipes" type="text" name="search" placeholder="Recepty, ingrediencie" aria-label="Search" required="">

    <button type="submit" title="Hľadaj"><i class="fas fa-search" aria-hidden="true"></i></button>

</form>


