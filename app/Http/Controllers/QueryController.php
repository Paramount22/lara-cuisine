<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|min:3',
        ]);

        //dd($request->search);

        // Gets the query string from our form submission
        $query = $request->search;
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles.
        $recipes = DB::table('recipes')->where('title', 'LIKE', '%' . $query . '%')->orWhere('ingredients', 'LIKE', '%' . $query . '%')->get();

        //dd($recipes);

        // returns a view and passes the view the list of articles and the original query.
        return view('page.search', compact('recipes', 'query') );

    }

}
