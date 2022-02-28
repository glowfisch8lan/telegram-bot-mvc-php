<?php


namespace App\Modules\Telegram\Middleware;


use App\Modules\Telegram\Dtos\RequestDto;
use App\Modules\Telegram\Enums\StateEnum;
use App\Modules\Telegram\Services\StateManager;

/**
 * Class StartMiddleware
 * @package App\Modules\Telegram\Middleware
 */
class StartMiddleware
{
    /**
     * @param RequestDto $dto
     * @return mixed|false
     */
    public static function run(RequestDto $dto)
    {
        StateManager::put($dto->tid, StateEnum::START);

        return false;
    }
}
