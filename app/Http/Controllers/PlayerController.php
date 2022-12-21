<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Player;

class PlayerController extends Controller
{
    //
    public function index(){
        $players = Player::all();
        return $players;

    }

    public function create(Request $request){
        try {
            $request->validate([
                'name'=>'string|required',
                'lastname'=>'string|required',
                'age'=>'integer|required',
                'score'=>'decimal|required',
                'nationality'=>'string|required',
                'team_id'=>'required|exists:teams,id',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);

        }
        $Player =Player::create([
            'name'=> $request->name,
            'lastname'=>$request->lastname,
            'age'=>$request->age,
            'score'=>$request->score,
            'nationality'=>$request->nationality,
            'team_id'=>$request->team_id,
        ]);
    }
}
