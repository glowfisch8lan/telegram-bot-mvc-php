<?php


namespace App\Modules\Telegram\Dtos;


use Cerbero\Dto\Dto;
use Exception;
use const Cerbero\Dto\IGNORE_UNKNOWN_PROPERTIES;
use const Cerbero\Dto\MUTABLE;
use const Cerbero\Dto\PARTIAL;

/**
 * Class RequestDto
 * @package App\Modules\Telegram\Dtos\Actions
 *
 * @property string $data - тут хранится текст от пользователя
 * @property int $tid
 * @property int $chatId
 * @property mixed $request
 * @property string $firstName
 * @property string $lastName
 * @property string $login
 * @property Exception $exception Данные которые не поддаются учету
 * @property mixed|null $contact
 */
class RequestDto extends Dto
{
    protected static $defaultFlags = PARTIAL | IGNORE_UNKNOWN_PROPERTIES | MUTABLE;
}
