<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Admin;
use App\JenisKain;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Session;
use App\Http\Requests\AdminRequest;
use Hash;
use Alert;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $produks = Produk::all()->sortByDesc('created_at')->take(9);
        $countProduks= $produks->count();
        return view('guest.pages.home',compact('produks','countProduks'));
    }

    public function product()
    {
        $produks = Produk::orderBy('nama_produk','asc')->paginate(10);
        $kategoris = Kategori::all();
        $jenisKains = JenisKain::all();
        $countProduks= $produks->count();
        $minHarga = Produk::orderBy('harga','asc')->first()->harga ?? 0;
        $maxHarga = Produk::orderBy('harga','desc')->first()->harga ?? 100000;
        
        return view('guest.pages.produk',compact('produks','countProduks','kategoris','jenisKains','minHarga','maxHarga'));
    }

    public function show($id){
        $produk = Produk::findOrFail($id);
        return view('guest.pages.detail_produk',compact('produk'));        
    }

    public function search(Request $request){
        $cari = trim($request->input('cari'));

        $inputMinHarga = $request->input('min-harga');
        $inputMaxHarga = $request->input('max-harga');

        $inputKategori = $request->input('kategori');
        $inputJenisKain = $request->input('jenis-kain');
        
        $kategoris = Kategori::all();
        $jenisKains = JenisKain::all();
        $minHargaTable = Produk::orderBy('harga','asc')->first()->harga ?? 0;
        $produks;
        $countProduks = 0;
        $minHarga = 0;
        $maxHarga = 100000;

        if(($inputMinHarga != null) && ($inputMaxHarga != null)){
            $query = DB::table('produk')->orderBy('harga','asc')
                                        ->whereBetween('harga',[$inputMinHarga,$inputMaxHarga]);
            $minHarga = $inputMinHarga;
            $maxHarga = $inputMaxHarga;
            
            if(!empty($inputKategori)){
                $query->whereIn('id_kategori',$inputKategori);
            }
    
            if(!empty($inputJenisKain)){
                $query->whereIn('id_jenis_kain',$inputJenisKain);
            }
            
            $produks = $this->paginateCollection($query->get(),$request);
            $countProduks= $produks->count();
        }

        if(!empty($cari)){
            $produks = Produk::where('nama_produk','like',"%$cari%")->orderBy('harga','asc')->paginate(10);
            $minHarga = Produk::orderBy('harga','asc')->first()->harga ?? 0;
            $maxHarga = Produk::orderBy('harga','desc')->first()->harga ?? 100000;
            $countProduks= $produks->count();
        }
        Session::flash('search-message-title','Data Produk Tidak Ada');
        Session::flash('search-message-subtitle','Data Produk tidak di temukan!');

        return view('guest.pages.produk',compact('inputJenisKain','inputKategori','produks','countProduks','kategoris','jenisKains','minHarga','maxHarga','minHargaTable','cari'));
    }


    public function login(){
        if(Session::get('login')){
            return redirect('admin');
        }
        return view('login.login');    
    }

    public function getLogin(AdminRequest $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $admin = Admin::where('username',$username)->get()->first(); 
    
        if(!empty($admin)){
            if(Hash::check($password,$admin->password)){
                $session = [
                    'id'=>$admin->id,
                    'username'=>$admin->username,
                    'login'=>true
                ];
                Session::put($session);
                return redirect('admin')->withSuccessMessage('Selamat datang '.$admin->username);
            }
        }
        Alert::error('Oops!','Username atau password salah');
        return view('login.login',compact('username')); 
    }

    protected function paginateCollection(Collection $data,Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentResults = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $results = new LengthAwarePaginator($currentResults, $data->count(), $perPage);
        $results->setPath($request->url());
        $results->appends($request->except('page'));
        return  $results;
    } 
}
