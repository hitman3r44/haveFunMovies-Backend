<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 5/20/19
 * Time: 10:44 AM
 */

namespace App\Libraries;


use Illuminate\Support\Facades\Log;

class Utility
{

    public static function errorMsg($e, $error_code = '001', $default_message = 'Something went wrong!')
    {
        $error_message = $default_message;

        //Write in Log File
        Log::error($e);

        if (!is_subclass_of($e, 'Exception')) {
            return $error_message;
        }

        $error_message .= '[' . $error_code . ':' . ($e->getLine()) . ']';
        if (env('APP_ENV') == strtolower('local')) {
            $error_message .= ', M:';
            $error_message .= $e->getMessage() . ', F:' . $e->getFile();
        }
        return $error_message;
    }


    public static function generateUUI($length = 10){
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return strtoupper(substr(bin2hex($bytes), 0, $length));
    }


    public static function generateV4UUI() { // a V4 UUI id generator

        return sprintf('%04x%04x-%04x-%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}