<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Commande extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'commandes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'client_id',
        'statut',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUT_SELECT = [
        '0' => 'En attente',
        '1' => 'Confirmer',
        '2' => 'Envoyer',
        '3' => 'Terminer',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        Commande::observe(new \App\Observers\CommandeActionObserver);
    }

    public function client()
    {
        return $this->belongsTo(CrmCustomer::class, 'client_id');
    }

    public function produits()
    {
        return $this->belongsToMany(Product::class);
    }
}
