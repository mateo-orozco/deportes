<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    //
    public function index(){
      $sports = Sport::all();
      return $sports;
    } 
    public function show($id){
        $sports = Sport::find($id);
      return $sports;
    }
    
    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'string|required',
                'country'=>'string|required',
                'description' => 'string|required',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error'=>$th->getMessage()],400);
        }
        $sport = Sport::create([
            'name' => $request->name,
            'country'=>$request->country,
            'description' => $request->description,
        ]);
        return 'Deporte creado correctamente';
    }

    public function update(Request $request, $id){
        try{
            $request->validate([
                'name' => 'string',
                'country'=>'string',
                'description' => 'string',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error'=>$th->getMessage()],400);
        }
        $sport = Sport::find($id)->update([
            'name' => $request->name,
            'country'=>$request->country,
            'description' => $request->description,
        ]);
        return 'Deporte actualizado correctamente';
    }

    public function destroy($id){
        Sport::destroy($id);
        return "deporte eliminado correctamente";
    }
    
    
}
