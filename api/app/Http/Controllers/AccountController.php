<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;

class AccountController extends Controller
{

    public function __construct (AccountService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request)
    {
        $data = [
            "name" => $request->name,
            "password" => $request->password,
            "account_number" => $request->account_number,
            "account_code" => $request->account_code,
            "agency" => $request->agency,
        ];

        $result = $this->service->create($data);
        return response()->json($result);
    }

    public function processTransaction(Request $request)
    {
        $result = $this->service->processTransaction($request);
        return response()->json($result);
    }

    public function history($account_number, $account_code, $agency)
    {
        $result = $this->service->history($account_number, $account_code, $agency);
        return response()->json($result);
    }

    public function balance($account_number, $account_code, $agency)
    {
        $result = $this->service->balance($account_number, $account_code, $agency);
        return response()->json($result);
    }
}
