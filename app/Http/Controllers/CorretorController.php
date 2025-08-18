<?php

namespace App\Http\Controllers;

use App\Models\Corretor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CorretorController extends Controller
{
    public function index(Request $request)
    {
        $corretores = Corretor::paginate(10);
        return view('admin.corretores.index', compact('corretores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.corretores.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $phone = preg_replace('/\D/', '', $request->phone);

            $corretor = Corretor::create([
                'name' => $request->name,
                'phone' => $phone,
                'especialidade' => $request->especialidade,
                'mostrar' => isset($request->mostrar_corretor) ? 1 : 0,
            ]);

            if ($corretor) {
                return redirect(route('corretores.index'))->with('success', 'Corretor criado com sucesso!');
            }
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Não conseguimos salvar seu corretor, tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(corretor $corretor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($corretor)
    {
        $corretor = Corretor::findOrFail($corretor);
        return view('admin.corretores.edit', compact('corretor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $corretor)
    {
        $corretor = Corretor::findOrFail($corretor);

        try {
            $phone = preg_replace('/\D/', '', $request->phone);

                $corretor->name = $request->name;
                $corretor->phone = $phone;
                $corretor->especialidade = $request->especialidade;
                $corretor->mostrar = isset($request->mostrar_corretor) ? 1 : 0;
            

            $corretor->save();


            if ($corretor) {
                return redirect(route('corretores.index'))->with('success', 'corretor criado com sucesso!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não conseguimos salvar seu corretor, tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $corretor = Corretor::findOrFail($id);
        $corretor->delete();
        return redirect()->back()->with('success', 'corretor excluído com sucesso!');
    }
}
