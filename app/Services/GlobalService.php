<?php


namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use SoapClient;

class GlobalService
{
    /**
     * @param array $customerData
     *
     * @return bool|null
     */
    public static function checkTCIdentity(array $customerData): bool|null
    {
        $client = new \SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");

        try {
            $result = $client->TCKimlikNoDogrula([
                'TCKimlikNo' => $customerData['identity_no'],
                'Ad' => $customerData['name'],
                'Soyad' => $customerData['surname'],
                'DogumYili' => $customerData['birth_year'],
            ]);

            if ($result->TCKimlikNoDogrulaResult) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            echo $e->faultstring;
        }

        return null;
    }
}
