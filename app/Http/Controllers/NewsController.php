<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use App\Http\Requests\NewsFormRequest;
use http\Env\Response;
use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * @var News $news
     */
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Category $category
     * @return \Illuminate\View\View
     */
    public function index(Category $category)
    {
        $news = $this->getNews($category);

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsFormRequest $request)
    {

        $news = $this->news->create($request->all());

        return redirect($news->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @param  \App\News $news
     * @return \Illuminate\View\View
     */
    public function show(Category $category, News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
       return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsFormRequest $request
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsFormRequest $request, News $news)
    {
        $news->update( $request->all() );

        return redirect($news->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        $news->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }

        return redirect()->back();
    }

    /**
     * Fetch all relevant news.
     *
     * @param Category $category
     * @return mixed
     */
    protected function getNews(Category $category)
    {
        $news = $this->news->latest();

        if ($category->exists) {
            $news->where('category_id', $category->id);
        }

        return $news->paginate(5);
    }
}
