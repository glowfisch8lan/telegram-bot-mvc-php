<?php


namespace App\Modules\Telegram\Actions;


use App\Modules\Telegram\Components\ActionInterface;
use App\Modules\Telegram\Components\BaseAction;
use App\Modules\Telegram\Dtos\ActionDto;
use App\Modules\Telegram\Dtos\RequestDto;

class ErrorAction extends BaseAction implements ActionInterface
{
    public function run(RequestDto $dto)
    {
        return ActionDto::make([
            'action' => 'sendMessage',
            'params' => [
                'chat_id' => $dto->chatId,
                'text' => $dto->exception->getMessage()
            ]
        ]);
    }

}
