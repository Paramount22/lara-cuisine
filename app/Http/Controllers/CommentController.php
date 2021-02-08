<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Comment;


class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'recipe_id' => 'required|integer|exists:recipes,id'
        ]);

        $recipe =  Recipe::findOrFail($request->get('recipe_id'));

       // priamo do userovych komenarov vytvorime dalsi koment, vdaka vztahom v user modely (hasMany)
        auth()->user()->comments()->create(
           $request->all()
       );

//        $recipe =  Recipe::findOrFail($request->get('recipe_id'));
//
//        Comment::create([
//            'recipe_id' => $recipe->id,
//            'user_id' => \Auth()->id(),
//            'text' => $request->get('text')
//        ]);

//        if( $request->ajax() )
//        {
//            return response()->json([
//                'id' => $comment->id,
//                'message' => 'success'
//
//            ], 200);
//        }

        flash()->success('Komentár pridaný.' . '<span class="close ull-right">X</span>');

//        return redirect()->route('recipe.show', [$recipe->id, $recipe->slug] );
        return redirect( 'recipe/' . $recipe->id . '/' . $recipe->slug . '#comments' );

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
//        $comment = Comment::findOrFail($id);
//
//        return view('partials.comment')->with('comment', $comment);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request,$id)
    {
        $comment = Comment::findOrfail($id);

        //$recipe =  Recipe::findOrFail($request->get('recipe_id'));

        $this->authorize('delete-comment', $comment);

        $comment->delete();

        flash()->success('Komentár odstránený.' . '<span class="close ull-right">X</span>');

        return redirect()->back();

    }

}
