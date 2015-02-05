<?php

class LoginTest extends TestCase{

    public $user_id;

    public function setUp(){

        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->user_id = ['username'=>'Al', 'password'=>'Al'];

    }

    public function tearDown(){

        parent::tearDown();
        Artisan::call('migrate:reset');
        Mockery::close();

    }

    /**
     * @test test page login
     */
    public function testLogin()
    {

        Auth::shouldReceive('attempt')->once()->andReturn('true');
        $this->call('POST', 'register', $this->user_id);
        $this->assertRedirectedToRoute('home', null);

    }

    /**
     * @test test success login
     */
    public function testLogout(){

        Route::enableFilters();
        Auth::shouldReceive('check')->once()->andReturn('true');
        Auth::shouldReceive('logout')->once()->andReturn('true');
        $this->call('GET', 'logout');


    }

}