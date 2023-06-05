<?php

namespace App\Services\Settings;

use App\Models\Settings;

class SettingsService implements \App\Services\Settings\ISettings
{

    /**
     * @throws \Exception
     */

    function get(int $id)
    {
       return Settings::where('id',$id)->first();
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Settings::all();
    }


    function edit(int $id, array $settings)
    {
        $settings=Settings::Where('id',$id)->update(
            $settings
        );


        return $settings;
    }

    function delete(int $id)
    {
        $settings = $this->get($id);

        if($settings->delete()){
            return true;
        }
        return false;
    }

    function sortable(array $items)
    {

        foreach ($items as $item => $value) {
            $settings = Settings::find(intval($value));
            $settings->must = intval($item);
            $settings->save();
        }

    }


}
