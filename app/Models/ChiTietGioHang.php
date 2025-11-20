<?php
namespace App\Models;

class ChiTietGioHang
{
    private int $idGioHang;
    private int $idMonAn;
    private int $soLuong;
    private ?MonAn $monAnSnapshot; // optional to hold product object when loaded

    public function __construct(int $idGioHang, int $idMonAn, int $soLuong, ?MonAn $monAnSnapshot = null)
    {
        $this->idGioHang = $idGioHang;
        $this->idMonAn = $idMonAn;
        $this->soLuong = $soLuong;
        $this->monAnSnapshot = $monAnSnapshot;
    }

    public function getIdGioHang(): int
    {
        return $this->idGioHang;
    }
    public function getIdMonAn(): int
    {
        return $this->idMonAn;
    }
    public function getSoLuong(): int
    {
        return $this->soLuong;
    }
    public function setSoLuong(int $n): void
    {
        $this->soLuong = $n;
    }

    public function getMonAn(): ?MonAn
    {
        return $this->monAnSnapshot;
    }

    public function tinhThanhTien(): float
    {
        if ($this->monAnSnapshot) {
            return $this->monAnSnapshot->getGia() * $this->soLuong;
        }
        return 0.0;
    }

    public function toArray(): array
    {
        return [
            'idGioHang' => $this->idGioHang,
            'idMonAn' => $this->idMonAn,
            'soLuong' => $this->soLuong,
        ];
    }
}
