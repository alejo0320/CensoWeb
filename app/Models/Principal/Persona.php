<?php

namespace App\Models\Principal;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primarykey = 'id_persona';
    protected $fillable = [
    	'id_tipo_doc',
    	'identificacion',
    	'nombre_1',
    	'nombre_2',
    	'apellido_1',
    	'apellido_2',
    	'telefono',
    	'direccion',
    	'id_genero',
    	'id_estado_civil',
    	'cabeza_familia',
    	'id_niveleducativo',
    	'id_grupo_familiar',
        'id_ocupacion',
        'id_parentesco'
    ];

    public function tipo_doc()
    {
    	return $this->hasOne('App\Models\Catalogos\Tipo_Doc');
    }

    public function genero()
    {
    	return $this->hasOne('App\Models\Catalogos\Genero');
    }

    public function estado_civil()
    {
    	return $this->hasOne('App\Models\Catalogos\Estado_Civil');
    }

    public function nivel_educativo()
    {
    	return $this->hasOne('App\Models\Catalogos\Nivel_Educativo');
    }

    public function ocupacion()
    {
    	return $this->hasOne('App\Models\Catalogos\Ocupacion');
    }

    public function grupo_familiar()
    {
    	//return $this->hasOne('App\Models\Principal\Grupo_Familiar');
        return $this->hasOne(Grupo_Familiar::class,'id');
    }

    public function parentesco()
    {
    	return $this->hasOne('App\Models\Catalogos\Parentesco');
    }

    public function getFullNameAttribute()
    {
        return $this->nombre_1 . ' ' . $this->nombre_2 .' '. $this->apellido_1 . ' ' . $this->apellido_2;
    }
}
