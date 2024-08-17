<?php

// app/Http/Controllers/Admin/ClubInfoController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClubInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubInfoController extends Controller
{
    // Display all club information
    public function index()
    {
        $clubInfos = ClubInfo::all();
        return view('admin.club_info.index', compact('clubInfos'));
    }

    // Show form to create new club information
    public function create()
    {
        return view('admin.club_info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNo' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logoImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logoImage')) {
            $data['logoImage'] = $request->file('logoImage')->store('logos', 'public');
        }

        ClubInfo::create($data);

        return redirect()->route('admin.club_info.index')->with('success', 'Club Information created successfully.');
    }

    // Show form to edit existing club information
    public function edit(ClubInfo $clubInfo)
    {
        return view('admin.club_info.edit', compact('clubInfo'));
    }

    // Update existing club information
    public function update(Request $request, ClubInfo $clubInfo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNo' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logoImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logoImage')) {
            if ($clubInfo->logoImage) {
               Storage::disk('public')->delete($clubInfo->logoImage);
            }
            $data['logoImage'] = $request->file('logoImage')->store('logos', 'public');
        }

        $clubInfo->update($data);

        return redirect()->route('admin.club_info.index')->with('success', 'Club Information updated successfully.');
    }

    // Delete existing club information
    public function destroy(ClubInfo $clubInfo)
    {
        $clubInfo->delete();

        return redirect()->route('admin.club_info.index')->with('success', 'Club Information deleted successfully.');
    }
}
