<?php
namespace App\Repositories;

use App\Core\Database;
use PDO;

class ChiTietGioHangRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function updateItem(int $idGH, int $idSP, int $soLuong): bool
    {
        $stm = $this->db->prepare("
            UPDATE chitietgiohang 
            SET SO_LUONG = ?
            WHERE MA_GH = ? AND MA_SP = ?
        ");
        return $stm->execute([$soLuong, $idGH, $idSP]);
    }

    public function addItem(int $idGH, int $idSP, int $soLuong): bool
    {
        $stm = $this->db->prepare("
            INSERT INTO chitietgiohang (MA_GH, MA_SP, SO_LUONG)
            VALUES (?, ?, ?)
        ");
        return $stm->execute([$idGH, $idSP, $soLuong]);
    }

    public function deleteItem(int $idGH, int $idSP): bool
    {
        $stm = $this->db->prepare("
            DELETE FROM chitietgiohang 
            WHERE MA_GH = ? AND MA_SP = ?
        ");
        return $stm->execute([$idGH, $idSP]);
    }
}
