<?php

namespace App\Http\Controllers\Frontend\Index;

use Illuminate\Http\Request;

use App\Http\Controllers\FrontendController;

use Excel;


class ExcelsController extends FrontendController
{
    public function export()
    {
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('学生成绩',function ($excel) use ($cellData){
            $excel->sheet('score', function ($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }


    public function import(){

        $filePath = storage_path('exports/student.xls');
//        $filePath = storage_path('exports/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls');

        if(file_exists($filePath)){
            $data = '';
            Excel::load($filePath, function($reader) {
                $data = $reader->all();
            });
            dd($data);
        }

    }
}
