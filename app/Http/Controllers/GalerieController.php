<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalerieRequest;
use App\Models\Galerie;
use App\Models\GalerieImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    public function index()
    {
        return view('backoffice.pages.galerie.index', [
            'galeries' => Galerie::orderBy('created_at','desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $galerie = new Galerie();
       return view('backoffice.pages.galerie.form', [
            'galerie' => $galerie
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(GalerieRequest $request)
    {
        $galerieData = $request->validated();
        // Création de la galerie
        $galerie = Galerie::create([
            'name' => $request->input('name'),
        ]);

        // Téléversement et association des images à la galerie
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('galeries', $imageName, 'public');

                GalerieImages::create([
                    'galerie_id' => $galerie->id,
                    'imagePath' => $imagePath,
                ]);
            }
            return redirect()->route('admin.galerie.index')->with('success', 'Images téléversées avec succès !');
        }

        return redirect()->back()->withInput()->withErrors(['images' => 'Veuillez télécharger au moins une image.']);
    }



    /**
     * Display the specified resource.
     */
    public function show(Galerie $galerie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galerie $galerie)
    {
        return view('backoffice.pages.galerie.form', [
            'galerie' => $galerie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalerieRequest $request, Galerie $galerie)
    {
        return redirect()->route('admin.galerie$galerie.index')->with('success','Modification effectuée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galerie $galerie)
    {
        $images = $galerie->images;

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->imagePath);
            $image->delete(); 
        }

        $galerie->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }

}
