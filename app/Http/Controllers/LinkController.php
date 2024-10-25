<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::latest()->paginate(5);
        $type_menu = 'dashboard';

        return view('links.index',compact('links', 'type_menu'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $type_menu = 'dashboard';

        return view('links.create', compact('type_menu'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $iconName = time().'.'.$request->icon->extension();
        $request->icon->move(public_path('icons'), $iconName);
  
        $link = new Link();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->icon = 'icons/'.$iconName;
        $link->save();

        // Link::create($request->all());
   
        return redirect()->route('links.index')->with('success','Link created successfully.');
    }
    public function show(Link $product)
    {
        return view('links.show',compact('product'));
    }
    public function edit(Link $link)
    {
        $type_menu = 'dashboard';

        return view('links.edit',compact('link', 'type_menu'));
    }
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);
  
        $link->update($request->all());
  
        return redirect()->route('links.index')->with('success','Link updated successfully');
    }
    public function destroy(Link $link)
    {
        $link->delete();
  
        return redirect()->route('links.index')->with('success','Link deleted successfully');
    }
}
