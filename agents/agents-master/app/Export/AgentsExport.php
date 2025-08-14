<?php


namespace App\Export;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AgentsExport implements FromView
{
    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('agents.excel', [
            'list' => $this->data
        ]);
    }
}
