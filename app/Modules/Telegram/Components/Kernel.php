<?php

namespace App\Modules\Telegram\Components;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class Kernel
 * @package App\Modules\Telegram
 */
class Kernel
{
    /**
     * @throws Exception
     */
    public function run(): void
    {
        $mediator = Mediator::init();

        $dto = $mediator->getWebhookUpdate();

        if (config('app.debug')) {
            Log::debug($dto->toJson());
        }

        $action = RequestHandler::handle($dto);

        Mediator::init()->send($action);
    }
}
