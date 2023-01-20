<?php

namespace App\Http\Controllers;

use App\Models\hegaldia;
use Illuminate\Http\Request;

class HegaldiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hegaldiak = Hegaldia::all();
        return view('hegaldia.index', ['hegaldia' => $hegaldiak]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'izena' => 'required',
            'irteera' => 'required',
            'helmuga' => 'required',
            'irteeraData' => 'required',
            'iraupena' => 'required',
        ]);
    
        $hegaldiak = new Hegaldia;
        $hegaldiak->id = $request->id;
        $hegaldiak->irteera = $request->irteera;
        $hegaldiak->helmuga = $request->helmuga;
        $hegaldiak->irteeraData = $request->irteeraData;
        $hegaldiak->iraupena = $request->iraupena;

        $hegaldiak->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hegaldia  $hegaldia
     * @return \Illuminate\Http\Response
     */
    public function show(hegaldia $hegaldia)
    {
        $out = $hegaldia->irteera + ' --> ' + $hegaldia->helmuga + ' - ' + $hegaldia->irteeraData + ' (' + $hegaldia->iraupena + ')';
        echo $out;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hegaldia  $hegaldia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $hegaldia = Hegaldia::find($id);
        
        $hegaldia->irteera = $request->irteera;
        $hegaldia->helmuga = $request->helmuga;
        $hegaldia->irteeraData = $request->irteeraData;
        $hegaldia->iraupena = $request->iraupena;
        $hegaldia->save();

        return redirect()->route('hegaldia')->with('success', 'Hegaldia updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hegaldia  $hegaldia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hegaldi = Hegaldia::find($id);
        $hegaldi->delete();
        return redirect()->route('hegaldia')->with('success', 'Hegaldia deleted successfully');
    }
}
