<?php


namespace App\Modules\Telegram\Dtos;


use Cerbero\Dto\Dto;
use const Cerbero\Dto\IGNORE_UNKNOWN_PROPERTIES;
use const Cerbero\Dto\PARTIAL;

/**
 * Class ActionDto
 * @package App\Modules\Telegram\Dtos
 *
 * @property string $action
 * @property array $params
 */
class ActionDto extends Dto
{
    protected static $defaultFlags = PARTIAL | IGNORE_UNKNOWN_PROPERTIES;
}
