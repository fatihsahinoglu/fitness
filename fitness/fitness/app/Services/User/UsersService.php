<?php
namespace App\Services\User;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersService implements IUser {

    function get($id)
    {
        $user = User::with('user_data')->where('id',$id)->first();
        $data['user'] = (object)$user->getAttributes();
        $data['userData'] = (object)$user->relationsToArray();
        if(!$user)
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('User not found');

        return $data;

    }

    function getAll()
    {
        return User::all();
    }


    function add(Request $request)
    {
        $user_arr = [
            "name" => $request->input('name'),
            "surname" =>$request->input('surname'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "birthday" =>$request->input('birthday'),
            "password" => Hash::make($request->input('password')),
            "role" => $request->input('role')
        ];

        $user = User::create($user_arr);

        $userData_arr = [
            "age" => intval($request->input('age')),
            "height"=> doubleval($request->input('height')),
            "weight" =>doubleval($request->input('weight')),
            "gender" => $request->input('gender'),
            "type" => $request->input('type'),
            "bmr" => doubleval($request->input('bmr')),
            "status" => 1
        ];

        $user->user_data()->create($userData_arr);
    }

    function update(\Illuminate\Http\Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->role = $request->input('role');
        $user->update();

        $userData = UserData::where('user_id', $user->id)->first();
        $userData->height = intval($request->input('height'));
        $userData->weight = intval($request->input('weight'));
        $userData->bmr = intval($request->input('bmr'));
        $userData->type = $request->input('type');
        $userData->update();

        return $user;
    }

    function delete($id)
    {
        $user = User::join('user_data', 'users.id', '=', 'user_data.user_id')
            ->where('users.id', $id)
            ->delete();

        if($user){
            return true;
        }else{
            return false;
        }
    }

}
