<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessResponse extends JsonResponse
{
    use HasFactory;

    public function __construct()
    {
        $this->status = ResponseType::SUCCESS;
    }

}
