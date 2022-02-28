<?php


namespace App\Modules\Telegram\Components;


use Illuminate\Support\Facades\App;

abstract class BaseService
{
    public static function getInstance()
    {
        return App::make(static::class);
    }

}
