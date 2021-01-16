<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Chistowick\Raspberry\RecaptchaVerifier;

class RecaptchaVerifierTest extends TestCase
{
    public function testIfATokenOrSecretKeyIsIncorrectTheResultIsFalse(): void
    {
        $symbols = '0123456789abcdefghijklmnopqrstuvwxyz';
        $this->assertFalse(RecaptchaVerifier::verify(str_shuffle($symbols), str_shuffle($symbols)));
    }
}
