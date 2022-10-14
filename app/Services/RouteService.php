<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RouteService {

    public static function content() {
        $keys = config('app.keys_12775');
        dump(count($keys));
        $keys = config('app.keys_12774');
        dump(count($keys));
        $m_12775      = Cache::remember('m_12775', 100000, function () {
            $keys = config('app.keys_12775');
            $m    = collect();
            foreach ($keys as $k => $key) {
                $string = \Illuminate\Support\Facades\Redis::get($key);

                if (preg_match('/\[rp /', $string)) {
                    $m->add($string);
                }

                if (preg_match('/\[qt\] /', $string)) {
                    $m->add($string);
                }

                if ($k > 2000) {
                    // break;
                }
            }

            return $m;
        });
        $mapping_user = config('app.mapping_user');

        // dump($mapping_user);
        foreach ($m_12775 as $k => $m) {
            // if(preg_match('/to=192929612-1447408359140491264/',$m)){
            //     dump($m);
            // }

            if (preg_match('/\[rp aid=([0-9]+) to=([0-9]+)-([0-9]+)\]/', $m, $match)) {
                dump($m);

                // '[reply mid:44 to:31]'
                // dump($mapping_user[$match[1]]);
                // dump($match);

                //
                $id_mgs = Redis::get('MSGIDCWRAW_' . $match[3]);

                preg_match('/INFO_([0-9]+)_([0-9]+)_([0-9]+)/', $id_mgs, $matchid);
                // dump($id_mgs);
                // dump($matchid);
                // dump($match[0]);
                // dump(preg_replace('/\[rp aid=([0-9]+) to=([0-9]+)-([0-9]+)\]/',' $1 $2 $3',$m));
                $m = (str_replace($match[1], $mapping_user[$match[1]]['id_sns'], $m));
                //$match[3] $matchid[3]
                $m = (str_replace($match[3], $matchid[3], $m));
                // dump($m);
                $m = preg_replace('/\[rp aid=([0-9]+) to=([0-9]+)-([0-9]+)\]/', '[reply mid:$3 to:$1] ', $m);
                $m = preg_replace('/\[qt]\[qtmeta aid=([0-9]+) time=([0-9]+)\]/', '[quote uid:$1 time:$2] ', $m);
                $m = preg_replace('/\[\/qt]/', '[/quote]', $m);

                if ($k > 1) {
                    break;
                }


            }
        }
        // dump($m_12775);

        $m_12774 = Cache::remember('m_12774', 100000, function () {
            $keys = config('app.keys_12774');
            $m    = collect();
            foreach ($keys as $k => $key) {
                $string = \Illuminate\Support\Facades\Redis::get($key);

                if (preg_match('/\[rp /', $string)) {
                    $m->add($string);
                }

                if (preg_match('/\[qt\] /', $string)) {
                    $m->add($string);
                }

                if ($k > 2000) {
                    // break;
                }
            }

            return $m;
        });

        //dump($m_12774);
        return;
    }
}
