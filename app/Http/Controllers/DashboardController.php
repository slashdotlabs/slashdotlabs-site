<?php

namespace App\Http\Controllers;

use Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomerBiodata;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display dashboard
     *
     * @return Factory|View
     */
    public function index()
    {
        $user = auth()->user();
        $orders = Order::has('payment')->with('order_items', 'order_items.product')->get();
        $hosting_packages = $orders->flatMap(function ($order) {
            return $order->order_items;
        })->filter(function (OrderItem $order_item) {
            return $order_item->product->product_type == 'hosting';
        })->map(function (OrderItem $hosting_order_item) {
            return [
                'order_id' => $hosting_order_item->order->order_id,
                'package_name' => $hosting_order_item->product->product_name,
                'package_description' => $hosting_order_item->product->product_description,
                'expiry_date' => $hosting_order_item->expiry_date,
                'status' => $hosting_order_item->get_item_status()
            ];
        })->values();

        $id = '';

        $orders = $user->customer_orders;
        foreach ($orders as $order) {
            $id = $order->customer_id;
        }


        $order_id = DB::table('orders')->select('order_id')
            ->where('customer_id', '=', $id)->value('order_id');

        //echo $order_id;


        $order_items = OrderItem::find($order_id);


        return view('dashboard.index',
            [
                "customer_domains" => $user->customer_domains,
                "user" => $user,
                "order_items" => $order_items,
                'hosting_packages' => $hosting_packages
            ]);

    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make(
            $request->all(),
            [
                'email' => "required|email|unique:users,email,{$id}"
            ],
            [
                'email.required' => 'The email field is required !',
                'email.unique' => 'This email already exists !',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
            $Response = $validator->errors();
        } else {
            //update email
            $user->email = $request->input('email');
            $user->save();
            $Response = ['success' => 'Email successfully updated'];
        }

        // return redirect('/')->with('success', 'Updated');
        return response()->json($Response);
        
    }

    public function passwordRules(array $data)
    {
        $messages = [
        'current_password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current_password' => 'required',
        'new_password' => 'required|min:6|same:new_password',
        'confirm_password' => 'required|min:6|same:new_password',     
      ], $messages);

      return $validator;
    }

    public function changePassword(Request $request) 
    {
        if(Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->passwordRules($request_data);

            if($validator->fails()) {

                //return response()->json(array('error' => $validator->getMessageBag()->toArray()), 422);
                return response()->json($validator->errors(), 422);

            } else {  

              $current_password = Auth::User()->password;           
              if(Hash::check($request_data['current_password'], $current_password)) {           
                $user_id = Auth::User()->id;                       
                $user = User::find($user_id);
                $user->password = Hash::make($request_data['new_password']);;
                $user->save(); 
                $Response = ['success' => 'Password successfully changed !'];
                return response()->json($Response, 200);
              }
              else {           
                $Response = ['error' => 'Please enter correct current password'];
                return response()->json($Response, 422);   
              }
            }        
        } 
    }

    public function changeBio(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make(
            $request->all(),
            [
                'organization' => 'required',
                'address' => 'required',
                'city' => 'required',
                'country' => 'required',
            ]);
        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
            $Response = $validator->errors();
        } else {
            // change customer bio data
            $user->customer_biodata->organization = $request->input('organization');
            $user->customer_biodata->address = $request->input('address');
            $user->customer_biodata->city = $request->input('city');
            $user->customer_biodata->country = $request->input('country');
            $user->customer_biodata->save();
            $Response = ['success' => 'Successfully Updated !'];
        }
        return response()->json($Response);
    }

}
