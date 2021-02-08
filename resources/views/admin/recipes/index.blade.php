@extends('layouts.admin')

@section('title', 'Recipes')

@section('admin-content')

    <section class="admin">
      @include('partials.admin-menu')

       <div class="container">

           <h1>Recipes</h1>

           <h4>Records:
               @foreach($total as $count)
                   {{ $count->total }}
               @endforeach
           </h4>

           <h6>Count records per page: {{ $recipes->count() }}</h6>

           <table class="table table-striped table-dark mt-4 col-lg-5">
               <thead>
               <tr>

                   <th scope="col">Recipe</th>

               </tr>
               </thead>
               @foreach($recipes as $recipe)
                   <tbody>
                   <tr>
                       <td>{{ $recipe->title }}</td>

                       <td class="text-right"><a href="{{ route('recipe.destroy', $recipe->id) }}" class="delete-recipe">delete</a></td>
                   </tr>

                   </tbody>
               @endforeach
           </table>



        </div>
    </section>

    <section class="pagination">
        <div class="container">
            {{ $recipes->links() }}
        </div>

    </section>


@endsection
