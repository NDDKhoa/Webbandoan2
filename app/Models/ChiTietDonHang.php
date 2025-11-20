<?php
namespace App\Models;

class ChiTietDonHang
{
    private int $idDonHang;
    private int $idMonAn;
    private int $soLuong;
    private float $giaLucMua;

    public function __construct(int $idDonHang, int $idMonAn, int $soLuong, float $giaLucMua)
    {
        $this->idDonHang = $idDonHang;
        $this->idMonAn = $idMonAn;
        $this->soLuong = $soLuong;
        $this->giaLucMua = $giaLucMua;
    }

    public function tinhThanhTien(): float
    {
        return $this->soLuong * $this->giaLucMua;
    }

    public function toArray(): array
    {
        return [
            'idDonHang' => $this->idDonHang,
            'idMonAn' => $this->idMonAn,
            'soLuong' => $this->soLuong,
            'giaLucMua' => $this->giaLucMua,
        ];
    }
}
