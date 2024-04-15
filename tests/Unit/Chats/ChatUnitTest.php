<?php

namespace Tests\Unit\Chats;

use App\Models\Chat;
use PHPUnit\Framework\TestCase;

class ChatUnitTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $chat = Chat::first();
        $this->assertTrue(isset($chat->id));
    }
}
