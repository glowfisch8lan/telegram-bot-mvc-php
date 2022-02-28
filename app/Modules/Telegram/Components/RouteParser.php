<?php


namespace App\Modules\Telegram\Components;


use Illuminate\Support\Facades\App;

class RouteParser
{
    /**
     * @var string $route /start, /main, <команда от пользователя>
     */
    private string $route = '';

    /**
     * RouteParser constructor.
     * @param string $route
     */
    public function __construct(string $route = '')
    {
        $this->route = $route;
    }

    /**
     * @param string $route
     * @return mixed
     */
    public static function getInstance(string $route = '')
    {
        return App::make(static::class, ['route' => $route]);
    }

    /**
     * @description Распарсить роутер
     * @return string
     */
    public function route(): string
    {
        return explode('?', $this->route)[0] ?? '';
    }

    /**
     * @description Получить request параметры
     * @return mixed
     */
    public function params()
    {
        return json_decode(explode('?', $this->route)[1] ?? null, true);
    }
}
