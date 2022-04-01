<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Prize::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm" style="width:75px; height:35px;"><i class="fas fa-info-circle"></i> View</a> ';
                    $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" style="width:75px; height:35px;"><i class="fas fa-edit"></i> Edit</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('prizes');
    }
}
