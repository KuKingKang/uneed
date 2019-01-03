<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("users")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->nama = "Site Administrator";
        $administrator->email = "administrator@larashop.test";
        $administrator->no_hp = "08080808";
        $administrator->tipe_user = "Gratis";
        $administrator->jml_pakai = 3;
        
        $administrator->password = \Hash::make("larashop");

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
