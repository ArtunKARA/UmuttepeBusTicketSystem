<?php 
namespace App\Models;

use CodeIgniter\Model;

class OtobusModel extends Model
{
    protected $table = 'otobus';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ID','Aktif', 'Isim', 'Plaka', 'KoltukSayisi'];
}
?>