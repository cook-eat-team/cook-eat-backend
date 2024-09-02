<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipe = Recipe::all();
            return response()->json([
                'recipes' => $recipe
            ]);
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'time' => 'nullable|string',
            'serving' => 'nullable|string',
            'ustensils' => 'nullable|string',
            'appliance' => 'nullable|string',
            'ingredients' => 'array'
        ]);
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path;
        }
        
        $recipe = Recipe::create($validatedData);
    
        $ingredients = $request->input('ingredients');
        
        foreach ($ingredients as $ingredient) {
            // Vérifiez si l'ingrédient existe avant de l'attacher
            if (Ingredient::find($ingredient['id'])) {
                $recipe->ingredient()->attach($ingredient['id'], [
                    'quantity' => $ingredient['quantity'],
                    'unit' => $ingredient['unit']
                ]);
            } else {
                // Gérez le cas où l'ingrédient n'existe pas
                return response()->json(['error' => 'Ingrédient non trouvé: ' . $ingredient['id']], 400);
            }
        }
        
        return response()->json([
            'recipe' => $recipe
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $recipe = Recipe::with('ingredient')->find($id);

        return response()->json([
            'recipes' => $recipe,
            ]);
        }
    

    /**
     * Update the specified resource in storage.
     */
 /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image',
        'time' => 'nullable|string',
        'serving' => 'nullable|string',
        'ustensils' => 'nullable|string',
        'appliance' => 'nullable|string',
        'ingredients' => 'array'
    ]);

    
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $path;
    }

    $recipe = Recipe::find($id);        
    $recipe->update($request->all());
    $ingredients = $request->input('ingredients');
                foreach ($ingredients as $ingredient) {
                    $recipe->ingredient()->attach($ingredient['id'], 
                    ['quantity' => $ingredient['quantity'],
                    'unit' => $ingredient['unit']
                    ]);
            }
        return response()->json([
            'recipe' => $recipe
    ]);

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return response()->json([
            'recipes' => $recipe
        ]);
    }
}
