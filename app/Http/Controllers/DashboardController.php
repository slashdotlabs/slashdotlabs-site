<?php

namespace App\Http\Controllers;

use Hash;
use Validator;
use App\Models\CustomerDomain;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
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
     * @return View
     */
    public function index()
    {
        $order_items = Order::has('payment')->with('order_items', 'order_items.product')->get()
            ->flatMap(function ($order) {
                return $order->order_items;
            });
        $product_order_items = $order_items->filter(function (OrderItem $order_item) {
            return $order_item->product_type == Product::class;
        })->groupBy('product.product_type');
        $domains_order_items = $order_items->filter(function (OrderItem $order_item) {
            return $order_item->product_type == CustomerDomain::class;
        })->each(function ($domain_order_item) {
            $domain_order_item->product->load('nameservers');
        })->values();

        return view('dashboard.index',
            [
                'user' => Auth::user(),
                "customer_domains" => $domains_order_items,
                'hosting_packages' => $product_order_items['hosting'],
                'ssl_certificates' => $product_order_items['ssl_certificate'],
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
