<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "task_id"=> $this->id,
            "task_name"=> $this->name,
            "task_description"=> $this->description,
            "task_category_id"=> $this->category->id
        ];
    }
}
