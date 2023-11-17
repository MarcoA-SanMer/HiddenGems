<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function getExchangeRate($fromCurrency, $toCurrency)
    {
        try {
            // Obtener la clave de acceso desde la configuración o variables de entorno
            $accessKey = config('services.currencylayer.access_key'); // Ajusta la clave según tus necesidades
           
            // Hacer la solicitud a la API de CurrencyLayer
            $client = new Client();
            $response = $client->request('GET', "http://api.currencylayer.com/live?access_key=$accessKey&currencies=$toCurrency&source=$fromCurrency");

            // Decodificar la respuesta JSON
            $data = json_decode($response->getBody(), true);
            
            // Verificar si la respuesta contiene la información esperada
            if (isset($data['quotes'][$fromCurrency.$toCurrency])) {
                // Devolver la tasa de cambio
                return response()->json(['exchangeRate' => $data['quotes'][$fromCurrency.$toCurrency]]);
            } else {
                // Manejar el caso en el que la respuesta de la API no tiene el formato esperado
                return response()->json(['error' => 'Respuesta de API inesperada'], 500);
            }
        } catch (RequestException $e) {
            // Manejar errores de solicitud (por ejemplo, conexión fallida)
            return response()->json(['error' => 'Error de conexión con la API'], 500);
        } catch (\Exception $e) {
            // Manejar otros errores inesperados
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
