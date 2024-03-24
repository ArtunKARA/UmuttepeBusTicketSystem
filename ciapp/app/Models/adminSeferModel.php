<?php 
namespace App\Models;

use CodeIgniter\Model;

class AdminSeferModel extends Model{


   public function getAllSeferler(){
    $query = $this->db->query('SELECT 
                                SEFER.ID AS SeferID,
                                KALKIS_SEHIR.Sehir AS KalkisSehri,
                                KALKIS_SEHIR.TeriminalAdi AS KalkisTermini,
                                VARIS_SEHIR.Sehir AS VarisSehri,
                                VARIS_SEHIR.TeriminalAdi AS VarisTermini,
                                OTOBUS.Isim AS OtobusIsim,
                                OTOBUS.Plaka AS OtobusPlaka,
                                SEFER.KalkisSaat,
                                SEFER.VarisSaat,
                                SEFER.Fiyat,
                                CASE
                                    WHEN SEFER.Aktif = 1 THEN \'Aktif\'
                                    ELSE \'Pasif\'
                                END AS Durum
                            FROM 
                                SEFER
                            INNER JOIN 
                                SEHIR AS KALKIS_SEHIR ON SEFER.KalkisSehirID = KALKIS_SEHIR.ID
                            INNER JOIN 
                                SEHIR AS VARIS_SEHIR ON SEFER.VarisSehirID = VARIS_SEHIR.ID
                            INNER JOIN 
                                OTOBUS ON SEFER.OtobusID = OTOBUS.ID;');
    return $query->getResultArray();
   }

   public function getSeferByID($id)
   {
       return $this->find($id);
   }


}



?>