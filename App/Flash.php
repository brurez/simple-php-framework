<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 30/11/17
 * Time: 13:45
 */

namespace App;


class Flash
{
    const SUCCESS = 'success';
    const INFO = 'info';
    const WARNING = 'warning';

    public static function addMessage(string $message, $type = 'success'): void
    {
        if (!isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }

        $_SESSION['flash_notifications'][] = [
            'body' => $message,
            'type' => $type
        ];
    }

    public static function getMessages(): array
    {
        if (isset($_SESSION['flash_notifications'])) {
            $messages = $_SESSION['flash_notifications'];
            unset($_SESSION['flash_notifications']);
        }
        return $messages ?? [];
    }
}