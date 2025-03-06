<?php

namespace Todo\Helper;

trait FlashMessagesTrait
{
    private function errorMessages(string $message)
    {
        $_SESSION['error_message'] = $message;
        return $this;
    }

    private function withHeader(string $header)
    {
        header($header);
        return $this;
    }
}