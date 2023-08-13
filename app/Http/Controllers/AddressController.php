<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressPostRequest;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Services\GetAddressFromApi;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request){
        $addresses = Address::streetOrZipCode($request->address)
        ->select(
            'city',
            'id',
            'neighborhood',
            'street', 
            'uf',
            'zip_code', 
        )->get();

        if ($addresses->isEmpty()) {
            $search = removeAccents(formatStreetName($request->address));
            $apiService = new GetAddressFromApi;
            $result = $apiService->execute($search);
            
            if (isset($result->erro)) {
                return response()->json(['message' => 'Não há endereços cadastrados'], 400);
            } 
            
            $result = Address::create($result);

            return AddressResource::collection($result);
        }

        return AddressResource::collection($addresses);
    }

    public function store(StoreAddressRequest $request){
        $validatedData = $request->validated();

        $address = Address::create($validatedData);

        return (new AddressResource($address))->response()->setStatusCode(201);
    }
    
    public function show($zip_code){
        try {
            $address = Address::where('zip_code', $zip_code)
                ->firstOrFail([
                    'city',
                    'id',
                    'neighborhood',
                    'street', 
                    'uf',
                    'zip_code', 
                ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Cep não encontrado!"
            ], 404  );
        }

        return AddressResource::make($address);
    }

    public function destroy($address_id){
        try {
            $address = Address::findOrFail($address_id);

            $address->delete();
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Endereço não encontrado!"
            ], 404);
        }

        return response()->json(['message' => 'Endereço excluído com sucesso!'], 200);
    }

    public function update(UpdateAddressRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();

            $address = Address::findOrFail($id);
            
            $address->update($validatedData);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Falha ao atualizar endereço.'], 500);
        }

        return response()->json([
            'data' => new AddressResource($address),
            'message' => 'Endereço atualizado com sucesso!'
        ], 200);
    }
  }