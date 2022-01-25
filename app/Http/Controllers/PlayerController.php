<?php

namespace App\Http\Controllers;

use App\Imports\PlayersImport;
use App\Models\Player;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PlayerController extends Controller
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
            $data = Player::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm"><i class="fas fa-info-circle"></i> View</a>';
                    $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('players');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        try {
            Excel::import(new PlayersImport, $request->file('file')->store('temp'));
            return back()->with(session(['successMsg' => 'Successfully Imported']));
        } catch (\Throwable $th) {
            return back()->with(session(['errorMsg' => 'Error could not import']));
        }
    }
}
