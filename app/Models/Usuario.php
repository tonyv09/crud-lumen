<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/** 
 * @property string name
 * @property string username
 * @property string email
 * @property string password
 * @property string api_token
*/ 
class Usuario extends Model
{
  
    protected $id;
    protected $nombre_usuario;
    protected $usuario;
    protected $estado;

}

?>