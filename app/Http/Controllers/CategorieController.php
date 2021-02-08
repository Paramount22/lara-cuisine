<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
{



 /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category = Categorie::findorFail($id);
        $recipe_order_by = Categorie::findOrFail($id)->recipesOrderBy();

        return view('categories.show', compact('category'))
            ->with('recipes', $recipe_order_by); // recepty budu zoradene podla najposlednejsie

        // $category->recipes metoda v modely Categorie recipes() - vztah

    }

}

