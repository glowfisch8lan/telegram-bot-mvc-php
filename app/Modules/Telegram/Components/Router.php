<?php


namespace App\Modules\Telegram\Components;


use App\Modules\Telegram\Configs\Routes;
use App\Modules\Telegram\Dtos\RequestDto;
use App\Modules\Telegram\Services\ListenerManager;
use App\Services\Actions\Interfaces\ActionInterface;
use Illuminate\Support\Arr;

/**
 * Class Router
 * @package App\Services
 *
 * @property RequestDto $dto Здесь хранятяс данные из Update вебхука
 */
class Router
{

    /**
     * @var BaseAction|string|null Класс Action, который надо вызывать BaseAction::class
     */
    private ?string $action = null;

    private RequestDto $dto;

    public function __construct(RequestDto $dto)
    {
        $this->dto = $dto;
    }

    public static function instance(RequestDto $dto): Router
    {
        return new static($dto);
    }

    /**
     * @description Получить данные для роута - начальная функция
     * @return mixed
     */
    public function route()
    {
        /** @var RouteParser $routeObject */
        $routeObject = RouteParser::getInstance($this->dto->data);

        /** @var BaseAction|string $action */
        $action = Routes::getRoute($routeObject->route());

        $this->middlewares(Routes::getMiddlewares($routeObject));

        $instanceAction = $action::getInstance([
            'params' => $routeObject->params()
        ]);
        $eventResult = ListenerManager::run($this->dto);

        return $eventResult ?? $instanceAction->run($this->dto);
    }


    /**
     * @description Почередно запускаем функции-посредники. Если какая-то из них не пропускает процесс дальше - прекращем обработку.
     * @param array $middleware
     */
    private function middlewares(array $middleware = []): void
    {
        foreach ($middleware as $item) {
            if($item::run($this->dto)) {
                break;
            }
        }
    }

    /**
     * todo: переработать
     */
    public function redirect(string $route = '')
    {
        $this->dto->data = $route;
        return RequestHandler::handle($this->dto);
    }

    private function getRoutePath(string $action)
    {
        $result = array_filter(Arr::dot(self::$actions), fn($item) => $item === $action);
        if (!$result) {
            return false;
        }
        $route = Arr::undot($result);
        return array_key_first($route);
    }
}
