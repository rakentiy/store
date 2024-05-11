<?php

declare(strict_types=1);

namespace App\Services\Telegram;


use Illuminate\Support\Facades\Http;

final class TelegramBotApi
{
    public const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $message): bool
    {
        $url = self::HOST . $token . '/sendMessage';

        try {
            $response = Http::get($url, [
                'chat_id' => $chatId,
                'text' => $message,
            ]);

            return $response->successful();
        } catch (\Throwable $e) {
            Log::error('Failed to send message: ' . $e->getMessage());
            return false;
        }

    }
}
