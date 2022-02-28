<?php

namespace App\Modules\Telegram\Listeners;


use App\Modules\Telegram\Dtos\RequestDto;
use Illuminate\Support\Facades\Log;

class StartListener
{

    /**
     * @param RequestDto $dto
     * @return false
     */
    public static function handle(RequestDto $dto)
    {
        return false;
    }
}
