<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorResponse extends JsonResponse
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
        $this->status = ResponseType::ERROR;
    }

}
