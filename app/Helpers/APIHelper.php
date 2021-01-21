<?php

namespace App\Helpers;

class APIHelper {
    
    public static function APIResponse($code, $data = null, $is_error = false)
    {
        $res = [];

        if($is_error)
        {
            $res['success'] = false;
            $res['code'] = $code;
            $res['data'] = $data;
        } else {
            $res['success'] = true;
            $res['code'] = $code;
            if($data != null)
            {
                $res['data'] = $data;
            }
        }

        return $res;

    }

}