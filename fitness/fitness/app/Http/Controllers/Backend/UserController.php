<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\User\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function __construct( protected UsersService $userService)
    {}

    public function index(){
        try {

            $data['users'] = $this->userService->getAll();
            return view('backend.users.index', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function add(){
        try {
            return view('backend.users.add');

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function addItem(Request $request){
        try {
            $this->userService->add($request);
            $data['users'] = $this->userService->getAll();

            return view('backend.users.index', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function detail($id){
        try {

            $data = $this->userService->get($id);
            return view('backend.users.detail', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function edit($id){
        try {

            $data = $this->userService->get($id);
            return view('backend.users.edit', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try {
            $user = $this->userService->update($request,$id);

            if($user){
                return back()->with('success', 'Düzenleme işlemi başarılı');
            }
            return back()->with("error","Düzenleme İşlemi Başarısız");

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function sortable(){
        try {
            $items = $_POST['item'];
            $this->userService->sortable($items);
            echo true;
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }

    }


    public function delete($id){
        try {
            $isDeleted = $this->userService->delete($id);

            if($isDeleted){
                return back()->with("success","Silme işlemi başarılı");
            }

            return back()->with("error","Silme işlemi başarısız");
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
