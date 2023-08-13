<?php
namespace App\Services;

use Exception;

class GetAddressFromApi
{
    public function execute($search)
    {
        $address = null;

        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept: application/json\r\n"
            ]
        ];

        $context = stream_context_create($opts);

        if ($this->isCEP($search)) {
            try {
                $address = json_decode(file_get_contents("https://viacep.com.br/ws/$search/json", false, $context));
            } catch (Exception $e) {}
        }
        if (is_null($address)) {
            try {
                $address = json_decode(file_get_contents("http://cep.la/logradouro/$search/", false, $context));
            } catch (Exception $e) {}
        }

        return is_array($address) ? $address[0] : $address;
    }

    private function isCEP($value)
    {
        if (is_numeric($value) || is_numeric(str_replace('-', '', $value)))
            return true;
        return false;
    }
}