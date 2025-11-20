<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\LoaiMonAn;
use PDO;

class LoaiMonAnRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        $rows = $this->db->query("SELECT * FROM loaisp")->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($r) => new LoaiMonAn($r['MA_LOAI'], $r['TEN_LOAI']), $rows);
    }
}
