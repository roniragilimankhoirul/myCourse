<?php
namespace App\Http\Controllers;
use App\Models\Lembaga;
use App\Models\Komentar;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyCourseController extends Controller
{
    public function index()
    {
        $lembagas = Lembaga::all();
        return view('index', ['lembagas' => $lembagas]);
    }


    public function lembagaHome()
    {
        $lembagas = DB::select('select * from lembagas where status = 1');
        return view('lembaga.home',['lembagas' => $lembagas]);
    }
    public function lembagaCreate()
    {
        return view('lembaga.create');
    }
    public function lembagaStore(Request $request)
    {
        $request->validate([
            'nomor_izin_operasional'=>'required',
            'nama_lembaga'=>'required|min:3|max:120',
            'nama_pimpinan'=>'required|min:3|max:120',
            'email'=>'required',
            'telepon'=>'required',
            'deskripsi'=>'required',
            'alamat'=>'required',
            'foto'=>'required|file|image|max:1000',

        ]);
        if ($request->hasFile('foto')) {
            $extFile = $request->foto->getClientOriginalExtension();
            $namaFile = 'img-'.time().".".$extFile;
            $request->foto->storeAs('public', $namaFile);
        }
        Lembaga::create([
            'nomor_izin_operasional'=> request('nomor_izin_operasional'),
            'nama_lembaga'=>request('nama_lembaga'),
            'nama_pimpinan'=>request('nama_pimpinan'),
            'email'=> request('email'),
            'telepon'=> request('telepon'),
            'deskripsi'=> request('deskripsi'),
            'alamat'=>request('alamat'),
            'foto'=>$namaFile,
            'status'=>null

        ]);
        $request->session()->flash('pesan',"Request Anda telah tertampung, pesan penerimaan akan dikirim melalui email/pesan telepon paling lambat 7 hari");
        return redirect()->route('lembagas.home');
    }
    public function lembagaShow(Lembaga $lembaga)
    {
        $komentars = DB::table('komentars')->whereIn('lembaga',[$lembaga->nama_lembaga])->select('*')->orderBy('created_at','DESC')->get();
        return view('lembaga.show', ['lembaga' => $lembaga, 'komentars'=>$komentars]);
    }

    public function komentarStore(Request $request)
    {
        $request->validate([
            'nama'=>'required|min:3|max:120',
            'email'=>'required',
            'komentar'=>'required',
            'lembaga'=>'required'
        ]);

        Komentar::create([
            'nama'=>request('nama'),
            'email'=> request('email'),
            'komentar'=>request('komentar'),
            'lembaga'=>request('lembaga'),

        ]);
        return redirect()->route('lembagas.home');
    }

    public function customersCreate()
    {
        return view('customer.create');
    }
    public function customersStore(Request $request)
    {
        $request->validate([
            'nama'=>'required|min:3|max:120',
            'nik'=>'required|size:16|unique:customers,nik',
            'jenis_kelamin'=>'required|in:P,L',
            'telepon'=>'required',
            'email'=>'',
            'alamat'=>'required',
            'index_lembaga'=>'required',
            'program'=>'required',

        ]);

        Customer::create([
            'nama'=>request('nama'),
            'nik'=> request('nik'),
            'jenis_kelamin'=>request('jenis_kelamin'),
            'telepon'=> request('telepon'),
            'email'=> request('email'),
            'alamat'=>request('alamat'),
            'index_lembaga'=>request('index_lembaga'),
            'program'=>request('program'),
            'status'=>null

        ]);
        $request->session()->flash('pesan',"Request Anda telah tertampung, pesan penerimaan akan dikirim melalui email/pesan telepon paling lambat 14 hari");
        return redirect()->route('lembagas.home');
    }

}
