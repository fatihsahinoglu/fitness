<?php

namespace App\Services\Training;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingService implements ITraining{

    function get($id)
    {
        return Training::where('id',$id)->first();

    }

    function getAll()
    {
        return Training::all();
    }


    function add(Request $request)
    {
        $training_arr = [
            "name" => $request->input('name'),
            "description" =>$request->input('surname')
        ];

        Training::create($training_arr);
    }

    function update(\Illuminate\Http\Request $request, $id)
    {
        $training = Training::where('id',$id)->first();
        $training->name = $request->input('name');
        $training->description = $request->input('description');
        $training->update();

        return $training;
    }

    function delete($id)
    {
        $user = Training::where('users.id', $id)->delete();

        if($user){
            return true;
        }else{
            return false;
        }
    }

}
