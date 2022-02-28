<?php


namespace App\Modules\Telegram\Components;


use App\Modules\Telegram\Actions\ErrorAction;
use App\Modules\Telegram\Dtos\ActionDto;
use App\Modules\Telegram\Dtos\RequestDto;

use App\Modules\Telegram\Services\StateManager;
use Illuminate\Support\Facades\Log;

/**
 * Class RequestHandler
 * @package App\Modules\Telegram\Components
 */
class RequestHandler
{
    /**
     * @param RequestDto $dto
     * @return ActionDto
     */
    public static function handle(RequestDto $dto): ActionDto
    {
        try {
            /** @var ActionDto $result */
            $result = Router::instance($dto)->route();

        } catch (\Exception $exception) {

            Log::error($exception);
            StateManager::forget($dto->tid);
            $dto->exception = $exception;
            $result = ErrorAction::getInstance()->run($dto);

        }

        return $result;
    }
}
