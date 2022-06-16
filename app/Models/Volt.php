<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Volt extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'proprietario_id', 'status'
    ];

    protected $appends = [
        'status_string'
    ];

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class);
    }

    public function getStatusStringAttribute()
    {
        return $this->status ? 'Ativo' : 'Inativo';
    }

    public function scopeFilter(Builder $query, $keeper)
    {
        return $query
            ->when($keeper->get('nameTerm'), function ($query, $term) {
                return $query->where('name', 'ilike', "%{$term}%");
            })
            ->when($keeper->get('importante'), function ($query, $importante) {
                return $query->where('importante', true);
            })
            ->when(in_array($keeper->get('status'), ['0', '1'], true), function ($query) use ($keeper) {
                return $query->where('status', $keeper->get('status'));
            })
            ->when($keeper->get('orderBy'), function (Builder $query, $orderBy) {
                if ($orderBy['column'] == 'proprietario') {
                    return $query->orderBy(
                        Proprietario::select('nome')->whereColumn('proprietarios.id', 'volts.proprietario_id'),
                        $orderBy['direction']
                    );
                }
                return $query->orderBy($orderBy['column'], $orderBy['direction']);
            });
    }

    public function scopeImportante(Builder $query)
    {
        return $query->where('importante', true);
    }
}
