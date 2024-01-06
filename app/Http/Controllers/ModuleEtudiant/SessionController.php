<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\SessionRequest;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.session.index',[
            'sessions' => Session::orderBy('created_at','desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $session = new Session();
        return view('backoffice.pages.session.form',[
            'session' => $session
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request)
    {
        Session::create($request->validated());
        return redirect()->route('admin.session.index')->with('success', 'Ajout effectué avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        return view('backoffice.pages.session.form',[
            'session'=> $session
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionRequest $request, Session $session)
    {
       $session->update($request->validated());
       return redirect()->route('admin.session.index')->with('success','Modification effectue avec succes !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
       $session->delete();
       return redirect()->route('admin.session.index')->with('success','Suppression effectue avec succes !');
    }
}
