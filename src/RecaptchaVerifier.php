<?php

namespace Chistowick\Raspberry;

/**
 * The class that helps you quickly and easily check the reCAPTCHA v2 user response token.
 */
class RecaptchaVerifier
{
    /**
     * Checks a reCAPTCHA user response token
     *
     * @param string $token reCAPTCHA user response token
     * @param string $secret your reCAPTCHA secret key
     * @return bool The result of the check
     **/
    public static function verify(string $token, string $secret): bool
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $secret,
            'response' => $token,
        ]);
        $response_json = curl_exec($ch);
        curl_close($ch);

        return json_decode($response_json)->success ? true : false;
    }
}
