<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run () {
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('DashboardPreferencesSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'jason@ebash.com',
        	'password' => Hash::make('jason1234'),
        	'remember_token' => 'false',
        ));
    }

}
class DashboardPreferencesSeeder extends Seeder {

    public function run () {
        DB::table('dashboard_preferences')->delete();

        DashboardPreferences::create($array = [
            'twitter_query'  =>  '@ebashindy,@ebashterrehaute,#ebash,@ebashevansville',
            'instagram_tag' =>  'eBash,eBashIndy,LeagueOfLegends',
            'filter_enabled' => TRUE,
            'filter_search' => 'the, ass, it',
            'filter_replace' => 'theee*, aboriginee, it*',
        ]);
    }

}
