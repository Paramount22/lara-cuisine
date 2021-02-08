<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Mail\Transport\ArrayTransport;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    private $imageBasePath = 'public/images';

    /**
     * All articles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('admin.articles.index')->with(compact('articles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.articles.create')->with('title', 'New article');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'text' => 'required'
        ]);

        $article = Auth::user()->articles()->create($request->all());

        $article->file_name = $this->addRemoveImage($request, $article->file_name);

        $article->save();

        flash()->success('Article added');

        return redirect()->route('blog');

    }

    public function show($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();

        return view('admin.articles.show')->with(compact('article'));
    }
    
    
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $this->removeImageFromDisk($article->file_name);
        $article->delete();

        flash()->success('Deleted');

        return redirect()->route('blog');
    }





    /**
     * @param Request $request
     * @param $previousFileName
     * @return |null
     */
    private function addRemoveImage(Request $request, $previousFileName )
    {
        $image = $request->image;

        if($request['remove_image'] && $image == null) {
            $this->removeImageFromDisk($previousFileName);
            return null;
        }

        if($image == null)
            return $previousFileName;

        return $this->uploadImageToDisk($image, $previousFileName);

    }

    /**
     * @param $image
     * @param $previousFileName
     * @return string
     */
    private function uploadImageToDisk($image, $previousFileName)
    {
        $file_name = uniqid() . '-' . $image->getClientOriginalName();
        $this->removeImageFromDisk($previousFileName);
        $image->storeAs($this->imageBasePath, $file_name);

        return $file_name;

    }

    /**
     * @param $file_name
     */
    private function removeImageFromDisk($file_name)
    {
        $fullPath = $this->imageBasePath . DIRECTORY_SEPARATOR . $file_name;
        Storage::delete($fullPath);

    }
}

