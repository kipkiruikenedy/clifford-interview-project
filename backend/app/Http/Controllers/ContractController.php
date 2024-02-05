<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return response()->json($contracts, 200);
    }

    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return response()->json($contract, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_rates' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'accommodation_id' => 'required|exists:accommodations,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $contract = Contract::create($request->all());
        return response()->json($contract, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contract_rate' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'accommodation_id' => 'required|exists:accommodations,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $contract = Contract::findOrFail($id);
        $contract->update($request->all());

        return response()->json($contract, 200);
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return response()->json(['message' => 'Contract deleted successfully'], 200);
    }
}
