<?php


namespace App\Modules\Telegram\Actions\Start;


use App\Modules\Telegram\Actions\Main\MainAction;
use App\Modules\Telegram\Components\ActionInterface;
use App\Modules\Telegram\Components\BaseAction;
use App\Modules\Telegram\Components\Router;
use App\Modules\Telegram\Dtos\ActionDto;
use App\Modules\Telegram\Dtos\RequestDto;

class StartAction extends BaseAction implements ActionInterface
{
    const ROUTE = '/start';

    public function run(RequestDto $dto)
    {
        return Router::instance($dto)->redirect(MainAction::ROUTE);

        return ActionDto::make([
            'action' => 'sendMessage',
            'params' => [
                'chat_id' => $dto->chatId,
                'text' => 'Добро пожаловать!'
            ]
        ]);
    }

}
