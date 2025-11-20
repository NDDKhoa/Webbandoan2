<?php
namespace App\Models;

class PhuongThucThanhToan
{
    private $id;
    private $ten;

    public function __construct($id, $ten)
    {
        $this->id = $id;
        $this->ten = $ten;
    }

    public function toArray(): array
    {
        return ['id' => $this->id, 'ten' => $this->ten];
    }
}
