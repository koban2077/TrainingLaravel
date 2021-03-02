<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\WriteApiLogs;
use App\Models\ApiLog;
use App\Models\User;
use Illuminate\Http\Request;

class TrackApiRequests extends Controller
{
    public function index(Request $request)
    {
        $logs = ApiLog::with('user:id,name');

        if ($request->filled('filter')){
            $filter = $request->only(['filter']);
            if ($filter['filter'] == 'From new to old'){
                $logs = $logs->orderByDesc('created_at');
            }
        }

        $logs = $logs->get();
        return view('apis.index', compact('logs'));
    }

    public function track(Request $request)
    {
        $apiToken = $request->only('api_token');

        $user = User::where('api_token', '=', $apiToken)->firstOrFail();
        $userId = $user->id;

        $arr = $request->only(['country', 'product']);
        $arr['id'] = $userId;
        $arr['ip'] = $request->ip();
        $arr['user_agent'] = $request->userAgent();

        WriteApiLogs::dispatch($arr);
    }
}
