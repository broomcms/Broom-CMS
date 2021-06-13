<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Item extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'items';

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
        'champs',
        'valeur',
        'required',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CHAMPS_SELECT = [
        'text'      => 'Text',
        'textarea'  => 'Textarea',
        'dropdown'  => 'Dropdown',
        'date'      => 'Date',
        'daterange' => 'Daterange',
        'datetime'  => 'Datetime',
        'WYSIWYG'   => 'WYSIWYG',
        'radio'     => 'Radio',
        'checkbox'  => 'Checkbox',
        'image'     => 'Image',
        'file'      => 'File',
        'video'     => 'Video',
    ];

    const REQUIRED_SELECT = [
        '1'      => 'Not required',
        '2'  => 'Required',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function itemsGabarits()
    {
        return $this->belongsToMany(Gabarit::class);
    }
}
