<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class address extends Model
{
    use HasFactory;
    use HasHashid, HashidRouting;

    // /**
    //  * fillable
    //  *
    // @var array
    //  */
    protected $appends = ['hashid'];
    protected $fillable = [

        'user_id',
        'nombre',
        'postal',
        'estado',
        'municipio',
        'colonia',
        'calle',
        'exterior',
        'interior',
        'calle1',
        'calle2',
        'tipo',
        'telefono',
        'extra',
    ];

    public static function validate($request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'nombre' => 'required|max:255',
            'postal' => 'required|max:255',
            'estado' => 'required|max:255',
            'municipio' => 'required|max:255',
            'colonia' => 'required|max:255',
            'calle' => 'required|max:255',
            'exterior' => 'required|max:255',
            'interior' => 'required|max:255',
            'calle1' => 'required|max:255',
            'calle2' => 'required|max:255',
            'tipo' => 'required|max:255',
            'telefono' => 'required|max:255',
            'extra' => 'required|max:255',
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getNombre()
    {
        return $this->attributes['nombre'];
    }

    public function setNombre($nombre)
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function getPostal()
    {
        return $this->attributes['postal'];
    }

    public function setPostal($postal)
    {
        $this->attributes['postal'] = $postal;
    }

    public function getEstado()
    {
        return $this->attributes['estado'];
    }

    public function setEstado($estado)
    {
        $this->attributes['estado'] = $estado;
    }

    public function getMunicipio()
    {
        return $this->attributes['municipio'];
    }

    public function setMunicipio($municipio)
    {
        $this->attributes['municipio'] = $municipio;
    }

    public function getColonia()
    {
        return $this->attributes['colonia'];
    }

    public function setColonia($colonia)
    {
        $this->attributes['colonia'] = $colonia;
    }

    public function getCalle()
    {
        return $this->attributes['calle'];
    }

    public function setCalle($calle)
    {
        $this->attributes['calle'] = $calle;
    }

    public function getExterior()
    {
        return $this->attributes['exterior'];
    }

    public function setExterior($exterior)
    {
        $this->attributes['exterior'] = $exterior;
    }

    public function getInterior()
    {
        return $this->attributes['interior'];
    }

    public function setInterior($interior)
    {
        $this->attributes['interior'] = $interior;
    }

    public function getCalle1()
    {
        return $this->attributes['calle1'];
    }

    public function setCalle1($calle1)
    {
        $this->attributes['calle1'] = $calle1;
    }

    public function getCalle2()
    {
        return $this->attributes['calle2'];
    }

    public function setCalle2($calle2)
    {
        $this->attributes['calle2'] = $calle2;
    }

    public function getTipo()
    {
        return $this->attributes['tipo'];
    }

    public function setTipo($tipo)
    {
        $this->attributes['tipo'] = $tipo;
    }

    public function getTelefono()
    {
        return $this->attributes['telefono'];
    }

    public function setTelefono($telefono)
    {
        $this->attributes['telefono'] = $telefono;
    }

    public function getExtra()
    {
        return $this->attributes['extra'];
    }

    public function setExtra($extra)
    {
        $this->attributes['extra'] = $extra;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }
}
