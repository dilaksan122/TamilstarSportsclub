<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function index()
    {
    $players = Player::paginate(10); // Adjust the number 10 to however many players you want per page
    return view('players.index', compact('players'));
    }


    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('images/players', 'public');

        Player::create([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('players.index');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($player->image) {
                Storage::disk('public')->delete($player->image);
            }
            $path = $request->file('image')->store('images/players', 'public');
        } else {
            $path = $player->image;
        }

        $player->update([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        if ($player->image) {
            Storage::disk('public')->delete($player->image);
        }
        $player->delete();
        return redirect()->route('players.index');
    }
}
