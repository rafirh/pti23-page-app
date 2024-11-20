<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreTeam extends Model
{
    use HasFactory;

    protected $table = 'core_teams';

    protected $fillable = [
        'position',
        'order',
    ];

    protected $fields = [
        'position',
        'order',
    ];

    static $sortables = [
        'position' => 'Divisi',
        'order' => 'Urutan',
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
                $query->where('position', 'like', '%' . $options['q'] . '%');
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