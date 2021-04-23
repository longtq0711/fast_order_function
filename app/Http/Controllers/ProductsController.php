<?php

namespace App\Http\Controllers;
use App\FastOrders;
use App\Users;
use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Void_;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Products::all(['*']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
//        $this->validate($request,[
//            'link' => 'require',
//            'note' => 'require'
//        ])
        if($request->products != []){
            $insert = new FastOrders();
            $insert->name = $request->name;
            $insert->phonenumber = $request->phonenumber;
            $insert->address = $request->address;
            $insert->save();
        }
//        DB::table('fast_orders')->insert([
//            'name' => $request->input('name'),
//            'phonenumber' => $request->input('phonenumber'),
//            'address' =>$request->input('address')
//        ]);
        for ($i = 0; $i < count($request->products); $i++) {
            $answers[] = [
                'link' => $request->products[$i]['link'],
                'note' => $request->products[$i]['note'],
                'order_id' => $insert->id
            ];

        };

        Products::insert($answers);
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
}
