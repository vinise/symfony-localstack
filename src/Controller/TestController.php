<?php

declare(strict_types=1);

namespace App\Controller;

use App\Message\TestMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route(path: '', name: 'home', methods: [Request::METHOD_GET])]
    public function dashboard(): Response
    {
        return new Response("OK");
    }

    #[Route(path: '/sqs', name: 'sqs', methods: [Request::METHOD_GET])]
    public function sqs(
        MessageBusInterface $messageBus,
    ): Response
    {
        $messageBus->dispatch(new TestMessage("hello world"));

        return new Response("OK");
    }
}
