<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Accommodation;

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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'accommodation_id' => 'required|exists:accommodations,id',
            'user_id' => 'required|exists:users,id',
        ]);
        
    
        // Convert datetime values to the correct format
        $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
    
        // Find the selected accommodation
        $accommodation = Accommodation::findOrFail($request->accommodation_id);
    
        // Calculate the duration of the booking in days
        $startDate = new \DateTime($start_date);
        $endDate = new \DateTime($end_date);
        $duration = $startDate->diff($endDate)->days;
    
        // Calculate the contract rates
        $contract_rates = $duration * $accommodation->standard_rack_rate;
    
        // Create the booking
        $booking = Contract::create([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'accommodation_id' => $request->accommodation_id,
            'user_id' => $request->user_id,
            'contract_rates' => $contract_rates,
        ]);
    
        return response()->json($booking, 201);
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
