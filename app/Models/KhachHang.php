<?php
namespace App\Models;

class KhachHang
{
    private ?int $id;
    private string $tenKhachHang;
    private string $soDienThoai;
    private ?string $email;
    private ?string $diaChi;
    private string $matKhau; // plain-text per current DB
    private ?\DateTime $ngayTao;

    public function __construct(
        ?int $id,
        string $tenKhachHang,
        string $soDienThoai,
        ?string $email,
        ?string $diaChi,
        string $matKhau,
        ?\DateTime $ngayTao = null
    ) {
        $this->id = $id;
        $this->tenKhachHang = $tenKhachHang;
        $this->soDienThoai = $soDienThoai;
        $this->email = $email;
        $this->diaChi = $diaChi;
        $this->matKhau = $matKhau;
        $this->ngayTao = $ngayTao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTen(): string
    {
        return $this->tenKhachHang;
    }
    public function getSoDienThoai(): string
    {
        return $this->soDienThoai;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getDiaChi(): ?string
    {
        return $this->diaChi;
    }

    public function updateThongTin(string $ten, ?string $diaChi, ?string $email): void
    {
        $this->tenKhachHang = $ten;
        $this->diaChi = $diaChi;
        $this->email = $email;
    }

    public function doiMatKhau(string $matKhauMoi): void
    {
        $this->matKhau = $matKhauMoi;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'tenKhachHang' => $this->tenKhachHang,
            'soDienThoai' => $this->soDienThoai,
            'email' => $this->email,
            'diaChi' => $this->diaChi,
            'ngayTao' => $this->ngayTao?->format('c'),
        ];
    }
}
