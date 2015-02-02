<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{

		DB::table('users')->insert(array(

			array(

				"username"=>"Alexandre",
				"password"=>Hash::make('Alexandre'),
				"role"=>"admin",
				"status"=>"online"

			),
			array(

				"username"=>"Al",
				"password"=>Hash::make('Al'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Abel",
				"password"=>Hash::make('Abel'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Alan",
				"password"=>Hash::make('Alan'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Arthur",
				"password"=>Hash::make('Arthur'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Carl",
				"password"=>Hash::make('Carl'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Blaise",
				"password"=>Hash::make('Blaise'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Isaac",
				"password"=>Hash::make('Isaac'),
				"role"=>"visitor",
				"status"=>"online"

			),
			array(

				"username"=>"Steve",
				"password"=>Hash::make('Steve'),
				"role"=>"visitor",
				"status"=>"online"

			),

		));

	}

}