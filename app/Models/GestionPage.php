<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class GestionPage extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'gestion_pages';

    public static $searchable = [
        'nom',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'pageData',
        'gabarit_id',
        'parent_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function parentGestionPages()
    {
        return $this->hasMany(GestionPage::class, 'parent_id', 'id');
    }

    public function gabarit()
    {
        return $this->belongsTo(Gabarit::class, 'gabarit_id');
    }

    public function pageitems()
    {
        return $this->hasMany(Item::class);
    }

    public function parent()
    {
        return $this->belongsTo(GestionPage::class, 'parent_id');
    }
}
