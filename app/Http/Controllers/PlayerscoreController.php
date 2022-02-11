<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Playerscore;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlayerscoreController extends Controller
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
            $data = Playerscore::with('person')->select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pid_str', function ($row) {
                    # 'pname' from player table
                    return $row->person->pname;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm"><i class="fas fa-info-circle"></i> View</a>';
                    $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('playerscore');
    }
}
