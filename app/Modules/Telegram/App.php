<?php


namespace App\Modules\Telegram;

use App\Modules\Telegram\Components\Kernel;
use Exception;

/**
 * Class App
 * @package App\Modules\Telegram
 */
class App
{

    /**
     * @throws Exception
     */
    public static function run()
    {
        $kernel = new Kernel();
        $kernel->run();
    }

}
