<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'body' => $this->body,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'car_body_id' => $this->car_body_id
        ];
    }

    /**
     * Настроить исходящий ответ для ресурса.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]);
    }
}
