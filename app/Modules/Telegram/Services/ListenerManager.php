<?php


namespace App\Modules\Telegram\Services;

use App\Modules\Telegram\Components\BaseService;
use App\Modules\Telegram\Configs\StateListeners;
use App\Modules\Telegram\Dtos\RequestDto;

class ListenerManager extends BaseService
{
    /**
     * @param RequestDto $dto
     * @return null
     */
    public static function run(RequestDto $dto)
    {
        $state = StateManager::get($dto->tid);

        foreach (StateListeners::getListeners($state) as $item) {
            $result = $item::handle($dto);
            if ($result) {
                return $result;
            }
        }
        return null;
    }

}
