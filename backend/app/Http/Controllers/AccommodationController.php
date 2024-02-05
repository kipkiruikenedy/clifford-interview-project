<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
    
        // Append the absolute URL for each image
        $accommodations = $accommodations->map(function ($accommodation) {
            $accommodation['image_url'] = asset("images/{$accommodation['image']}");
    
            return $accommodation;
        });
    
        return response()->json($accommodations);
    }
    

    public function show($id)
    {
        $accommodation = Accommodation::findOrFail($id);
    
        // Append the absolute URL for the image
        $accommodation['image_url'] = asset("images/{$accommodation['image']}");
    
        return response()->json($accommodation);
    }
    

    public function store(Request $request)
    {
            //validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'standard_rack_rate' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', //image validation rules
        ]);
    
        // Upload the image to the public folder
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    
        // Create accommodation with image information
        $accommodation = Accommodation::create([
            'name' => $request->name,
            'description' => $request->description,
            'standard_rack_rate' => $request->standard_rack_rate,
            'image' => $imageName, // Save the image name  in the database
        ]);
    
        return response()->json($accommodation, 201);
    }
    

    public function update(Request $request, $id)
    {
         //validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'standard_rack_rate' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $accommodation = Accommodation::findOrFail($id);
    
        // If a new image is provided, update it
        if ($request->hasFile('image')) {
            // Upload the new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
    
            // Delete the old image if it exists
            if ($accommodation->image) {
                unlink(public_path('images/' . $accommodation->image));
            }
    
            // Update the accommodation with the new image information
            $accommodation->update([
                'name' => $request->name,
                'description' => $request->description,
                'standard_rack_rate' => $request->standard_rack_rate,
                'image' => $imageName,
            ]);
        } else {
            // If no new image is provided, update other fields
            $accommodation->update([
                'name' => $request->name,
                'description' => $request->description,
                'standard_rack_rate' => $request->standard_rack_rate,
            ]);
        }
    
        return response()->json($accommodation, 200);
    }
    

    public function destroy($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        $accommodation->delete();

        return response()->json(null, 204);
    }
}
