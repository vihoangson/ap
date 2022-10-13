<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class RouteService {

    public static function content() {
        $keys = config('app.keys_12775');
        dump(count($keys));
        $keys = config('app.keys_12774');
        dump(count($keys));
        $m_12775 = Cache::remember('m_12775',100000,function(){
            $keys = config('app.keys_12775');
            $m = collect();
            foreach ($keys as $k => $key){
                $string = \Illuminate\Support\Facades\Redis::get($key);

                if(preg_match('/\[rp /',$string)){
                    $m->add($string);
                }

                if(preg_match('/\[qt\] /',$string)){
                    $m->add($string);
                }

                if($k > 2000){
                    // break;
                }
            }
            return $m;
        });
        dump($m_12775);

        $m_12774 = Cache::remember('m_12774',100000,function(){
            $keys = config('app.keys_12774');
            $m = collect();
            foreach ($keys as $k => $key){
                $string = \Illuminate\Support\Facades\Redis::get($key);

                if(preg_match('/\[rp /',$string)){
                    $m->add($string);
                }

                if(preg_match('/\[qt\] /',$string)){
                    $m->add($string);
                }

                if($k > 2000){
                    // break;
                }
            }
            return $m;
        });
        dump($m_12774);
        return ;
    }
}
