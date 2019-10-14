<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisKain;
use Session;
use Alert;
use App\Http\Requests\JenisKainRequest;

class JenisKainController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('admin');
    }

    public function index()
    {
        $jenisKains = JenisKain::all();
        $countJenisKain = $jenisKains->count();
        $jenisKainsList = JenisKain::orderBy('jenis_kain')->paginate(10);
        $lastUpdateJenisKain = $this->checkLastUpdate($jenisKains);

        if(session('success_message')){
            Alert::success('Berhasil', session('success_message'));
        }

        if(session('error_message')){
            Alert::error('Oops!',session('error_message'));
        }
        
        return view('admin.pages.jenis_kain.jenis_kain',compact('countJenisKain','jenisKainsList','lastUpdateJenisKain'));
    }

    public function getContent()
    {
        $jenisKains = JenisKain::all();
        $countJenisKain = $jenisKains->count();
        $jenisKainsList = JenisKain::orderBy('jenis_kain')->paginate(10);
        $lastUpdateJenisKain = $this->checkLastUpdate($jenisKains);
        return view('admin.pages.jenis_kain.content_jenis_kain',compact('countJenisKain','jenisKainsList','lastUpdateJenisKain'));
    }

    public function search(Request $request)
    {
        $jenisKains = JenisKain::all();
        $cari = $request->input('cari');
        $query = JenisKain::where('jenis_kain','like',"%$cari%");
        $jenisKainsList = $query->paginate(10)->appends($request->except('page'));
        
        $countJenisKain = $query->count();
        $countAllJenisKain = $jenisKains->count();
        $lastUpdateJenisKain = $this->checkLastUpdate($jenisKains);

        Session::flash('search-message-title','Data Jenis Kain Tidak Ada');
        Session::flash('search-message-subtitle','Jenis Kain dengan nama '.$cari.' tidak di temukan!');

        return view('admin.pages.jenis_kain.jenis_kain',compact('countJenisKain','jenisKainsList','lastUpdateJenisKain','cari','countAllJenisKain'));
    }

    public function create()
    {
        return view('admin.pages.jenis_kain.create_jenis_kain');
    }

    public function store(JenisKainRequest $request)
    {
        $input = $request->all();
        JenisKain::create($input);
        return redirect('admin/jenis-kain')->withSuccessMessage('Data Jenis Kain berhasil di tambahkan!');
    }

    public function show(JenisKain $jenisKain)
    {   
        return redirect('admin/jenis-kain');
    }

    public function edit(JenisKain $jenisKain)
    {
        return view('admin.pages.jenis_kain.edit_jenis_kain',compact('jenisKain'));
    }

    public function update(JenisKainRequest $request, JenisKain $jenisKain)
    {   
        $input = $request->all();
        $jenisKain->update($input);
        return redirect('admin/jenis-kain')->withSuccessMessage('Data Jenis Kain berhasil di update!');
    }

    public function destroy($id)
    {           
        $jenisKain = JenisKain::findOrFail($id);
        $jenisKain->delete();
        return redirect('admin/jenis-kain');
        
    }
}
