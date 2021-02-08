<p>

    <label for=""> Názov receptu</label>

    {!! Form::text('title', null,  [
       'class' => 'form-control col-12',
       'required' => true,
       'placeholder' => 'Názov receptu'

    ]) !!}
</p>

<p>

    <label for=""> Doba trvania</label>

    {!! Form::text('duration', null,  [
       'class' => 'form-control col-12',
       'required' => true,
       'placeholder' => 'Počet minút'

    ]) !!}
</p>

<p>

    <label for=""> Ingrediencie</label>

    {!! Form::textarea('ingredients', null, [
       'class' => 'form-control col-12',
       'placeholder' => 'Vaše ingrediencie, oddelujte &#269;iarkou',
       'required' => true,
       'rows' => 3
    ]) !!}

</p>

<p>
    <label for="">Postup</label>

    {!! Form::textarea('procedure', null, [
       'class' => 'form-control col-12',
       'placeholder' => 'Napíšte postup...',
       'required' => true,
       'rows' => 6
    ]) !!}

</p>

<p>
    <label for="">Vyberte kategóriu</label> <br>
    @include('partials.select', ['submit' => false])
</p>

{!! Form::file('cover', ['class' => 'form-control inputfile',
    'id' => 'file-1',

    ]) !!}

<label for="file-1">
        <span class="btn btn-dark">
            <i class="fa fa-upload"></i>
            Nahrajte obrázok receptu
        </span>
</label>
    <p class="info">( * Obrázok nie je povinný )</p>

<p>

    {!! Form::button('Uložiť recept', [
        'type' => 'submit',
        'class' => 'btn btn-auth'
    ]) !!}

    <span class="or">
        {!! link_to(URL::previous(), 'späť') !!}
    </span>


</p>
