<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Gabarit extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'gabarits';

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
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function gabaritGestionPages()
    {
        return $this->hasMany(GestionPage::class, 'gabarit_id', 'id');
    }

    public function gabaritConfigs()
    {
        return $this->belongsToMany(Config::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot(array('gabarit_id', 'item_id'));
    }
}
