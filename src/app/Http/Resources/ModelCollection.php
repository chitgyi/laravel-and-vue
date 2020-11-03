<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ModelCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            "code" => 200,
            "message" => "Success",
            "data" => parent::toArray($request),
            "meta" => [
                "current_page" =>  $this->currentPage(),
                "next_page_url" => $this->nextPageUrl(),
                "pre_page_url" => $this->previousPageUrl(),
                "last_page_no" => $this->lastPage(),
                "per_page" => $this->perPage(),
                "total" => $this->total()
            ]
        ];
    }
}
