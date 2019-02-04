<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/** 
 * @property string nombre_usuario
 * @property string usuario
 * @property string estado
*/ 
class Usuario extends Model
{
  
    protected $id;
    protected $nombre_usuario;
    protected $usuario;
    protected $estado;

}

?>