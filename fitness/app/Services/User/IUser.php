<?php

namespace App\Services\User;
use Illuminate\Http\Request;

interface IUser{
    function get($id);
    function getAll();
    function add(Request $request);
    function update(Request $request, $id);
    function delete($id);
}
