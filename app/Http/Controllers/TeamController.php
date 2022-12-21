<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    //
    public function index(){
        $teams = Team::all();
        return $teams;
    }
    public function show($id){
        $teams = Team::find($id);
        return $teams;
    }
    public function create(Request $request){
        try{
            $request->validate([
            'name'=>'string|required',
            'sport_id'=>'string|required|exists:sports,id',
            'creation_date'=>'timestamp|required',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' =>$th->getMessage()],400);
        }

        $team= Team::create([
            'name'=>$request->name,
            'sport_id'=>$request->sport_id,
            'creation_date'=>$request->creation_date,
        ]);
        return 'Equipo creado correctamente.';
    }
    public function update(request $request,$id)
    {
        try{
            $request->validate([
            'name'=>'string',
            'sport_id'=>'string|exists:sports,id',
            'creation_date'=>'timestamp',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' =>$th->getMessage()],400);
        }

        $team= Team::find($id)->update([
            'name'=>$request->name,
            'sport_id'=>$request->sport_id,
            'creation_date'=>$request->creation_date,
        ]);
        return 'Equipo creado correctamente.';
    }
    public function destroy($id)
    {
        Team::destroy($id);
        return 'equipo eliminado correctamente';
    }
}
