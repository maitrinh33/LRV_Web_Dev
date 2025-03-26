<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Service extends Model
{
    use HasFactory, Searchable;

    public function searchable(): string
    {
        return 'services_index';
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'offered_services' => $this->offered_services,
        ];
    }
    
    protected $fillable = ['name', 'slug', 'description', 'image_path', 'offered_services'];
    
}
