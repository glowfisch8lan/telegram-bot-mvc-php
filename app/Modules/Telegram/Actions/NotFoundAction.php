<?php


namespace App\Modules\Telegram\Actions;


use App\Modules\Telegram\Components\ActionInterface;
use App\Modules\Telegram\Components\BaseAction;
use App\Modules\Telegram\Dtos\ActionDto;
use App\Modules\Telegram\Dtos\RequestDto;
use Illuminate\Support\Facades\Log;

class NotFoundAction extends BaseAction implements ActionInterface
{
    public function run(RequestDto $dto)
    {
        Log::debug(sprintf('NotFound: %s', $dto->toJson()));

        return ActionDto::make([
            'action' => 'sendMessage',
            'params' => [
                'chat_id' => $dto->chatId,
                'text' => 'Извините, команда не распознана!'
            ]
        ]);
    }

}
