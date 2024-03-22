<?php 
namespace App\Models;

use CodeIgniter\Model;

class OtobusModel extends Model
{
    protected $table = 'otobus';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ID','Aktif', 'Isim', 'Plaka', 'KoltukSayisi'];

    public function customQuery()
    {
        // Özel SQL sorgusunu oluşturun
        $query = $this->db->query('SELECT ID, Aktif, Isim, Plaka, KoltukSayisi FROM otobus');

        // Sorgudan sonuçları alın
        return $query->getResultArray();
    }

    public function getOtobusByID($id)
    {
        return $this->find($id);
    }

    public function updateOtobus($id, $data)
    {
        $this->db->query('UPDATE OTOBUS 
                        SET Isim = ?, 
                        Plaka = ?, 
                        KoltukSayisi = ?, 
                        Aktif = ?
                        WHERE ID = ?;',array($data['Isim'], $data['Plaka'], $data['KoltukSayisi'], $data['Aktif'], $id));
    }

    public function insertOtobus($data)
    {
        return $this->insert($data);
    }

    public function getOtobusList()
    {
        return $this->findAll();
    }

    public function deleteOtobus($id)
    {
        return $this->delete($id);
    }
}
?>