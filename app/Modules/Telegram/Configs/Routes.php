<?php


namespace App\Modules\Telegram\Configs;


use App\Modules\Telegram\Actions\Main\MainAction;
use App\Modules\Telegram\Actions\NotFoundAction;
use App\Modules\Telegram\Actions\Start\StartAction;
use App\Modules\Telegram\Components\RouteParser;
use App\Modules\Telegram\Middleware\StartMiddleware;

/**
 * Class Routes
 * @package App\Modules\Telegram\Configs
 */
class Routes
{
    private static array $actions = [
        StartAction::ROUTE => [
            StartAction::class, 'middleware' => [
                StartMiddleware::class
            ]
        ],
        MainAction::ROUTE => [
            MainAction::class
        ]
    ];

    /**
     * @return array
     */
    public static function getRouteList(): array
    {
        return self::$actions;
    }

    /**
     * todo: сделать exception убрать в обработчик ошибок
     * @param $route
     * @return string|null
     */
    public static function getRoute($route): ?string
    {
        return self::$actions[$route][0] ?? NotFoundAction::class;
    }

    /**
     * @param $route
     * @return array
     */
    public static function getMiddlewares(RouteParser $routeObject): array
    {
        $route = $routeObject->route();
        return self::$actions[$route]['middleware'] ?? [];
    }
}
