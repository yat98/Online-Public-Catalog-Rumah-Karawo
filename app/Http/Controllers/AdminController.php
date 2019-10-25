<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\JenisKain;
use App\Produk;
use App\Admin;
use Alert;
use Session;
use Hash;
use Carbon\Carbon;
use PDF;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('preventBackHistory');
        $this->middleware('admin',['except'=>[
            'logout'
        ]]);
    }

    public function index(){
        $kategoris = Kategori::all()->sortBy('nama_kategori');
        $jenisKains = JenisKain::all()->sortBy('jenis_kain');
        $produks = Produk::all();

        $countKategori = $kategoris->count();
        $countJenisKain = $jenisKains->count();
        $countProduk = $produks->count();

        $produksKategoriStatistik = $this->countStatistik($kategoris,$produks,'id_kategori');
        $produksJenisKainStatistik = $this->countStatistik($jenisKains,$produks,'id_jenis_kain');
        
        $lastUpdateProduk = $this->checkLastUpdate($produks);

        $lastUpdateJenisKain = $this->checkLastUpdate($jenisKains);

        $lastUpdateKategori = $this->checkLastUpdate($kategoris);

        if(session('success_message')){
            Alert::success('Login Berhasil', session('success_message'));
        }
                                
        return view('admin.pages.dashboard',compact('countKategori','countJenisKain','countProduk','kategoris','jenisKains','produksKategoriStatistik','produksJenisKainStatistik','lastUpdateProduk','lastUpdateJenisKain','lastUpdateKategori'));
    }

    public function editPassword(){
        return view('admin.pages.admin.edit_password');
    }

    public function updatePassword(Request $request){
        $id = Session::get('id');
        $admin = Admin::findOrFail($id);
        $passwordLama = $request->input('password_lama');
        $passwordBaru = $request->input('password_baru');

        $this->validate($request,[
            'password_lama'=>'required|min:8|string',
            'password_baru'=>'required|min:8|string|confirmed',
        ]);

        if(!Hash::check($passwordLama,$admin->password)){
            Alert::success('Oops!', 'Password lama tidak cocok');
            return redirect('admin/password');
        }
        $admin->update([
            'password'=>bcrypt($passwordBaru)
        ]);
        Alert::success('Berhasil', 'Password Berhasil di update!');
        return redirect('admin');
    }

    public function cetak(){
        $produks = Produk::all();
        $kategoris = Kategori::all()->sortBy('nama_kategori');
        $jenisKains = JenisKain::all()->sortBy('jenis_kain');

        $produksStatistikKategori = [];
        $produksStatistikJenis = [];

        foreach($kategoris as $data){
            $countData = $produks->where('id_kategori',$data->id)->count();
            $produksStatistikKategori[$data->nama_kategori] = $countData;
        }

        foreach($jenisKains as $data){
            $countData = $produks->where('id_jenis_kain',$data->id)->count();
            $produksStatistikJenis[$data->jenis_kain] = $countData;
        }  

        arsort($produksStatistikKategori);
        arsort($produksStatistikJenis);

        $data = [
            'produks'=>$produks,
            'produksStatistikKategori'=>$produksStatistikKategori,
            'produksStatistikJenis'=>$produksStatistikJenis,
        ];

        $pdf = PDF::loadView('admin.pages.laporan', $data);
        return $pdf->download('laporan_produk_'.Carbon::now()->format('Ymd_His'));
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
