<?php

namespace Modules\Settings\App\Service;

use App\Traits\message;
use Modules\Settings\App\Http\Requests\settingRequest;
use Modules\Settings\App\Models\settings;
use Modules\Settings\App\resources\settingResource;

class SettingsService
{
    use message;
    public function  get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        $data = settingResource::collection(Settings::get());
        return $this->message($data,'all Settings',200);
    }
    public function create(SettingRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        $Settings = $request->validated();
        $data=Settings::create($Settings);
//        $data->addMediaFromRequest('img')->toMediaCollection('Settings');
        if(! $data){
            return $this->message($data,'not create',400);
        };
        return $this->message($data,'created',200);
    }
    public function show($id){
        $data = Settings::find($id);
        return $this->message($data,'Settings',200);
    }

    public function update(array $data, $id)
    {
        $Settings = Settings::findOrFail($id);
        $Settings->update($data);
        if( $data){
            return $this->message($Settings, 'not update', 400);
        }
        return $this->message($Settings, 'update', 200);
    }

    public  function destroy($id){
        $data = Settings::findOrFail($id);
        $data->delete($id);
        return $this->message(null,'it is deleted', 200);
    }
}
