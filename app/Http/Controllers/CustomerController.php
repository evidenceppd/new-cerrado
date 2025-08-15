<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.customers.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            if ($request->hasFile('path_media')) {
                $file = $request->file('path_media');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(40) . '.' . $extension;

                $file->storeAs('media/customers/', $filename, 'public');

                $path = "/storage/media/customers/" . $filename;
            }

            $customer = Customer::create([
                'name' => $request->name,
                'link' => $request->link,
                'path_media' => $path
            ]);

            if ($customer) {
                return redirect(route('customers.index'))->with('success', 'Cliente criado com sucesso!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não conseguimos salvar seu cliente, tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customer)
    {
        $customer = Customer::findOrFail($customer);
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $customer)
    {
        $customer = Customer::findOrFail($customer);

        try {
            if ($request->hasFile('path_media')) {
                $file = $request->file('path_media');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(40) . '.' . $extension;

                $file->storeAs('media/customers/', $filename, 'public');

                $path = "/storage/media/customers/" . $filename;
            } else {
                $path = $customer->path_media;
            }

            $customer->name = $request->name;
            $customer->link = $request->link;
            $customer->path_media = $path;

            $customer->save();


            if ($customer) {
                return redirect(route('customers.index'))->with('success', 'Cliente criado com sucesso!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não conseguimos salvar seu cliente, tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('success', 'Cliente excluído com sucesso!');
    }
}
