<?php
namespace App\Models;

class GioHang
{
    private int $idGioHang;
    private int $idKhachHang;
    /** @var ChiTietGioHang[] */
    private array $items;
    private float $tongTien;
    private ?\DateTime $ngayCapNhat;

    public function __construct(int $idGioHang, int $idKhachHang, array $items = [], ?\DateTime $ngayCapNhat = null)
    {
        $this->idGioHang = $idGioHang;
        $this->idKhachHang = $idKhachHang;
        $this->items = $items;
        $this->ngayCapNhat = $ngayCapNhat;
        $this->tongTien = $this->tinhTongTien();
    }

    public function getId(): int
    {
        return $this->idGioHang;
    }
    public function getIdKhachHang(): int
    {
        return $this->idKhachHang;
    }
    /** @return ChiTietGioHang[] */
    public function getItems(): array
    {
        return $this->items;
    }

    public function themItem(ChiTietGioHang $item): void
    {
        // simple merge by idMonAn
        foreach ($this->items as $existing) {
            if ($existing->getIdMonAn() === $item->getIdMonAn()) {
                $existing->setSoLuong($existing->getSoLuong() + $item->getSoLuong());
                $this->tongTien = $this->tinhTongTien();
                return;
            }
        }
        $this->items[] = $item;
        $this->tongTien = $this->tinhTongTien();
    }

    public function capNhatSoLuong(int $idMonAn, int $soLuong): void
    {
        foreach ($this->items as $k => $item) {
            if ($item->getIdMonAn() === $idMonAn) {
                if ($soLuong <= 0) {
                    unset($this->items[$k]);
                } else {
                    $item->setSoLuong($soLuong);
                }
                $this->items = array_values($this->items);
                $this->tongTien = $this->tinhTongTien();
                return;
            }
        }
    }

    public function xoaMonAn(int $idMonAn): void
    {
        $this->capNhatSoLuong($idMonAn, 0);
    }

    public function tinhTongTien(): float
    {
        $sum = 0.0;
        foreach ($this->items as $item) {
            $sum += $item->tinhThanhTien();
        }
        $this->tongTien = $sum;
        return $sum;
    }

    public function lamRong(): void
    {
        $this->items = [];
        $this->tongTien = 0.0;
    }

    public function toArray(): array
    {
        return [
            'idGioHang' => $this->idGioHang,
            'idKhachHang' => $this->idKhachHang,
            'tongTien' => $this->tongTien,
            'items' => array_map(fn($i) => $i->toArray(), $this->items),
        ];
    }
}
