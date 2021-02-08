<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Categorie;
use App\User;
use App\Recipe;
use App\Comment;



class AdminController extends Controller
{
    protected $recipe;
    protected $comment;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->recipe = new Recipe;
        $this->comment = new Comment;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getAllUsers()
    {
        $users = User::all();

        return view('admin.users.index')->with( compact('users'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function editUser( $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit')->with(compact('user'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);


       $user->name = trim($request->get('name'));

        // update user email
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();

        flash()->success('Updated.' . '<span class="close pull-right">X</span>');

        return redirect()->route('users');


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getAllRecipes()
    {
        $recipes = Recipe::latest()->paginate(10);

        $total = $this->recipe->totalRecipe();

        return view('admin.recipes.index')->with( compact('recipes'))->with(compact('total'));

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function destroyRecipe($id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->delete();

        flash()->success('Deleted');

        return back();
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getAllComments()
    {
        $comments = Comment::latest()->paginate(10);

        $total = $this->comment->totalComments();

        return view('admin.comments.index')->with(compact('comments', 'total'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        flash()->success('Deleted');

        return back();
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getAllCategories()
    {
        $categories = Categorie::orderBy('category_name', 'asc')->get();

        return view('admin.categories.index')->with(compact('categories'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createCategory()
    {
        return view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:200',

        ]);

        $category = Categorie::create([
            'category_name' => request('category_name'),
            'slug' => slugify($request->get('category_name') ),
        ]);

        flash()->success('Added');

        return redirect()->route('categories');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyCategory($id)
    {
        $category = Categorie::findOrfail($id);

        $category->delete();

        flash()->success('Category deleted');

        return redirect()->route('categories');
    }
    
    
    
    
}
