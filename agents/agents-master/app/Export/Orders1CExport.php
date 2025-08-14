<?php


namespace App\Export;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class Orders1CExport implements FromView, WithColumnFormatting
{
    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('orders.railway.export.orders1c', [
            'orders' => $this->data
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
            'I' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
            'M' => NumberFormat::FORMAT_TEXT,
            'N' => NumberFormat::FORMAT_TEXT,
            'O' => NumberFormat::FORMAT_TEXT,
            'P' => NumberFormat::FORMAT_TEXT,
            'Q' => NumberFormat::FORMAT_TEXT,
            'R' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_TEXT,
            'T' => NumberFormat::FORMAT_TEXT,
            'Y' => NumberFormat::FORMAT_TEXT,
            'V' => NumberFormat::FORMAT_TEXT,
            'W' => NumberFormat::FORMAT_TEXT,
            'AA' => NumberFormat::FORMAT_TEXT,
            'AB' => NumberFormat::FORMAT_TEXT,
            'AC' => NumberFormat::FORMAT_TEXT,
            'AD' => NumberFormat::FORMAT_TEXT,
            'AE' => NumberFormat::FORMAT_TEXT,
            'AF' => NumberFormat::FORMAT_TEXT,
            'AG' => NumberFormat::FORMAT_TEXT,
            'AH' => NumberFormat::FORMAT_TEXT,
            'AI' => NumberFormat::FORMAT_TEXT,
            'AJ' => NumberFormat::FORMAT_TEXT,
            'AK' => NumberFormat::FORMAT_TEXT,
            'AL' => NumberFormat::FORMAT_TEXT,
            'AM' => NumberFormat::FORMAT_TEXT,
            'AN' => NumberFormat::FORMAT_TEXT,
            'AO' => NumberFormat::FORMAT_TEXT,
            'AP' => NumberFormat::FORMAT_TEXT,
            'AQ' => NumberFormat::FORMAT_TEXT,
            'AR' => NumberFormat::FORMAT_TEXT,
            'AS' => NumberFormat::FORMAT_TEXT,
            'AT' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
