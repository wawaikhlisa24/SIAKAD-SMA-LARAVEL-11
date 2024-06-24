<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class BeritaController extends Controller
{
    /** Menampilkan halaman index berita */
    public function indexBerita()
    {
        return view('berita.add-berita');
    }

    // /** Menampilkan halaman form untuk menambahkan berita */
    // public function create()
    // {
    //     return view('berita.add-berita');
    // }

    /** Menampilkan halaman form untuk mengedit berita */
    public function editBerita($berita_id)
    {
        $berita = Berita::where ('berita_id',$berita_id)->first();
        return view('berita.edit-berita', compact('berita'));
    }
    
    public function beritaList()
    {
        return view('berita.list-berita');
    }

    /** Mengambil data berita untuk ditampilkan dalam DataTables */
    public function getDataList(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowPerPage = $request->get('length');
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Index kolom yang diurutkan
        $columnName = $columnName_arr[$columnIndex]['data']; // Nama kolom yang diurutkan
        $columnSortOrder = $order_arr[0]['dir']; // Urutan ASC atau DESC
        $searchValue = $search_arr['value']; // Nilai pencarian

        $beritas = Berita::query();
        $totalRecords = $beritas->count();

        $totalRecordsWithFilter = $beritas->where(function ($query) use ($searchValue) {
            $query->where('informasi', 'like', '%' . $searchValue . '%');
            $query->orWhere('tanggal', 'like', '%' . $searchValue . '%');
            $query->orWhere('jam', 'like', '%' . $searchValue . '%');
        })->count();

        $records = $beritas->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('informasi', 'like', '%' . $searchValue . '%');
                $query->orWhere('tanggal', 'like', '%' . $searchValue . '%');
                $query->orWhere('jam', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();
        
        $data_arr = [];
        
        foreach ($records as $key => $record) {
            $modify = '
                <td class="text-end"> 
                    <div class="actions">
                        <a href="'.url('berita/edit/'.$record->berita_id).'" class="btn btn-sm bg-danger-light">
                            <i class="far fa-edit me-2"></i>
                        </a>
                        <a class="btn btn-sm bg-danger-light delete berita_id" data-bs-toggle="modal" data-berita_id="'.$record->id.'" data-bs-target="#delete">
                            <i class="fe fe-trash-2"></i>
                        </a>
                    </div>
                </td>
            ';

            $data_arr [] = [
                "informasi" => $record->informasi,
                "tanggal" => $record->tanggal,
                "jam" => $record->jam,
                "modify" => $modify,
            ];
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data_arr
        ];

        return response()->json($response);
    }
    public function saveRecord(Request $request)
    {
        $request->validate([
            'informasi' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
        ]);

        try {
            $saveRecord = new Berita;
            $saveRecord->informasi = $request->informasi;
            $saveRecord->tanggal = $request->tanggal;
            $saveRecord->jam = $request->jam;
            $saveRecord->save();

            Toastr::success('Berita berhasil ditambahkan', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::error($e);
            Toastr::error('Gagal menambahkan berita', 'Error');
            return redirect()->back();
        }
    }

    /** Mengupdate data berita */
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateRecord = [
                'informasi' => $request->informasi,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
            ];

            Berita::where('id', $request->id)->update($updateRecord);

            DB::commit();
            Toastr::success('Berita berhasil diperbarui', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollback();
            Toastr::error('Gagal memperbarui berita', 'Error');
            return redirect()->back();
        }
    }

    /** Menghapus data berita */
    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            Berita::destroy($request->id);
            DB::commit();
            Toastr::success('Berita berhasil dihapus', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollback();
            Toastr::error('Gagal menghapus berita', 'Error');
            return redirect()->back();
        }
    }

}

