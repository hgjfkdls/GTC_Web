<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificacion';
    //
    protected $fillable = ['id_padre', 'id_obra', 'id_usuario', 'nombre'];

    public function documentos()
    {
        return $this->belongsToMany('App\Correspondencia', 'correspondencia_clasificacion', 'id_clasificacion', 'id_correspondencia');
    }

    public function hijas()
    {
        return static::where('id_padre', $this->id);
    }

    public function level($level = 0)
    {
        if (is_null($this->id_padre)) return $level;
        return Clasificacion::find($this->id_padre)->level($level + 1);
    }
}
