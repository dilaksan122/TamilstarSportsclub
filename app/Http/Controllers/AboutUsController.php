<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsEntries = AboutUs::all();
        return view('about_us.index', compact('aboutUsEntries'));
    }

    public function create()
    {
        return view('about_us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'history' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'anthem' => 'required',
           
        ]);

        $aboutUs = new AboutUs($request->only(['name', 'history', 'mission', 'vision', 'anthem', 'position']));

       
        $aboutUs->save();

        return redirect()->route('aboutUs.index');
    }

    public function show($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('about_us.show', compact('aboutUs'));
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        $request->validate([
            'history' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'anthem' => 'required',
            
        ]);

        $aboutUs->update($request->only(['name', 'history', 'mission', 'vision', 'anthem', 'position']));

      
        $aboutUs->save();

        return redirect()->route('aboutUs.index');
    }

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();
        return redirect()->route('aboutUs.index');
    }
    
}
