<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return view('backoffice.pages.article.index',[
            'articles' => Article::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        return view('backoffice.pages.article.form',[
            'article' => $article
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $photo = $data['photo'];
        /** @var UploadedFile|null $photo */
        if ($photo !== null && !$photo->getError()) {
            $nouveau_nom= $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('article', $nouveau_nom, 'public');
        }
        Article::create($data);

        return to_route('admin.article.index')->with('success', 'Ajout effectué avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('backoffice.pages.article.form',[
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        $photo = $data['photo'];
        /** @var UploadedFile|null $photo */
        if ($photo !== null && !$photo->getError()) {
            if ($article->photo) {
                Storage::disk('public')->delete($article->photo);
            }
            $nouveau_nom= $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('article', $nouveau_nom, 'public');
        }
        $article->update($data);
        return to_route('admin.article.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->photo) {
            Storage::disk('public')->delete($article->photo);
        }
        $article->delete();
        return to_route('admin.article.index')->with('success', 'Suppression effectuée avec succès !');
    }
}

