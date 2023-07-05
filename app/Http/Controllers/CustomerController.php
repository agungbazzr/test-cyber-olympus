<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\CustomerModel;

class CustomerController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $query)
    {
        if(isset($_GET['q'])){
            $customer = CustomerModel::where('nama','LIKE' ,'%'.$query->q.'%')->orWhere('alamat','LIKE' ,'%'.$query->q.'%')->orWhere('nomor_telepon','LIKE' ,'%'.$query->q.'%')->orderBy('nama')->paginate(10);
            $customer->appends($query->all());
        }elseif(isset($_GET['before'])){
            $before = date($query->before);
            $after = date($query->after);
            $customer = CustomerModel::whereBetween('tanggal_registrasi',[$after,$before])->orderBy('nama')->paginate(10);
            $customer->appends($query->all());
        }else{
            $customer = CustomerModel::orderBy('nama')->paginate(10);
        }
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $customer = CustomerModel::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        if($customer){
            $msg =  'Customer Berhasil di Tambahkan!';
            return response()->json(array('msg'=> $msg), 200);
        } else {
            $msg =  'Customer gagal di Tambahkan';
            return response()->json(array('msg'=> $msg), 200);
        }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $customer = CustomerModel::where('id', $id)->get();

        return view('customer.edit', ['cust' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // update data
        $customer = array(
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        );

        $update = CustomerModel::where('id',$id)->update($customer);

        if($update){
            $msg =  'Customer Berhasil di Ubah!';
            return response()->json(array('msg'=> $msg), 200);
        } else {
            $msg =  'Customer gagal di Ubah';
            return response()->json(array('msg'=> $msg), 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $customer = CustomerModel::find($id)->delete();
		  
            return redirect('customer')->with('msg', 'CustomerModel Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('customer')->with('msg', 'CustomerModel Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
