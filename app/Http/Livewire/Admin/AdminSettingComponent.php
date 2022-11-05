<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;

class AdminSettingComponent extends Component
{

    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twiter;
    public $facebook;
    public $pintrest;
    public $instagram;
    public $youtube;

    public function mount()
    {
        $setting = Setting::find(1);
        if($setting)
        {
            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->phone2 = $this->phone2;
            $setting->address = $this->address;
            $setting->map = $this->map;
            $setting->twiter = $this->twiter;
            $setting->facebook = $this->facebook;
            $setting->pintrest = $this->pintrest;
            $setting->instagram = $this->instagram;
            $setting->youtube = $this->youtube;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'pintrest' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'
        ]);
    }

    public function saveSetting()
    {
        $this->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'pintrest' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'
        
        ]);

        $setting = Setting::find(1);
        if(!$setting)
        {
            $setting = new Setting();
        }
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->twiter = $this->twiter;
        $setting->facebook = $this->facebook;
        $setting->pintrest = $this->pintrest;
        $setting->instagram = $this->instagram;
        $setting->youtube = $this->youtube;
        $setting->save();
        session()->flash('message', 'Setting has benn saved successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
