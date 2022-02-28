<?php


namespace App\Modules\Telegram\Actions\Main;


use App\Modules\Telegram\Components\ActionInterface;
use App\Modules\Telegram\Components\BaseAction;
use App\Modules\Telegram\Dtos\ActionDto;
use App\Modules\Telegram\Dtos\RequestDto;

/**
 * Class MainAction
 * @package App\Modules\Telegram\Actions\Main
 */
class MainAction extends BaseAction implements ActionInterface
{
    const ROUTE = '/main';

    public function run(RequestDto $dto)
    {

        return ActionDto::make([
            'action' => 'sendMessage',
            'params' => [
                'chat_id' => $dto->chatId,
                'text' => 'Главный Action!'
            ]
        ]);
    }

}
