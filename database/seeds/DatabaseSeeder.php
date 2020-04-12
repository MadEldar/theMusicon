<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(
            "INSERT INTO users (first_name,last_name,user_email,user_role,user_status,previous_status,email_verified_at,password,remember_token,created_at,updated_at) VALUES
            ('Admin','','admin@theMusicon.com',0,2,NULL,NULL,'d9a5a080fea1',NULL,'2020-04-02 12:29:45.0','2020-04-02 16:36:26.0');"
        );
    }
}
