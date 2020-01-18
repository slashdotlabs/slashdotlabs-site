<?php

namespace App\Http\Controllers;

use App\Models\Nameserver;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NameserversController extends Controller
{
    public function store(Request $request)
    {
        // validate
        $rules = [
            'nameservers' => 'required|array',
            'nameservers.*' => [
                'sometimes', 'ip',
                Rule::unique('nameservers', 'ip_address')
                    ->ignore($request->get('domain_id'), 'domain_d')
                    ->where(function (Builder $query) use ($request) {
                        return $query->where([
                            'deleted_at' => null
                        ]);
                    })
            ],
        ];
        $messages = [
            'nameservers.*.ip' => 'Enter a valid ip address',
            'nameservers.*.unique' => 'Duplicate ip address'
        ];
        Validator::make($request->all(), $rules, $messages)->validate();


        dd($request->all());

        // handle addition
        $new_nameservers_list = $request->only('add-nameservers[]');
        $new_nameservers = Nameserver::upadateOrCreate();
    }
}
