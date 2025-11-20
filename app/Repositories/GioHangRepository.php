<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\GioHang;
use App\Models\ChiTietGioHang;
use App\Models\MonAn;
use PDO;

class GioHangRepository
{
    private PDO $db;
    private MonAnRepository $monAnRepo;

    public function __construct()
    {
        $this->db = Database::getConnection();
        $this->monAnRepo = new MonAnRepository();
    }

    public function findActiveByKhachHang(int $idKH): ?GioHang
    {
        $stm = $this->db->prepare("SELECT * FROM giohang WHERE MA_KH = ?");
        $stm->execute([$idKH]);

        $row = $stm->fetch(PDO::FETCH_ASSOC);
        if (!$row)
            return null;

        $items = $this->getItems($row['MA_GH']);

        return new GioHang($row['MA_GH'], $row['MA_KH'], $items, new \DateTime($row['NGAY']))
        ;
    }

    private function getItems(int $idGH): array
    {
        $stm = $this->db->prepare("SELECT * FROM chitietgiohang WHERE MA_GH = ?");
        $stm->execute([$idGH]);

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

        $items = [];
        foreach ($rows as $r) {
            $monAn = $this->monAnRepo->findById($r['MA_SP']);
            $items[] = new ChiTietGioHang(
                $idGH,
                $r['MA_SP'],
                $r['SO_LUONG'],
                $monAn
            );
        }

        return $items;
    }
}
