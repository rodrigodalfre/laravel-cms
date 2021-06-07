<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $settings = [];

        $dbsettings = Setting::get();

        foreach($dbsettings as $dbsetting){
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }
        
        return view('admin.setting.index',[
            'settings' => $settings
        ]);
    }

    public function save(Request $request){
        $data = $request->only([
            'title', 'subtitle', 'email', 'bgcolor', 'textcolor'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('settings')
            ->withErrors($validator);
        }

        foreach($data as $item => $value){
            
            Setting::where('name', $item)->update([
                'content' => $value
            ]);

        }

        return redirect()->route('settings')
            ->with('warning', 'Informações alteradas com sucesso');
    }

    protected function validator($data){
        return Validator::make($data, [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email', 'max:100'],
            'bgcolor' => ['string', 'regex:/#[a-zA-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[a-zA-Z0-9]{6}/i']
        ]);
    }

}
