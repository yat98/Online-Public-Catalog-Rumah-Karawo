<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\JenisKain;
use App\Http\Requests\ProdukRequest;
use Alert;
use Session;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('admin');
    }

    public function index()
    {
        $produks = Produk::all();
        $produksList = Produk::orderBy('nama_produk')->paginate(10);
        $countProduk = $produks->count();
        $lastUpdateProduk = $this->checkLastUpdate($produks);

        if(session('success_message')){
            Alert::success('Berhasil', session('success_message'));
        }

        if(session('error_message')){
            Alert::error('Oops!',session('error_message'));
        }

        return view('admin.pages.produk.produk',compact('countProduk','produksList','lastUpdateProduk'));
    }

    public function getContent(){
        $produks = Produk::all();
        $produksList = Produk::orderBy('nama_produk')->paginate(10);
        $countProduk = $produks->count();
        $lastUpdateProduk = $this->checkLastUpdate($produks);
        return view('admin.pages.produk.content_produk',compact('countProduk','produksList','lastUpdateProduk'));
    }

    public function search(Request $request){
        $produks = Produk::all();
        $cari = $request->input('cari');
        $query = Produk::where('nama_produk','like',"%$cari%");
        $produksList = $query->paginate(10)->appends($request->except('page'));
        
        $countProduk = $query->count();
        $countAllProduk = $produks->count();
        $lastUpdateProduk = $this->checkLastUpdate($produks);

        Session::flash('search-message-title','Data Produk Tidak Ada');
        Session::flash('search-message-subtitle','Produk dengan nama '.$cari.' tidak di temukan!');

        return view('admin.pages.produk.produk',compact('countProduk','produksList','lastUpdateProduk','cari','countAllProduk'));
    }

    public function create()
    {
        $kategoriList = Kategori::pluck('nama_kategori','id');
        $jenisKainList = JenisKain::pluck('jenis_kain','id');
        return view('admin.pages.produk.create_produk',compact('kategoriList','jenisKainList'));
    }

    public function store(ProdukRequest $request)
    {
        $input = $request->all();

        if($request->has('foto_produk')){
            $imageFieldName = 'foto_produk'; 
            $uploadPath = 'img/product-img';
            $input[$imageFieldName] = $this->uploadImage($imageFieldName,$request,$uploadPath);
        }
        
        Produk::create($input);
        return redirect('admin/product')->withSuccessMessage('Data Produk berhasil di tambahkan!');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.pages.produk.detail_produk',compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoriList = Kategori::pluck('nama_kategori','id');
        $jenisKainList = JenisKain::pluck('jenis_kain','id');
        return view('admin.pages.produk.edit_produk',compact('produk','kategoriList','jenisKainList'));
    }

    public function update(ProdukRequest $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $input = $request->all();

        if($request->has('foto_produk')){
            $imageFieldName = 'foto_produk'; 
            $uploadPath = 'img/product-img';

            $this->deleteImage($imageFieldName,$produk->foto_produk);
            $input[$imageFieldName] = $this->uploadImage($imageFieldName,$request,$uploadPath);
        }
        $produk->update($input);
        return redirect('admin/product')->withSuccessMessage('Data Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $imageFieldName = 'foto_produk'; 
        $this->deleteImage($imageFieldName,$produk->foto_produk);
        $produk->delete();
        return redirect('admin/product');
    }
}
