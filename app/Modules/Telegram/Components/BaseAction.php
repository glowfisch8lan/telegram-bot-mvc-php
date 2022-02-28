<?php


namespace App\Modules\Telegram\Components;


/**
 * Class BaseAction
 * @package App\Services\Actions
 * @property array $params Параметры запроса
 * @property string $action
 */
abstract class BaseAction
{
    protected $params = [];

    public function __construct(array $data = [])
    {
        $this->params = $data['params'] ?? [];
    }

    /**
     * @param array $data
     * @return BaseAction
     */
    public static function getInstance(array $data = []): BaseAction
    {
        return new static($data);
    }
}
