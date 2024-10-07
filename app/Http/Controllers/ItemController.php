<?php
// app/Http/Controllers/ItemController.php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        // Créer un nouvel item
        $item = new Item();
        $item->name = $validatedData['name'];
        $item->description = $validatedData['description'];
        $item->price = $validatedData['price'];
        $item->quantity = $validatedData['quantity'];
        $item->save();

        // Rediriger vers la liste des items avec un message de succès
        return redirect()->route('items.index')->with('success', 'Item créé avec succès.');
    }
    public function create()
    {
        return view('items.create');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}