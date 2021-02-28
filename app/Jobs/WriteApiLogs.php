<?php

namespace App\Jobs;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WriteApiLogs implements ShouldQueue
{
    public $arr;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param array $arr
     */
    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {

        $updateOrInsertArr = [
            'user_id' => $this->arr['id'],
            'user_agent' => $this->arr['user_agent'],
            'ip' => $this->arr['ip'],
            'country' => $this->arr['country'],
            'product' => $this->arr['product'],
            'created_at' => Carbon::now()->toDateTimeString()
        ];

        $statement = DB::table('api_logs')->where('user_id', '=', $this->arr['id'])
            ->where('user_agent', '=', $this->arr['user_agent'])
            ->where('ip', '=', $this->arr['ip'])
            ->where('country', '=', $this->arr['country'])
            ->where('product', '=', $this->arr['product']);

        $state = $statement->first();

        if (empty($state)){
            DB::table('api_logs')->insert($updateOrInsertArr);
        } else {
            $updateOrInsertArr['counter'] = $state->counter + 1;
            $statement->update($updateOrInsertArr);
        }
    }
}
