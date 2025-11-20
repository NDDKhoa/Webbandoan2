<?php
namespace App\Models;

class DonHang
{
    private ?int $idDonHang;
    private int $idKhachHang;
    private \DateTime $ngayDat;
    private string $trangThai;
    private string $nguoiNhan;
    private string $diaChiNhan;
    private $phuongThucThanhToan; // could be string or int
    /** @var ChiTietDonHang[] */
    private array $chiTiet = [];

    public function __construct(?int $idDonHang, int $idKhachHang, \DateTime $ngayDat, string $trangThai, string $nguoiNhan, string $diaChiNhan, $phuongThuc)
    {
        $this->idDonHang = $idDonHang;
        $this->idKhachHang = $idKhachHang;
        $this->ngayDat = $ngayDat;
        $this->trangThai = $trangThai;
        $this->nguoiNhan = $nguoiNhan;
        $this->diaChiNhan = $diaChiNhan;
        $this->phuongThucThanhToan = $phuongThuc;
    }

    public function addChiTiet(ChiTietDonHang $ct): void
    {
        $this->chiTiet[] = $ct;
    }

    public function tinhTongTien(): float
    {
        $sum = 0.0;
        foreach ($this->chiTiet as $ct) {
            $sum += $ct->tinhThanhTien();
        }
        return $sum;
    }

    public function capNhatTrangThai(string $new): void
    {
        $this->trangThai = $new;
    }

    public function toArray(): array
    {
        return [
            'idDonHang' => $this->idDonHang,
            'idKhachHang' => $this->idKhachHang,
            'ngayDat' => $this->ngayDat->format('c'),
            'trangThai' => $this->trangThai,
            'nguoiNhan' => $this->nguoiNhan,
            'diaChiNhan' => $this->diaChiNhan,
            'phuongThuc' => $this->phuongThucThanhToan,
            'chiTiet' => array_map(fn($c) => $c->toArray(), $this->chiTiet),
        ];
    }
}
