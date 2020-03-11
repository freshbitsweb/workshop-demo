<?php

namespace App\Http\Controllers;

use App\Player;
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
    public function store(Request $request)
    {
        $player = new player;

        $validatedData = $request->validate([
            'name' => 'required|string',
            'batting_average' => 'required|numeric',
            'bowling_average' => 'required|numeric',
            'playing' => 'required|boolean',
            'avatar' => 'required|image',
        ]);

        $player->name = $request->input('name');
        $player->batting_average = $request->input('batting_average');
        $player->bowling_average = $request->input('bowling_average');
        $player->playing = $request->input('playing');
        if ($request->hasFile("avatar")) {
            $files = $request->file('avatar');
            $name = rand(1, 100).$files->getclientOriginalName();
            $files->move('image', $name);
            $player->avatar=$name;
        }

        $player->save();

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
    public function update(Request $request, $id)
    {
        $player = player::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'batting_average' => 'required|numeric',
            'bowling_average' => 'required|numeric',
            'playing' => 'required|string',
        ]);

        $player->name = $request->input('name');
        $player->batting_average = $request->input('batting_average');
        $player->bowling_average = $request->input('bowling_average');
        $player->playing = $request->input('playing');
        if ($request->hasFile("avatar")) {
            $photosFetch = player::where('id', $request->input('ids'))->first()->avatar;
            if (file_exists('image/'.$photosFetch)) {
                unlink('image/'.$photosFetch);
            }

            $files = $request->file('avatar');
            $name = rand(1, 100).$files->getclientOriginalName();
            $files->move('image', $name);
            $player->avatar=$name;
        }

        $player->save();

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
        if (file_exists('image/'. $player->avatar)) {
            unlink('image/'. $player->avatar );
        }

        $player->delete();

        return redirect()->route('home')
            ->with(['status' => 'success', 'message' => 'Player has been deleted'])
        ;
    }
}
