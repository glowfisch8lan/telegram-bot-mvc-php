<?php


namespace App\Modules\Telegram\Services;


use App\Modules\Telegram\Components\BaseService;
use Illuminate\Support\Facades\Cache;

class StateManager extends BaseService
{

    /**
     * @param string $key
     * @param $value
     * @return bool
     */
    public static function put(string $key, $value): bool
    {
        return Cache::put(sprintf('state_%s', $key), $value);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        return Cache::get(sprintf('state_%s', $key));
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function forget(string $key)
    {
        return Cache::forget(sprintf('state_%s', $key));
    }
}
