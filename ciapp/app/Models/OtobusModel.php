<?php 
namespace App\Models;

use CodeIgniter\Model;

class OtobusModel extends Model
{
    protected $table = 'OTOBUS';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ID','Aktif', 'Isim', 'Plaka', 'KoltukSayisi'];

    public function customQuery()
    {
        // Özel SQL sorgusunu oluşturun
        $query = $this->db->query('SELECT ID, Aktif, Isim, Plaka, KoltukSayisi FROM OTOBUS');

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
        $this->db->query('INSERT INTO OTOBUS (Isim, Plaka, KoltukSayisi, Aktif) VALUES (?, ?, ?, ?);',array($data['Isim'], $data['Plaka'], $data['KoltukSayisi'], $data['Aktif']));
    }

    public function getOtobusList()
    {
        return $this->findAll();
    }

    public function deleteOtobus($id)
    {
        $this->db->query('DELETE FROM OTOBUS WHERE ID = ?;',array($id));
    }
}
?>