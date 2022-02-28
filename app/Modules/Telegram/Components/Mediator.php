<?php


namespace App\Modules\Telegram\Components;


use App\Modules\Telegram\Dtos\ActionDto;
use App\Modules\Telegram\Dtos\RequestDto;
use Cerbero\Dto\Dto;
use Telegram\Bot\Api as TelegramApi;
use Telegram\Bot\Objects\Update;

/**
 * Class Mediator
 * @package App\Modules\Telegram\Components
 */
class Mediator
{
    private TelegramApi $telegram;

    /**
     * Mediator constructor.
     */
    public function __construct()
    {
        $this->telegram = new TelegramApi('');
    }

    /**
     * @return Mediator
     */
    public static function init()
    {
        return new self();
    }

    /**
     * @param ActionDto $action
     */
    public function send(ActionDto $action): void
    {
        $this->telegram->{$action->action}($action->params);
    }

    /**
     * @return RequestDto|Dto
     */
    public function getWebhookUpdate(): RequestDto
    {
        $request = $this->telegram->getWebhookUpdate();
        return $this->buildDto($request);
    }

    /**
     * @param Update $update
     * @return RequestDto|Dto
     */
    private function buildDto(Update $update): RequestDto
    {
        return RequestDto::make([
            'data' => $update->message->text ?? $update->callback_query->data ?? '',
            'tid' => $update->message->from->id ?? $update->callback_query->from->id,
            'chatId' => $update->message->chat->id ?? $update->callback_query->message->chat->id,
            'login' => $update->message->from->username ?? $update->callback_query->from->username,
            'firstName' => $update->message->from->last_name ?? $update->callback_query->from->last_name,
            'lastName' => $update->message->from->first_name ?? $update->callback_query->from->first_name,
            'request' => $update,
            'contact' => $update->message->contact ?? null,
        ]);
    }
}
