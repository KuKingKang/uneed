<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("admins")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $administrator = new \App\Admin;
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@uneed.test";
        $administrator->password = \Hash::make("uneed");

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
