<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $cedula
 * @property $email
 * @property $pais
 * @property $direccion
 * @property $celular
 * @property $categoria_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'nombres' => 'required',
		'apellidos' => 'required',
		'cedula' => 'required',
		'email' => 'required',
		'pais' => 'required',
		'direccion' => 'required',
		'celular' => 'required',
		'categoria_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','cedula','email','pais','direccion','celular','categoria_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria', 'id', 'categoria_id');
    }
    

}
