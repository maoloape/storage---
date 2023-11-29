<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class BmExport implements FromQuery, WithMapping, WithHeadings

class BmExport implements FromView
{

    protected $data_bm;

    public function __construct($data_bm)
    {
        $this->data_bm = $data_bm;
    }

    public function view(): View
    {
        return view('admin.master.report-bm.list',['data_bm' =>$this->data_bm]);
    }
}
