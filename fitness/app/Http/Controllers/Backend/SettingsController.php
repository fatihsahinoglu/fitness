<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Services\Settings\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{

    public function __construct( protected SettingsService $settingService)
    {}

    public function index()
    {
        try {
            $data['adminSettings'] = $this->settingService->getAll();
            return view('backend.settings.index', compact('data'));
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }

    }

    public function edit($id){
        $settings = $this->settingService->get($id);
        return view('backend.settings.edit')->with('settings',$settings);

    }

    public function update(Request $request,$id){
        try {

            $settings_arr = [
                "content" => $request->get('content')
            ];
                $settings=$this->settingService->edit($id,$settings_arr);

                if ($settings)
                {

                    return back()->with("success","Düzenleme İşlemi Başarılı");
                }
                return back()->with("error","Düzenleme İşlemi Başarısız");


        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function sortable(){
        try {
            $items = $_POST['item'];
            $this->settingService->sortable($items);
            echo true;
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }

    }

    public function delete($id){
        try {

            $isDeleted = $this->settingService->delete($id);

            if($isDeleted){
                return back()->with("success","Silme işlemi başarılı");
            }

            return back()->with("error","Silme işlemi başarısız");

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }

    }
}
