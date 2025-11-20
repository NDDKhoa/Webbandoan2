<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\MonAn;
use PDO;

class MonAnRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // ... Các hàm findById, findAll, save, delete giữ nguyên ...
    // ... Hàm mapToModel giữ nguyên ...

    // BỔ SUNG HÀM SEARCH (Logic tách từ index.php cũ)
    public function search(array $filters, int $limit, int $page): array
    {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM sanpham WHERE TINH_TRANG = 1";
        $params = [];

        // Xây dựng điều kiện WHERE (Copy logic từ index.php)
        list($sql, $params) = $this->buildWhereClause($sql, $params, $filters);

        // Sắp xếp
        if (!empty($filters['sort'])) {
            if ($filters['sort'] === 'asc')
                $sql .= " ORDER BY GIA ASC"; // Lưu ý: Database bạn là GIA hay GIA_CA?
            if ($filters['sort'] === 'desc')
                $sql .= " ORDER BY GIA DESC";
        }

        // Phân trang
        $sql .= " LIMIT " . (int) $limit . " OFFSET " . (int) $offset;

        $stm = $this->db->prepare($sql);
        $stm->execute($params);

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($r) => $this->mapToModel($r), $rows);
    }

    // BỔ SUNG HÀM ĐẾM TỔNG (Để phân trang)
    public function countSearch(array $filters): int
    {
        $sql = "SELECT COUNT(*) as total FROM sanpham WHERE TINH_TRANG = 1";
        $params = [];

        list($sql, $params) = $this->buildWhereClause($sql, $params, $filters);

        $stm = $this->db->prepare($sql);
        $stm->execute($params);
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        return (int) $row['total'];
    }

    // Hàm phụ trợ để ghép chuỗi SQL (Tránh lặp code)
    private function buildWhereClause($sql, $params, $filters)
    {
        if (!empty($filters['keyword'])) {
            $sql .= " AND TEN_SP LIKE ?";
            $params[] = "%" . $filters['keyword'] . "%";
        }

        // Logic cũ: category hoặc Type đều là MA_LOAI
        if (!empty($filters['category'])) {
            $sql .= " AND MA_LOAI = ?"; // Lưu ý: Database bạn là MA_LOAI hay MA_LOAISP?
            $params[] = $filters['category'];
        } elseif (!empty($filters['Type'])) {
            $sql .= " AND MA_LOAI = ?";
            $params[] = $filters['Type'];
        }

        if (!empty($filters['min_price'])) {
            $sql .= " AND GIA >= ?";
            $params[] = $filters['min_price'];
        }
        if (!empty($filters['max_price'])) {
            $sql .= " AND GIA <= ?";
            $params[] = $filters['max_price'];
        }

        return [$sql, $params];
    }

    private function mapToModel(array $row): MonAn
    {
        // Đảm bảo các key này KHỚP 100% với tên cột trong Database của bạn
        return new MonAn(
            $row['MA_SP'],
            $row['TEN_SP'],
            $row['GIA'],          // Kiểm tra lại: GIA hay GIA_CA?
            $row['MO_TA'],
            $row['HINH_ANH'],
            (int) $row['TINH_TRANG'],
            (int) $row['MA_LOAI'] // Kiểm tra lại: MA_LOAI hay MA_LOAISP?
        );
    }
}