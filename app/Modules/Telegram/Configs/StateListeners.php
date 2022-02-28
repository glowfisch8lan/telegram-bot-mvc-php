<?php


namespace App\Modules\Telegram\Configs;


use App\Modules\Telegram\Enums\StateEnum;
use App\Modules\Telegram\Listeners\StartListener;
use App\Services\Actions\MainAction;
use App\Services\Actions\NotFoundAction;
use App\Services\Actions\StartAction;


class StateListeners
{
    /**
     * StateEnum::EMAIL_NEED_VERIFICATION => [
     *  EmailValidationListener::class
     * ],
     *
     * @var array
     */
    private static array $stateListeners = [
        StateEnum::START => [
            StartListener::class
        ]
    ];

    /**
     * @return array
     */
    public static function getListenerList(): array
    {
        return self::$stateListeners;
    }

    /**
     * @param $event
     * @return array
     */
    public static function getListeners($event): array
    {
        return self::$stateListeners[$event] ?? [];
    }
}
