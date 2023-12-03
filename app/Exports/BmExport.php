<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BmExport implements FromView
{

    protected $data_bm;
    protected $project;

    public function __construct($data_bm , $project)
    {
        $this->data_bm = $data_bm;
        $this->project = $project;
    }

    public function view(): View
    {
        return view('admin.master.report-bm.table',['data_bm' =>$this->data_bm, 'project' => $this->project]);
    }
    
}
