<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Training\TrainingService;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public function __construct( protected TrainingService $userService)
    {}

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->userService->getAll();


        $counterAdmin = 0;
        $counterUser = 0;
        $totalUser = 0;
        foreach ($users as $user) {
            if($user->role == "ADMIN"){
                $counterAdmin = $counterAdmin + 1;
                $totalUser = $totalUser +1;
            }
            if($user->role == "USER"){
                $counterUser = $counterUser + 1;
                $totalUser = $totalUser +1;
            }
        }
        $data['adminCount'] = $counterAdmin;
        $data['userCount'] = $counterUser;
        $data['totalUser'] = $totalUser;
        return view('backend.default.index', compact('data'));
    }
}
