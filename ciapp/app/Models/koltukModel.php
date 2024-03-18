<?php
namespace App\Models;

use CodeIgniter\Model;

class KoltukModel extends Model
{

    protected $primaryKey = 'SeferID';
    protected $allowedFields = ['SeferID', 'BiletID', 'KoltukNo','OturanCinsiyeti'];

        public function getKoltuklar($id){
                $query = $this->db->query('     SELECT 
                                                    s.ID AS SeferID,
                                                    b.ID AS BiletID,
                                                    CASE 
                                                        WHEN b.ID IS NOT NULL THEN \'Dolu\'
                                                        ELSE \'Boş\'
                                                    END AS Durum,
                                                    b.KoltukNo,
                                                    CASE
                                                        WHEN k.Cinsiyet = 1 THEN \'Kız\'
                                                        WHEN k.Cinsiyet = 0 THEN \'Erkek\'
                                                        ELSE \'Belirtilmemiş\'
                                                    END AS OturanCinsiyeti
                                                FROM 
                                                    SEFER s
                                                LEFT JOIN 
                                                    BILET b ON s.ID = b.SeferID
                                                LEFT JOIN 
                                                    KULLANICI k ON b.KullaniciID = k.ID
                                                LEFT JOIN 
                                                    KULANICIOLMAYAN ko ON b.KullaniciOlmayanID = ko.ID
                                                WHERE 
                                                    s.ID = ?
                                                ORDER BY 
                                                    b.KoltukNo ASC;
                ',array($id));
                return $query->getResultArray();
            }
        }
    ?>