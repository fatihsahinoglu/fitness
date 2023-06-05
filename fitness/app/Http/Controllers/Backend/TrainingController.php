<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Training\TrainingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TrainingController extends Controller
{
    public function __construct( protected TrainingService $trainingService)
    {}

    public function index(){
        try {

            $data['training'] = $this->trainingService->getAll();
            return view('backend.training.index', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function add(){
        try {
            return view('backend.training.add');

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function addItem(Request $request){
        try {
            $this->trainingService->add($request);
            $data['training'] = $this->trainingService->getAll();

            return view('backend.training.index', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function detail($id){
        try {

            $data = $this->trainingService->get($id);
            return view('backend.training.detail', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function edit($id){
        try {

            $data = $this->trainingService->get($id);
            return view('backend.training.edit', compact('data'));

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try {
            $user = $this->trainingService->update($request,$id);

            if($user){
                return back()->with('success', 'Düzenleme işlemi başarılı');
            }
            return back()->with("error","Düzenleme İşlemi Başarısız");

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }


    public function delete($id){
        try {
            $isDeleted = $this->trainingService->delete($id);

            if($isDeleted){
                return back()->with("success","Silme işlemi başarılı");
            }

            return back()->with("error","Silme işlemi başarısız");
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
