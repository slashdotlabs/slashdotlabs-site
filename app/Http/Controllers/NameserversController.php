<?php

namespace App\Http\Controllers;

use App\Models\Nameserver;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class NameserversController extends Controller
{
    public function store(Request $request)
    {
        // validate
        $rules = [
            'formNameservers' => 'required|array',
            'formNameservers.*' => 'ip',
            'domainNameservers' => 'present|array',
            'domain_id' => 'required'
        ];
        $messages = [
            'formNameservers.*.ip' => 'Enter a valid ip address',
        ];
        Validator::make($request->all(), $rules, $messages)->validate();

        // Delete removed nameservers
        collect($request->get('domainNameservers'))
            ->pluck('ip_address')
            ->diff(collect($request->get('formNameservers')))
            ->tap(function ($ip_addresses) use (&$request) {
                Nameserver::where('domain_id', $request->get('domain_id'))
                    ->whereIn('ip_address', $ip_addresses)
                    ->update(['deleted_at' => now()]);
            });

        // Add new ones
        collect($request->get('formNameservers'))
            ->map(function ($entry) use (&$request) {
                return [
                    'ip_address' => $entry,
                    'domain_id' => $request->get('domain_id'),
                ];
            })
            ->tap(function ($entries) use (&$request) {
                Nameserver::upsert($entries->toArray(), ['ip_address', 'domain_id'], ['deleted_at' => null]);
            });

        // Get nameservers
        $nameservers = Nameserver::where('domain_id', $request->get('domain_id'))
            ->whereNull('deleted_at')
            ->get();
        return response()->json([
            'domain_id' => $request->get('domain_id'),
            'nameservers' => $nameservers
        ]);
    }
}
