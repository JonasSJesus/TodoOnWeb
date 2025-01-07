<?php

namespace Todo\Controller;

interface Controller
{
    public function request(): void;
    public function addRequest();
    public function updateRequest();
    public function deleteRequest();
    public function readRequest();
}
