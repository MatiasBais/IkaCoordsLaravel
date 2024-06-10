<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('guru.index', compact('items'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:ikariamguru,id',
            'desc' => 'required',
            'hasta' => 'required|date',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('guru.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('guru.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'id' => 'required|unique:ikariamguru,id,' . $item->id,
            'desc' => 'required',
            'hasta' => 'required|date',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}