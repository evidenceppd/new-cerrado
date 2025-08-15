<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $leads = Lead::paginate(10);
        return view('admin.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lead)
    {
        $lead = Lead::find($lead);

        return view('admin.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lead)
    {
        $lead = Lead::find($lead);

        $lead->delete();

        return redirect()->back()->with('success', 'Lead excluído com sucesso!');
    }

    public function registerDownload(Request $request)
    {
        $newLead = Lead::create([
            'name' => $request->name,
            'telefone' => $request->whatsapp,
            'typeRegister' => 1
        ]);

        return response()->json([$newLead]);
    }


    public function sendOrcamento(Request $request)
    {

        $data = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'empresa' => $request->empresa,
            'mensagem' => $request->mensagem
        ];

        $data = json_encode($data);

        $newLead = Lead::create([
            'name' => $request->nome,
            'telefone' => $request->telefone,
            'typeRegister' => 2,
            'data' => $data
        ]);

        return response()->json([$newLead]);
    }
}
