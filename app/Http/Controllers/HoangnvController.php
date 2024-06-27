<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoangnvController extends Controller
{
    public function showThongtinSV(){
        $data = [
            [
                'masv'   =>  'PH38617',
                'hoten'  =>  'Nguyễn Việt Hoàng',
                'tuoi'   =>  '19',
                'lop'    =>  'WD18315', 
            ]
        ];
        return view('thongtinsv', compact('data'));
    }
}
