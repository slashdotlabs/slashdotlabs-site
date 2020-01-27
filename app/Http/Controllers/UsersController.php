<?php

namespace App\Http\Controllers;

use App\Models\CustomerBiodata;
use App\Events\AdminRegisterUserEvent;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use function response;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        // $users = User::all();
        // return view('admin.users', ['users' => $users]);
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->suspended == 0) {

                        $buttons =
                            '<div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-dark suspend-user" data-id="' . $row->id . '" >
                                    Suspend
                                </button>
                            </div>';
                        return $buttons;
                    } else {
                        $buttons =
                            '<div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-dark restore-user" data-id="' . $row->id . '" >
                                    Restore
                                </button>
                            </div>';
                        return $buttons;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $customers = User::where('user_type', 'customer');
        $admins = User::where('user_type', 'admin');
        $employees = User::where('user_type', 'employee');

        return view('admin.users',
            [
                'customers' => $customers,
                'admins' => $admins,
                'employees' => $employees,
            ]);
    }

    //Admin add users

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        //validation
        $record = $request->all();
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'user_type' => 'required',
            'email' => 'required|email|unique:users,email',
        ];
        $messages = [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'user_type.required' => 'The user type is required.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter the email address in the correct format.',
            'email.unique' => 'An account with this email address exists!',
        ];

        $validator = Validator::make($record, $rules, $messages);

        //check validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
            $response = $validator->errors();
        } //save
        else {
            //generate and hash password
            $password =  Str::random(15);
            $hashed_password = Hash::make($password);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'user_type' => $request->user_type,
                'password' => $hashed_password
            ]);

            $response = ['success' => 'User added successfully.'];

            event(new AdminRegisterUserEvent($user));

        }
        return response()->json($response);

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

    public function suspend($id)
    {

        $suspended_record = User::find($id)
            ->update(['suspended' => 1]);
        $resp = ['success' => 'User suspended successfully.'];
        return response()->json([
            'user' => $suspended_record,
            'User suspended successfully' => $resp
        ]);
    }

    public function restore($id)
    {

        $restored_record = User::find($id)
            ->update(['suspended' => 0]);
        $response = ['success' => 'User restored successfully.'];
        return response()->json([
            'user' => $restored_record,
            'User restored successfully' => $response
        ]);
    }
}
