<?php
namespace App\Http\Controllers;
use App\Models\Lembaga;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function Adm(){
        return view ('admin.index');
    }
    public function AdminLembaga(){
        $lembagas = DB::select('select * from lembagas where status IS NULL');
        return view('admin.lembaga',['lembagas' => $lembagas]);
    }
    public function AdminCustomer(){
        $customers = DB::select('select * from customers where status IS NULL');
        return view('admin.customer',['customers' => $customers]);
    }
    public function AdminCustomerDetail(Customer $customer){
        $pdf = PDF::loadview('admin.cstdetail',['customer'=>$customer]);
    	return $pdf->stream('data_diri_pendaftar.pdf');
    }
    public function AdminLembagaDetail(Lembaga $lembaga){
        return view('admin.lmbgdetail', ['lembaga' => $lembaga]);
    }
    // public function destroy(Lembaga $lembaga){
    //     $lembaga->delete();
    // }
    // public function destroy(Customer $customer){
    //     $customer->delete();
    // }

    public function approve($id){
        $leave = Lembaga::findOrFail($id);
        $leave->status = 1; //Approved
        $leave->save();
        return redirect()->back(); //Redirect user somewhere
     }

     public function decline($id){
        $leave = Lembaga::findOrFail($id);
        $leave->status = 0; //Declined
        $leave->save();
        return redirect()->back(); //Redirect user somewhere
     }

     public function checked($id){
        $leave = Customer::findOrFail($id);
        $leave->status = 1; //Approved
        $leave->save();
        return redirect()->back(); //Redirect user somewhere
     }
}
