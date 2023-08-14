<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street', 'city', 'uf', 'zip_code', 'neighborhood'
    ];

    public function setZipCodeAttribute($value)
    {
        $this->attributes['zip_code'] = strtoupper(preg_replace('/[^0-9]/', '', $value));
    }

    public function setUfAttribute($value)
    {
        $this->attributes['uf'] = strtoupper($value);
    }

    public function scopeStreetOrZipCode(Builder $query, $value)
    {
        if ($value) {
            return $query->where(function ($query) use ($value) {
                $query->where('street', 'LIKE', '%' . $value . '%')
                    ->orWhere('zip_code', $value);
            });
        }
        return $query;
    }
}
