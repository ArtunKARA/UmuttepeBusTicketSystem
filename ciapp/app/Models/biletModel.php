<?php 
namespace App\Models;

use CodeIgniter\Model;

class BiletModel extends Model{
    public function getBiletler($id){
        $query = $this->db->query('SELECT 
                                        s1.Sehir AS KalkisSehri,
                                        s2.Sehir AS VarisSehri,
                                        sef.KalkisSaat,
                                        bil.Tarih,
                                        CASE 
                                            WHEN k.TcVatandas = 1 THEN k.Isim 
                                            ELSE ko.Isim 
                                        END AS YolcuAdi,
                                        bil.PNR,
                                        bil.KoltukNo,
                                        bil.BiletUcret,
                                        CASE 
                                            WHEN bil.BiletTur = \'a\' THEN \'Aktif\'
                                            WHEN bil.BiletTur = \'g\' THEN \'Geçmiş\'
                                            WHEN bil.BiletTur = \'r\' THEN \'Rezervasyon\'
                                            WHEN bil.BiletTur = \'p\' THEN \'Açığa Alınanlar\'
                                            ELSE \'Bilinmeyen\'
                                        END AS BiletTipi
                                    FROM BILET bil
                                    INNER JOIN SEFER sef ON bil.SeferID = sef.ID
                                    LEFT JOIN KULLANICI k ON bil.KullaniciID = k.ID
                                    LEFT JOIN KULANICIOLMAYAN ko ON bil.KullaniciOlmayanID = ko.ID
                                    LEFT JOIN SEHIR s1 ON sef.KalkisSehirID = s1.ID
                                    LEFT JOIN SEHIR s2 ON sef.VarisSehirID = s2.ID
                                    WHERE
                                    k.ID = ?;
        ',array($id));
        return $query->getResultArray();
    }

    public function biletAksiyon($id,$aksiyon){

        switch($aksiyon){
            case 'iptal':
                $query = $this->db->query('UPDATE BILET SET BiletTur = \'g\' WHERE ID = ?;',array($id));
                break;
            case 'rezervasyon':
                $query = $this->db->query('UPDATE BILET SET BiletTur = \'r\' WHERE ID = ?;',array($id));
                break;
            case 'acigaal':
                $query = $this->db->query('UPDATE BILET SET BiletTur = \'p\' WHERE ID = ?;',array($id));
                break;
            default:
                return false;
        }
    } 
}
?>