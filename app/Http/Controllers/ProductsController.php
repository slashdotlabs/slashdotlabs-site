<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;



class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $buttons =
                           '<div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary edit-product" data-id="'.$row->id.'">
                                     Edit
                                 </button>
                                &emsp;&emsp;
                                <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#modal-suspend-product" >
                                    Suspend
                                </button>
                            </div>';
                            return $buttons;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.products');
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
        Product::updateOrCreate(['id' => $request->product_id],
        ['product_name' => $request->product_name, 'product_description' => $request->product_description,
        'product_type' => $request->product_type, 'price' => $request->product_price]);

        return response()->json(['success'=>'Product saved successfully.']);
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
        // TODO: validation

        $updated_record = Product::find($id)->update($request->get('product_details'));
        return \response()->json([
            'msg' => 'Updated product successfully',
            'product' => $updated_record
        ]);
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
    /*

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'product_name' => ['required', 'string', 'max:255'],
            'product_description' => ['required', 'string', 'max:255'],
            'product_type' => ['required', Rule::in(['hosting','ssl_certificate','domain'])],
            'product_price' => ['required', 'decimal', 'max:255'],
        ]);
    } */
}
