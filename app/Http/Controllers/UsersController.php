<?php

namespace App\Http\Controllers;

use App\Models\CustomerBiodata;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    /**
     * Update user data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $validator = $this->update_validator($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }

        $user = Auth::user();
        if ($request->get('user_details')) {
            $user->update($request->get('user_details'));
        }
        if ($request->get('customer_biodata')) {
            $user->load('customer_biodata');
            if (empty($user->customer_biodata)) {
                $user->customer_biodata()->save(new CustomerBiodata($request->get('customer_biodata')));
            } else {
                $user->customer_biodata->update($request->get('customer_biodata'));
            }
            $user->push();
        }
        return response()->json([
            'msg' => 'Records updated successfully'
        ]);
    }

    public function update_validator($data)
    {
        // Validate
        $rules = [
            'user_details' => 'sometimes|array',
            'user_details.email' => 'sometimes|required',
            'user_details.first_name' => 'sometimes|required',
            'user_details.last_name' => 'sometimes|required',
            'customer_biodata' => 'sometimes|array',
            'customer_biodata.organization' => 'sometimes|required',
            'customer_biodata.address' => 'sometimes|required',
            'customer_biodata.city' => 'sometimes|required',
            'customer_biodata.country' => 'sometimes|required',
            'customer_biodata.phone_number' => 'sometimes|required|regex:/(2547)[0-9]{8}/', // ?phone number starts with 2547 followed by 8 digits
        ];
        $messages = [
            'customer_biodata.phone_number.regex' => 'Enter a valid phone number',
            'customer_biodata.phone_number.required' => 'Phone number is required',
            'customer_biodata.organization.required' => 'Organization is required',
            'customer_biodata.address.required' => 'Address is required',
            'customer_biodata.city.required' => 'City is required',
            'customer_biodata.country.required' => 'Country is required',
            'user_details.first_name.required' => 'First name field is required',
            'user_details.last_name.required' => 'Last name field is required',
            'user_details.email.required' => 'Email field is required',
        ];

        return Validator::make($data, $rules, $messages);
    }

    public function changePassword(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->passwordRules($request_data);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        if (!Hash::check($request_data['current_password'], Auth::user()->password)) {
            return response()->json('Please enter correct current password', 422);
        }
        $user = Auth::user();
        $user->password = Hash::make($request_data['new_password']);
        $user->save();
        return response()->json(['msg' => 'Password successfully changed!'], 200);
    }

    public function passwordRules(array $data)
    {
        $messages = [
            'current_password.required' => 'Please enter current password',
            'new_password.required' => 'Please enter password',
            'new_password.confirmed' => 'Passwords must match'
        ];

        return Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ], $messages);
    }
}
