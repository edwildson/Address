<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;

class CepController extends Controller
{
  
    public function getCEP($cep){
  
      
      if (Address::where('cep', $cep)->exists()){
          $CEP = Address::where('cep', $cep)
          ->get(['cep', 
          'logradouro', 
          'complemento', 
          'bairro', 
          'localidade',
          'uf','ibge']);
  
                  
          return response()->json($CEP, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE);
      }else{
          return response()->json([
              "erro" => "endereço inválido"
          ], 404  );
      }
    }
    
  }