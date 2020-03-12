<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePlayerRequest;
use App\Player;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function index(): Renderable
    {
        $players = Player::all();

        return view('index', compact('players'));
    }

    public function store(SavePlayerRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['avatar'] = $request->file('avatar')->store('');

        Player::create($validatedData);

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player added successfully'])
        ;
    }

    public function edit(Player $player): Renderable
    {
        return view('edit', compact('player'));
    }

    public function update(SavePlayerRequest $request, Player $player): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            Storage::delete($player->avatar);

            $validatedData['avatar'] = $request->file('avatar')->store('');
        }

        $player->update($validatedData);

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player has been updated'])
        ;
    }

    public function destroy(Player $player): RedirectResponse
    {
        Storage::delete($player->avatar);

        $player->delete();

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player has been deleted'])
        ;
    }

    public function getFileName(string $fileName)
    {
        return Storage::download($fileName);
    }
}
