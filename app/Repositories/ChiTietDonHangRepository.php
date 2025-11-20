<?php
namespace App\Repositories;

use App\Core\Database;
use PDO;

class ChiTietDonHangRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function addChiTiet(int $idDH, int $idSP, int $soLuong, float $giaLucMua): bool
    {
        $stm = $this->db->prepare("
            INSERT INTO chitietdonhang (MA_DH, MA_SP, SO_LUONG, GIA_LUC_MUA)
            VALUES (?, ?, ?, ?)
        ");

        return $stm->execute([$idDH, $idSP, $soLuong, $giaLucMua]);
    }
}
