<?php

namespace Todo\Helper;

trait FlashMessagesTrait
{
    private function errorMessages(string $message)
    {
        $_SESSION['error'] = $message;
    }
}