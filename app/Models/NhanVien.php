<?php
namespace App\Models;

class NhanVien
{
    private ?int $id;
    private string $taiKhoan;
    private string $matKhau;

    public function __construct(?int $id, string $taiKhoan, string $matKhau)
    {
        $this->id = $id;
        $this->taiKhoan = $taiKhoan;
        $this->matKhau = $matKhau;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTaiKhoan(): string
    {
        return $this->taiKhoan;
    }
    public function getMatKhau(): string
    {
        return $this->matKhau;
    }
    public function toArray(): array
    {
        return ['id' => $this->id, 'taiKhoan' => $this->taiKhoan];
    }
}
