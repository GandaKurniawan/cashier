<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\m_produk;

class c_pembayaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = m_produk::paginate(8);
        $error = false;
        return view('pembayaran', compact('data', 'error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
 
        if($request->ajax())
            {
                $products=  m_produk::where('nama','LIKE','%'.$request->search."%")->get();
                ;
                foreach($products as $produk){

                    $output[] = $produk->id_produk;
                }
                return Response($output);
                }
         }


    //     if($request->ajax()){
    //         $query = $request->get('query');
    //         if($query != ''){
    //             $data = m_produk::where('produk' , 'like' , $query , '%')->get();
    //         }
    //     else{
    //         $data = m_produk::where('produk')->get();
    //     }
    // }
    //     $total_row = $data->count();
    //     if($total_row > 0){
    //         foreach($data as $row){
    //             $output .= '
    //             <tr>
    //                 <td>'.$row->produk.'</td> 
    //             </tr>
    //             ';
    //         }
    //     }
    //     else
    //     {
    //             $output .= '
    //             <p> Tidaka Ada Data </p>
    //             ';   
    //     }
    //     $data = array(
    //             'tabel_data' => $output,
    //             'tota_data' => $total_row
    //     );
    //     $x = json_encode($data);
    //     return $x;
}
