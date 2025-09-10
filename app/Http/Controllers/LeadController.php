<?php

namespace App\Http\Controllers;

use App\Mail\ContatoMail;
use App\Models\Lead;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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

        try {
            // Validação back-end
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'celular' => 'required|string|max:20',
                'cidade' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'tipoConsorcio' => 'required|string|max:255',
                'valor_credito' => 'required|string',
                'terms' => 'accepted'
            ]);

            $data = [
                'nome' => $validated['name'],
                'telefone' => $validated['celular'],
                'email' => $validated['email'],
                'cidade' => $validated['cidade'],
                'estado' => $validated['estado'],
                'Tipo de Consórcio' => $validated['tipoConsorcio'],
                'Valor do Crédito' => $validated['valor_credito']
            ];

            $newLead = Lead::create([
                'name' => $validated['name'],
                'telefone' => $validated['celular'],
                'typeRegister' => 2,
                'data' => json_encode($data)
            ]);

            Mail::to('diegolppe@gmail.com')->send(new ContatoMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Contato enviado com sucesso!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Erro ao enviar orçamento: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Não conseguimos enviar o seu contato, tente novamente!'
            ], 500);
        }
    }

    public function sendConsorcio(Request $request)
    {

        try {
            // Validação back-end
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'celular' => 'required|string|max:20',
                'cidade' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'tipoConsorcio' => 'required|string|max:255',
                'valor_credito' => 'required|string',
                'terms' => 'accepted'
            ]);

            $data = [
                'nome' => $validated['name'],
                'telefone' => $validated['celular'],
                'email' => $validated['email'],
                'cidade' => $validated['cidade'],
                'estado' => $validated['estado'],
                'Tipo de Consórcio' => $validated['tipoConsorcio'],
                'Valor do Crédito' => $validated['valor_credito']
            ];

            $newLead = Lead::create([
                'name' => $validated['name'],
                'telefone' => $validated['celular'],
                'typeRegister' => 1,
                'data' => json_encode($data)
            ]);

            Mail::to('diegolppe@gmail.com')->send(new ContatoMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Contato enviado com sucesso!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Erro ao enviar orçamento: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Não conseguimos enviar o seu contato, tente novamente!'
            ], 500);
        }
    }
}
