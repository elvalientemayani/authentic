<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class InventoryController extends Controller
{
    //
    public function inventory()
    {
        $items = Item::all();  
        
        return view('inventory', compact('items'));
    }
    
    public function create()
    {
        return view('add_item');
    }
    
    public function itemDetails($id)
    {
        $item = Item::find($id);  
        
        return view('item_details', compact('item'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            
        ]);
    
        Item::create($validatedData);
    
        return redirect()->route('inventory')->with('success', 'Item added successfully');
    }
    
    public function edit($id)
    {
        $item = Item::find($id);
        return view('edit_item', compact('item'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
        
        ]);
    
        $item = Item::find($id);
        $item->update($validatedData);
    
        return redirect()->route('inventory')->with('success', 'Item updated successfully');
    }
    
    public function destroy($id){
    
        $item = Item::find($id);
        $item->delete();
    
        return redirect()->route('inventory')->with('success', 'Item updated successfully');
    }
}
