<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use function response;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $products = Product::latest()->get();
        if ($request->ajax()) {
            return response()->json($products);
        }
        $counts = $products->countBy(function ($product) {
            return $product->product_type;
        })->toArray();
        $product_types = $products->pluck('product_type')->unique()->values()->toArray();
        return view('admin.products', compact(['counts', 'product_types']));
    }

    public function store(Request $request)
    {
        //validation
        $record = $request->all();
        $rules = [
            'product_name' => "required|unique:products,product_name",
            'product_type' => "required:products,product_type",
            'product_description' => "required:products,product_description",
            'product_price' => "required|numeric:products,price"
        ];
        $messages = [
            'product_name.required' => 'The product name is required.',
            'product_name.unique' => 'A product with that name already exists!',
            'product_description.required' => 'The product description is required.',
            'product_type.required' => 'Please select a product type.',
            'product_price.required' => 'The product price is required.',
            'product_price.numeric' => 'Please enter a numeric value in the product price field.',
        ];

        $validator = Validator::make($record, $rules, $messages);

        //check validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } //save
        else {
            Product::updateOrCreate(['id' => $request->product_id],
                ['product_name' => $request->product_name, 'product_description' => $request->product_description,
                    'product_type' => $request->product_type, 'price' => $request->product_price]);
            $response = ['success' => 'Product saved successfully.'];

        }
        return response()->json($response);

    }

    public function update(Request $request, $id)
    {
        $record = $request->all();
        $rules = [
            'product_type' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric',
            'product_name' => ['required', Rule::unique('products', 'product_name')->ignore($id)]
        ];
        $messages = [
            'product_name.required' => 'The product name is required.',
            'product_name.unique' => 'A product with that name already exists!',
            'product_description.required' => 'The product description is required.',
            'product_type.required' => 'Please select a product type.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'Please enter a numeric value in the product price field.',
        ];
        $validator = Validator::make($record, $rules, $messages);

        //check validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } //save
        else {
            $updated_record = Product::find($id)->update($request->only([
                'product_type', 'product_description', 'price', 'product_name'
            ]));
            $Response = ['success' => 'Product updated successfully.'];
            return response()->json([
                'product' => $updated_record,
            ]);
        }
    }

    public function suspend($id)
    {

        $suspended_record = Product::find($id)
            ->update(['suspended' => 1]);
        $resp = ['success' => 'Product suspended successfully.'];
        return response()->json([
            'product' => $suspended_record,
            'Product suspended successfully' => $resp
        ]);
    }

    public function restore($id)
    {
        $restored_record = Product::find($id)
            ->update(['suspended' => 0]);
        $res = ['success' => 'Product restored successfully.'];
        return response()->json([
            'product' => $restored_record,
            'Product suspended successfully' => $res
        ]);
    }
}
