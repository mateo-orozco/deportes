<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller
{
    //
    public function index(){
        $players = Player::all();
        return $players;

    }
    public function show($id){
        $player = Player::find($id);
        return $player;
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
        $equipo = Team::find($request->team_id);
        $totalequipo= $equipo->total_players +1;
        $equipo->update([
            'total_players'=>$totalequipo,
        ]);
        // $equipo->save();
        return 'se creo jugador';
    }

    public function update(Request $request, $id){
        try{
            $request->validate([
                'name'=>'string',
                'lastname'=>'string',
                'age'=>'integer',
               'score'=>'decimal',
                'nationality'=>'string'
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }
        $player = Player::find($id);
        $player->update([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'age'=>$request->age,
            'score'=>$request->score,
            'nationality'=>$request->nationality,
            'team_id'=>$request->team_id,
        ]);

        return 'se actualizo jugador';
        
    }
    public function destroy($id){
        Player::destroy($id);
        return 'se elimino jugador';
    }
}
