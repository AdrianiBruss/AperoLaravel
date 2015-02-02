<?php


class TagsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tags')->insert(array(

				["name" => "php"],
				["name" => "AngularJS"],
				["name" => "AngularJS/Laravel"],
				["name" => "Fabric"],
				["name" => "PHPUnit"],
				["name" => "Behat"],
				["name" => "Travis"],
				["name" => "Gulp"],

		));
	}

}