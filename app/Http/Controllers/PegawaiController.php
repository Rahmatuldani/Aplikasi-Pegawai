<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = Pegawai::leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')->get();
        return view('pegawai/index', ['pegawai'=>$pegawai, 'no'=>0]);
    }

    public function create(){
        $jabatan = Jabatan::all();
        return view('pegawai/create', ['jabatan'=>$jabatan]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required|max:255',
            'jk' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
            'foto' => 'required'
        ],[
            'nama.required' => 'Nama pegawai tidak boleh kosong!',
            'jk.required' => 'Jenis kelamin tidak boleh kosong!',
            'tanggal.required' => 'Tanggal lahir tidak boleh kosong!',
            'jabatan.required' => 'Jabatan harus diisi!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'foto.required' => 'Foto tidak boleh kosong!'
        ]);

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $namafile = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $namafile);
        }

        $pegawai = new Pegawai;
        $pegawai->nama_pegawai = $request['nama'];
        $pegawai->jenis_kelamin = $request['jk'];
        $pegawai->tgl_lahir = $request['tanggal'];
        $pegawai->id_jabatan = $request['jabatan'];
        $pegawai->keterangan = $request['keterangan'];
        $pegawai->foto = $namafile;
        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success','Data berhasil ditambahkan!');
    }

    public function edit($id){
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();
        $l = ($pegawai['jenis_kelamin'] == "L") ? " checked" : "";
        $p = ($pegawai['jenis_kelamin'] == "P") ? " checked" : "";
        return view('pegawai/edit', ['pegawai'=>$pegawai, 'jabatan'=>$jabatan, 'l'=>$l, 'p'=>$p]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'nama' => 'required|max:255',
            'jk' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong!',
            'jk.required' => 'Jenis kelamin tidak boleh kosong!',
            'tanggal.required' => 'Tanggal tidak boleh kosong!',
            'jabatan.required' => 'Jabatan harus diisi!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
        ]);
        
        $ubahfile = false;
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $namafile = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $namafile);
            $ubahfile = true;
        }

        $pegawai = Pegawai::find($id);
        $pegawai->nama_pegawai = $request['nama'];
        $pegawai->jenis_kelamin = $request['jk'];
        $pegawai->tgl_lahir = $request['tanggal'];
        $pegawai->id_jabatan = $request['jabatan'];
        $pegawai->keterangan = $request['keterangan'];
        if ($ubahfile) {
            unlink(public_path().'/images/'.$pegawai->foto);
            $pegawai->foto = $namafile;
        }
        $pegawai->update();

        return redirect()->route('pegawai.index')->with('success','Data berhasil diedit!');
    }

    public function destroy($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        unlink(public_path().'/images/'.$pegawai->foto);

        return redirect()->route('pegawai.index')->with('success','Data berhasil dihapus!');
    }
}


?>