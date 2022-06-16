<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proprietario extends Model
{
    use HasFactory;

    public function options()
    {
        return self::query()
            ->orderBy('nome')
            ->get()
            ->map(function ($item) {
                return [
                    'value' => $item->id,
                    'text' => $item->nome
                ];
            });
    }
}
