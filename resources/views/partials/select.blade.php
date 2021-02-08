

<?php $category_model = new \App\Categorie; ?>  {{--vytiahneme si categorie model --}}

<select name="categorie_id" onchange="{{ $submit ? 'this.form.submit()' : '' }}" required="">

    <option value="">Kategória</option>
    @foreach( $category_model->getCategories() as $category)


        <option {{--$selected === $director->id ? 'selected' : ''--}}
                value="{{ $category->id }}">{{ $category->name }}
        </option>
    @endforeach
</select>
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
