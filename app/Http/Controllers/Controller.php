<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function filteredNull($data, $except = [])
    {
        foreach ($data as $key => $item) {
            if (empty($item)){
                if ($except){
                    if (in_array($key, $except) == null){
                        unset($data->$key);
                    }
                }else {
                    unset($data->$key);
                }
            }
        }

        return $data;
    }
}
