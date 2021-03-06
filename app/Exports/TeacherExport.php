<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all();
    }

    public function headings() :array {
    	return ["STT", "Họ và tên", "Ngày thêm", "Ngày sửa", "Email"];
    }
}
