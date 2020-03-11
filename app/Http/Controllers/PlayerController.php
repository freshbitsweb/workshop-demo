<?php

namespace App\Http\Controllers;

use App\Player;
use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Insert Player
     *
     * @return \Illuminate\Http\Response
     **/
    public function insert()
    {
        return view('create');
    }

    /**
     * Store a new player.
     *
     * @param \App\Http\Requests\PlayerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function store(PlayerRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            $validatedData['avatar'] = $request->avatar->store('');
        }

        Player::create($validatedData);

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player added successfully'])
        ;
    }

     /**
     * Display page to edit specific player.
     *
     * @param \App\Player $player
     * @return \Illuminate\Http\Response
     **/
    public function edit(Player $player)
    {
        return view('edit', compact('player'));
    }

    /**
     * Update specific player.
     *
     * @param \App\Player $player
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function update(PlayerRequest $request, Player $player)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            if (file_exists('images/'. $player->avatar)) {
                unlink('images/'. $player->avatar);
            }

            $validatedData['avatar'] = $request->avatar->store('');
        }

        $player->update($validatedData);

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player has been updated'])
        ;
    }

    /**
     * Delete a specific player.
     *
     * @param \App\Player $player
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function destroy(Player $player)
    {
        if (file_exists('images/'. $player->avatar)) {
            unlink('images/'. $player->avatar );
        }

        $player->delete();

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player has been deleted'])
        ;
    }
}
