<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartenaireRequest;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    public function index()
    {
        return view("backoffice.pages.partenaire.index",[
            "partenaires" => Partenaire::orderBy('created_at','desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partenaire = new Partenaire();
        return view('backoffice.pages.partenaire.form',[
            'partenaire' => $partenaire
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartenaireRequest $request)
    {
        $data = $request->validated();
        $logo = $data['logo'];

        /** @var UploadedFile $logo */
        if ($logo !== null && !$logo->getError()) {
            $nouveau_nom= $logo->getClientOriginalName();
            $data['logo'] = $logo->storeAs('partenaire', $nouveau_nom, 'public');
        }
        Partenaire::create($data);

        return redirect()->route('admin.partenaire.index')->with('success','Ajout effectué avec succès !');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        return view('backoffice.pages.partenaire.form',[
            'partenaire' => $partenaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartenaireRequest $request, Partenaire $partenaire)
    {
        $data = $request->validated();
        $logo = $data['logo'];
         /** @var UploadedFile $logo */
        if ($logo !== null && !$logo->getError()) {
            if ($partenaire->logo) {
                Storage::disk('public')->delete($partenaire->logo);
            }
            $nouveau_nom= $logo->getClientOriginalName();
            $data['logo'] = $logo->storeAs('partenaire', $nouveau_nom, 'public');
        }
        $partenaire->update($data);
        return redirect()->route('admin.partenaire.index')->with('success','Edition effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        if ($partenaire->logo) {
            Storage::disk('public')->delete($partenaire->logo);
        }
        $partenaire->delete();
        return redirect()->route('admin.partenaire.index')->with('success','Suppression effectuée avec succès !');
    }
}
