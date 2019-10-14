<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Alert;
use App\Http\Requests\KategoriRequest;
use Session;
use Storage;

class KategoriController extends Controller
{   
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('admin');
    }

    public function index()
    {
        $kategoris = Kategori::all();
        $kategoris_list = Kategori::orderBy('nama_kategori')->paginate(10);
        $countKategori = $kategoris->count();

        $lastUpdateKategori = $this->checkLastUpdate($kategoris);

        if(session('success_message')){
            Alert::success('Berhasil', session('success_message'));
        }

        if(session('error_message')){
            Alert::error('Oops!',session('error_message'));
        }
        return view('admin.pages.kategori.kategori',compact('countKategori','kategoris_list','lastUpdateKategori'));
    }

    public function getContent()
    {
        $kategoris = Kategori::all();
        $kategoris_list = Kategori::orderBy('nama_kategori')->paginate(10);
        $countKategori = $kategoris->count();
        $lastUpdateKategori = $this->checkLastUpdate($kategoris);
        return view('admin.pages.kategori.content_kategori',compact('countKategori','kategoris_list','lastUpdateKategori'));
    }

    public function search(Request $request)
    {
        $kategoris = Kategori::all();
        $cari = $request->input('cari');
        $query = Kategori::where('nama_kategori','like',"%$cari%");
        $kategoris_list = $query->paginate(10)->appends($request->except('page'));
        
        $countKategori = $query->count();
        $countAllKategori = $kategoris->count();
        $lastUpdateKategori = $this->checkLastUpdate($kategoris);

        Session::flash('search-message-title','Data Kategori Tidak Ada');
        Session::flash('search-message-subtitle','Kategori dengan nama '.$cari.' tidak di temukan!');

        return view('admin.pages.kategori.kategori',compact('countKategori','kategoris_list','lastUpdateKategori','cari','countAllKategori'));
    }

    public function create()
    {
        return view('admin.pages.kategori.create_kategori');
    }

    public function store(KategoriRequest $request)
    {
        $input = $request->all();
        Kategori::create($input);
        return redirect('admin/kategori')->withSuccessMessage('Data kategori berhasil di tambahkan!');
    }

    public function show(kategori $kategori)
    {   
        return redirect('admin/kategori');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.pages.kategori.edit_kategori',compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {   
        $input = $request->all();
        $kategori->update($input);
        return redirect('admin/kategori')->withSuccessMessage('Data kategori berhasil di update!');
    }

    public function destroy($id)
    {          
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('admin/kategori');
    }
}
