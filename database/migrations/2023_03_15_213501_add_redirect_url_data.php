<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert redirect urls
        DB::table('redirect_urls')->insert(
            [
                [
                    'origin'      => 'SLUG-1',
                    'destination' => 'NEW-SLUG-1',
                    'http_code'   => 301
                ],
                [
                    'origin'      => 'SLUG-2',
                    'destination' => 'NEW-SLUG-2',
                    'http_code'   => 302
                ],
                [
                    'origin'      => 'SLUG-3',
                    'destination' => 'NEW-SLUG-3',
                    'http_code'   => 302
                ],
                [
                    'origin'      => 'SLUG-4',
                    'destination' => '',
                    'http_code'   => 301
                ],
            ]
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
