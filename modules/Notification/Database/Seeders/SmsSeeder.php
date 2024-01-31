<?php

namespace Modules\Notification\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Notification\Models\ShortMessage;

class SmsSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'title' => 'this is test sms text 1',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 2',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 3',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 4',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 5',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 6',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 7',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'title' => 'this is test sms text 8',
                'text' => 'this is test text for body',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        foreach ($messages as $msg) {
            ShortMessage::create($msg);
        }

    }
}
