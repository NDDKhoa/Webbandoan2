<?php
namespace App\Models;

/**
 * Class MonAn
 * Represents a product/menu item.
 */
class MonAn
{
    private ?int $id;
    private string $ten;
    private float $gia;
    private ?string $moTa;
    private ?string $hinhAnh;
    private int $tinhTrang; // 1, 0, -1
    private int $idLoai;

    public function __construct(
        ?int $id,
        string $ten,
        float $gia,
        ?string $moTa,
        ?string $hinhAnh,
        int $tinhTrang,
        int $idLoai
    ) {
        $this->id = $id;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->moTa = $moTa;
        $this->hinhAnh = $hinhAnh;
        $this->tinhTrang = $tinhTrang;
        $this->idLoai = $idLoai;
    }

    // Getters / Setters (only essential ones shown)
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTen(): string
    {
        return $this->ten;
    }
    public function getGia(): float
    {
        return $this->gia;
    }
    public function getMoTa(): ?string
    {
        return $this->moTa;
    }
    public function getHinhAnh(): ?string
    {
        return $this->hinhAnh;
    }
    public function getTinhTrang(): int
    {
        return $this->tinhTrang;
    }
    public function getIdLoai(): int
    {
        return $this->idLoai;
    }

    public function setTen(string $ten): void
    {
        $this->ten = $ten;
    }
    public function setGia(float $gia): void
    {
        $this->gia = $gia;
    }
    public function setMoTa(?string $moTa): void
    {
        $this->moTa = $moTa;
    }
    public function setHinhAnh(?string $hinhAnh): void
    {
        $this->hinhAnh = $hinhAnh;
    }
    public function setTinhTrang(int $status): void
    {
        $this->tinhTrang = $status;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ten' => $this->ten,
            'gia' => $this->gia,
            'moTa' => $this->moTa,
            'hinhAnh' => $this->hinhAnh,
            'tinhTrang' => $this->tinhTrang,
            'idLoai' => $this->idLoai,
        ];
    }
}
