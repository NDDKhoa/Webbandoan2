<?php
namespace App\Models;

class LoaiMonAn
{
    private ?int $id;
    private string $tenLoai;

    public function __construct(?int $id, string $tenLoai)
    {
        $this->id = $id;
        $this->tenLoai = $tenLoai;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTenLoai(): string
    {
        return $this->tenLoai;
    }
    public function setTenLoai(string $ten): void
    {
        $this->tenLoai = $ten;
    }

    public function toArray(): array
    {
        return ['id' => $this->id, 'tenLoai' => $this->tenLoai];
    }
}
