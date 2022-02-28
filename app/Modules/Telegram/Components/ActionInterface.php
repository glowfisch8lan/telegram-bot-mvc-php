<?php


namespace App\Modules\Telegram\Components;

use App\Modules\Telegram\Dtos\RequestDto;

interface ActionInterface
{
    /**
     * @return mixed
     */
    public function run(RequestDto $dto);
}
