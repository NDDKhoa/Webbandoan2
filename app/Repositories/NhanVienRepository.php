<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\NhanVien;
use PDO;

class NhanVienRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByAccount(string $username): ?NhanVien
    {
        $stm = $this->db->prepare("SELECT * FROM nhanvien WHERE TAI_KHOAN = ?");
        $stm->execute([$username]);
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        return $row ? new NhanVien($row['MA_NV'], $row['TAI_KHOAN'], $row['MAT_KHAU']) : null;
    }
}
