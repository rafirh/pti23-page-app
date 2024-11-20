<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    protected $fields = [
        'name',
        'email',
        'phone',
    ];

    static $sortables = [
        'name' => 'Nama',
        'email' => 'Email',
        'phone' => 'Telepon',
    ];

    static $allowedParams = [
        'limit',
        'q',
        'sortby',
    ];

    public function scopeOptions($query, $options)
    {
        if (isset($options['q'])) {
            $query->where(function ($query) use ($options) {
                $query->where('name', 'like', '%' . $options['q'] . '%')
                    ->orWhere('email', 'like', '%' . $options['q'] . '%')
                    ->orWhere('phone', 'like', '%' . $options['q'] . '%');
            });
        }

        if (isset($options['sortby']) && in_array($options['sortby'], $this->fields)) {
            if (!isset($options['order'])) {
                $options['order'] = 'asc';
            }
            $query->orderBy($options['sortby'], validateAndGetOrder($options['order']));
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query;
    }
}