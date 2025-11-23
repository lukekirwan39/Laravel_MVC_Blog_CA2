<?php
use App\Models\Setting;

if (!function_exists('bloginfo')){
    function blogInfo(){
        return Setting::find(1);
    }
}

