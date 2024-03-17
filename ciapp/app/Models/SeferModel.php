<?php 
namespace App\Models;

use CodeIgniter\Model;

class SeferModel extends Model
{
    protected $table = 'sefer';
    protected $primaryKey = 'SeferID';
    protected $allowedFields = ['SeferID', 'KalkisSehri', 'VarisSehri', 'OtobusIsim', 'KoltukSayisi', 'KalkisSaat', 'VarisSaat','Durum'];

    public function getAllSefer()
    {
        $query = $this->db->query('SELECT 
                                S.ID AS SeferID, 
                                KSehir.Sehir AS KalkisSehri, 
                                VSehir.Sehir AS VarisSehri, 
                                Otobus.Isim AS OtobusIsim,
                                Otobus.KoltukSayisi AS KoltukSayisi,
                                S.KalkisSaat, 
                                S.VarisSaat, 
                                S.Fiyat, 
                                CASE 
                                    WHEN S.Aktif = 1 THEN \'Aktif\' 
                                    ELSE \'Pasif\' 
                                END AS Durum 
                            FROM 
                                SEFER S
                            INNER JOIN 
                                SEHIR KSehir ON S.KalkisSehirID = KSehir.ID
                            INNER JOIN 
                                SEHIR VSehir ON S.VarisSehirID = VSehir.ID
                            INNER JOIN 
                                OTOBUS ON S.OtobusID = OTOBUS.ID;');
        return $query->getResultArray();
    }

    public function getTekSefer($id)
    {
        $query = $this->db->query('SELECT 
                                S.ID AS SeferID, 
                                KSehir.Sehir AS KalkisSehri, 
                                VSehir.Sehir AS VarisSehri, 
                                Otobus.Isim AS OtobusIsim,
                                Otobus.KoltukSayisi AS KoltukSayisi,
                                S.KalkisSaat, 
                                S.VarisSaat, 
                                S.Fiyat, 
                                CASE 
                                    WHEN S.Aktif = 1 THEN \'Aktif\' 
                                    ELSE \'Pasif\' 
                                END AS Durum 
                            FROM 
                                SEFER S
                            INNER JOIN 
                                SEHIR KSehir ON S.KalkisSehirID = KSehir.ID
                            INNER JOIN 
                                SEHIR VSehir ON S.VarisSehirID = VSehir.ID
                            INNER JOIN 
                                OTOBUS ON S.OtobusID = OTOBUS.ID
                            WHERE 
                                S.ID = ?;',array($id));
        return $query->getRowArray();
    }
    
   
}
?>