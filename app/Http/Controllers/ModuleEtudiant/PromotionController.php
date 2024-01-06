<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\PromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::paginate(3);
        return view('backoffice.pages.promotion.index',[
            'promotions' => $promotions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotion = new Promotion();
        return view('backoffice.pages.promotion.form',[
            'promotion' => $promotion
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionRequest $request)
    {
        Promotion::create($request->validated());
        return redirect()->route('admin.promotion.index')->with('success', 'Ajout effectué avec succès !');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('backoffice.pages.promotion.form',[
            'promotion' => $promotion
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $data = $request->validate([
            'promotion' => [
                'required',
                Rule::unique('promotions')->ignore($promotion->id)
            ]
        ]);
        $promotion->update($data);
        return redirect()->route('admin.promotion.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotion.index')->with('success', 'Suppression effectué avec succès !');
    }
}
