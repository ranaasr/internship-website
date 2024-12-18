<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class SlipController extends Controller
{
 public function showDataForm()
    {
        return view('Auth.login');
    }

    public function showData(Request $request)
    {


        $nim = $request->input('nim');
        $email = $request->input('email');
        $mahasiswa = Mahasiswa::where('nim', $nim)->where('email', $email)->first();

        $join = Mahasiswa::select('tbl_bank.nama_bank', 'klik_pembayaran_detail.tgl_update', 'klik_pembayaran_detail.deskripsiPanjang')
        ->join('klik_pembayaran', 'tbl_mahasiswa.nim', '=', 'klik_pembayaran.nim')
        ->join('klik_pembayaran_detail', 'klik_pembayaran.id_pembayaran', '=', 'klik_pembayaran_detail.id_pembayaran')
        ->join('tbl_bank', 'klik_pembayaran_detail.id_bank', '=', 'tbl_bank.id_bank')
        ->where('tbl_mahasiswa.nim', $nim)
        ->first();
        

        if ($mahasiswa) {
          return view('admin.mahasiswa.index', compact('mahasiswa','join'));
      } else {
          return redirect()->route('show.data.form')->withErrors(['nim' => 'Data tidak ditemukan.']);
      }
    }
    public function showDataLink(Request $request)
    {
        $nim = $request->nim;
        $email = $request->email;
        $mahasiswa = Mahasiswa::where('nim', $nim)->where('email', $email)->first();

        $join = Mahasiswa::select('tbl_bank.nama_bank', 'klik_pembayaran_detail.tgl_update', 'klik_pembayaran_detail.deskripsiPanjang')
        ->join('klik_pembayaran', 'tbl_mahasiswa.nim', '=', 'klik_pembayaran.nim')
        ->join('klik_pembayaran_detail', 'klik_pembayaran.id_pembayaran', '=', 'klik_pembayaran_detail.id_pembayaran')
        ->join('tbl_bank', 'klik_pembayaran_detail.id_bank', '=', 'tbl_bank.id_bank')
        ->where('tbl_mahasiswa.nim', $nim)
        ->first();
        

        if ($mahasiswa) {
          return view('admin.mahasiswa.index', compact('mahasiswa','join'));
      } else {
          return redirect()->route('show.data.form')->withErrors(['nim' => 'Data tidak ditemukan.']);
      }
    }

    public function cetakSlip($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        $join = Mahasiswa::select('tbl_bank.nama_bank', 'klik_pembayaran_detail.tgl_update', 'klik_pembayaran_detail.deskripsiPanjang')
        ->join('klik_pembayaran', 'tbl_mahasiswa.nim', '=', 'klik_pembayaran.nim')
        ->join('klik_pembayaran_detail', 'klik_pembayaran.id_pembayaran', '=', 'klik_pembayaran_detail.id_pembayaran')
        ->join('tbl_bank', 'klik_pembayaran_detail.id_bank', '=', 'tbl_bank.id_bank')
        ->where('tbl_mahasiswa.nim', $nim)
        ->first();
        


        if (!$mahasiswa) {
            abort(404); // Tampilkan halaman 404 jika mahasiswa tidak ditemukan
        }else{

        $pdf = app('dompdf.wrapper');
        $pdf = PDF::loadView('admin.mahasiswa.slip', compact('mahasiswa','join'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($mahasiswa->nama.'-'.$mahasiswa->nim.'.pdf');
        }

        
    }

    public function showDataMutasi(Request $request)
    {
        $nim = $request->nim;
        $email = $request->email;
        $mahasiswa = Mahasiswa::where('nim', $nim)->where('email', $email)->first();

        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        $lastNumber = session('last_surat_number', 0); 
        $nomor = $lastNumber + 1;    
        session(['last_surat_number'=>$nomor]);


        if ($mahasiswa) {
          return view('admin.mahasiswa.mutasi', compact('mahasiswa','bulan','tahun','nomor'));
      } else {
          return redirect()->route('show.data.form')->withErrors(['nim' => 'Data tidak ditemukan.']);
      }
    }

    public function cetakSurat($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        $nomor = session('last_surat_number');
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        if (!$mahasiswa) {
            abort(404); // Tampilkan halaman 404 jika mahasiswa tidak ditemukan
        }else{


        $pdf = app('dompdf.wrapper');
        $pdf = PDF::loadView('admin.mahasiswa.surat', compact('mahasiswa','bulan','tahun','nomor'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($mahasiswa->nama.'-'.$mahasiswa->nim.'.pdf');
        }
    }

    public function generatePDF()
    {
        // Render view to HTML
        $html = view('surat_mutasi')->render();

        // Load HTML into Dompdf
        $pdf = PDF::loadHTML($html);

        // Download PDF
        return $pdf->download('surat_mutasi.pdf');
    }
}