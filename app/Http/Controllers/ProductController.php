<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
            'category' => 'required',
            'brand' => 'required',
            'image' => 'required'
        ]);
        
        $fileName = null;

        if ($request->hasFile('image')) {
            // Haal de originele bestandsnaam van de geüploade afbeelding op
            $fileName = $request->file('image')->getClientOriginalName();
    
            // Sla de afbeelding op in de public map en gebruik de originele bestandsnaam
            $request->file('image')->move(public_path('uploads'), $fileName);
    
            // Voer hier de rest van je logica uit om het model op te slaan met de bestandsnaam
        }

        // Afbeelding in de database opslaan
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'brand' => $request->brand,
            'image' => $fileName, // Sla de originele bestandsnaam op in de database
        ]);
        return Redirect::route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'sometimes|required',
            'description' => 'sometimes|required',
            'price' => 'sometimes|required',
            'category' => 'sometimes|required',
            'brand' => 'sometimes|required',
            'image' => 'sometimes|required'
        ]);
        
        // Update de afbeelding alleen als er een nieuwe afbeelding is geüpload
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $fileName);
        } else {
            // Als er geen nieuwe afbeelding is geüpload, gebruik de originele afbeeldingsnaam
            $fileName = $product->image;
        }
        
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'brand' => $request->brand,
            'image' => $fileName,
        ]);
        
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }




    // Supplements
    public function supplementIndex(){
        $products = Product::where('category', 'Supplementen')->get();
        return view('products.supplementIndex', compact('products'));
    }
}
