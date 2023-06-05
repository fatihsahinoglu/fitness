<?php

namespace App\Services\Training;
use Illuminate\Http\Request;

interface ITraining{
    function get($id);
    function getAll();
    function add(Request $request);
    function update(Request $request, $id);
    function delete($id);
}
