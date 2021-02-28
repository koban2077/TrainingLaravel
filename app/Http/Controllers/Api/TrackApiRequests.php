<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\WriteApiLogs;
use App\Models\User;
use Illuminate\Http\Request;

class TrackApiRequests extends Controller
{
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
