<?php
namespace App\Exports;

use App\Claim;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClaimExport implements FromView
{
    use Exportable;

    public function data($data)
    {
        $this->data = $data;
        return $this;
    }

    public function view() : View
    {
        return view('admin.exports.claim')->with('claims', $this->data);
    }
}
