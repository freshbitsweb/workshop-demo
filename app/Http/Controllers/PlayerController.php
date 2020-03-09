<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
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
     * @param
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function store()
    {

        return redirect()->route('index')
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
    public function update(Player $player)
    {
        $project->update($request->validated());

        return redirect()->route('index')
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
        $player->delete();

        return redirect()->route('index')
            ->with(['status' => 'success', 'message' => 'Player has been deleted'])
        ;
    }
}
