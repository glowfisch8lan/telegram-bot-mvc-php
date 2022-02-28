<?php

namespace App\Http\Controllers;

use App\Modules\Telegram\App;
use Exception;

class TelegramController extends Controller
{

    /**
     * @throws Exception
     */
    public function query()
    {
        App::run();
    }
}
