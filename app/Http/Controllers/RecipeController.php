<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Recipe;
use App\Service\UploadService;
use Auth;
use Cache;
use Illuminate\Http\Request;
use \Validator;
use Carbon\Carbon;



class RecipeController extends Controller
{
    protected $upload;
    protected $recipe;

    /**
     * RecipeController constructor.
     */
    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
        $this->recipe = new Recipe;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
      
     /* $recipes = Cache::rememberForever('all-recipes', function () {

        return Recipe::orderBy('created_at', 'desc')->paginate(12);
    });

        $categories = Cache::rememberForever('all-categories', function () {

            return Categorie::orderBy('category_name', 'asc')->get();
        });*/
        
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(12);
        
        $categories = Categorie::orderBy('category_name', 'asc')->get();


            return view('recipes.index')
                ->with('recipes', $recipes)
                ->with('categories', $categories);

            }


    /**
     * Formular view create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('recipes.create')
            ->with('title', 'Nový recept');

    }

    /** Ulozenie receptu do db + validacia
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'duration'  => 'required|integer',
            'ingredients' => 'required',
            'procedure' => 'required',
            'categorie_id' => 'required|integer',
            'cover' => 'mimes:jpeg,png,jpg',
        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }


        $recipe = Auth::user()->recipes()->create( $request->all() );/*([

            'title' => request('title'),
            'duration' => request('duration'),
            'ingredients' => request('ingredients'),
            'procedure' => request('procedure'),
            'categorie_id' => request('categorie_id'),
            //'slug' => slugify($request->get('title') ),
            'user_id' => auth()->id()
        ]);*/

        // upload cover
        $this->uploadCover( $recipe, $request->file( 'cover' ) );

        //$recipe->save();
        flash()->success('Recept pridaný.' . '<span class="close ull-right">X</span>');

        return redirect('recipe/' . $recipe->id . '/' . $recipe->slug );

    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id, $slug)
    {
        $recipe = Recipe::whereSlug($slug)->firstOrFail();

        $this->recipe->format_ingredients($recipe);

                //$recipes = Recipe::orderBy('created_at', 'desc')->paginate(12);

        return view('recipes.show')
            ->with('recipe',$recipe );



    }

    /**
     * Edit formular
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, $slug)
    {
        $recipe = Recipe::whereSlug($slug)->firstOrFail();

        $this->authorize('edit-recipe', $recipe);

        return view('recipes.edit')
            ->with('recipe', $recipe);

    }


    /**
     * @param Request $request
     * @param $id
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id, $slug)
    {
        // validacia
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'duration'  => 'required|integer',
            'ingredients' => 'required',
            'procedure' => 'required',
            'categorie_id' => 'required|integer',
            'cover' => 'mimes:jpeg,png,jpg',

        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        // najdeme konkretny recept
        $recipe = Recipe::whereSlug($slug)->firstOrFail();

        // iba ak som vlastnik daneho receptu budem ho moct editovat
        $this->authorize('edit-recipe', $recipe);

        // update
        $recipe->update( $request->all() );

        // upload cover
        $this->uploadCover( $recipe, $request->file( 'cover' ) );

        flash()->success('Recept upravený.' . '<span class="close pull-right">X</span>');

        return redirect('recipe/' . $recipe->id . '/' . $recipe->slug );
    }


    public function delete($id, $slug)
    {
        $recipe = Recipe::whereSlug($slug)->firstOrFail();


        if (Auth::user()->hasRole('administrator')) {

        return view('recipes.delete')
            ->with( compact($recipe) );

    }  else {
            return redirect('/');
        }


    }

    /**
     * @param $recipe
     * @param $cover
     */
    private function uploadCover($recipe, $cover ) {

        if ( $cover ) {
            $this->upload->saveCover( $recipe, $cover);
        }
    }


}
