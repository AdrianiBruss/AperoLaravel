<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 02/02/15
 * Time: 16:25
 */

class AperoTest extends TestCase{

    protected $mock;
    protected $user_id;

    public function setUp(){

        parent::setUp();
        $this->mock = Mockery::mock('Eloquent', 'Apero');
        $this->user_id = ['username'=>'Al', 'password'=>'Al'];

    }

    public function tearDown(){

        parent::tearDown();
        Mockery::close();

    }

    /**
     * @test testHome
     */
    public function testHome(){

        $this->mock->shouldReceive('all')->once();
        $this->app->instance('Apero', $this->mock);
        $this->call('GET', '/');
        $this->assertViewHas('aperos');

    }

    /**
     * @test testAperoSuccess
     */
    public function testAperoSuccess(){

        Auth::attempt($this->user_id, false);

        $input = [
            'title' => 'Apero',
            'date'=>new DateTime('now'),
            'content'=>'blablabla',
            'user_id' => 1,
            'tag_id' => 2
        ];

        $this->call('POST', 'postCreate', $input);
        $this->assertRedirectedToRoute('home', null);

    }


    /**
     * @test testAperoFails
     */
    public function testAperoFails(){

        Auth::attempt($this->user_id, false);

        $this->call('POST', 'postCreate');
        $this->assertRedirectedToRoute('create', null);
        $this->assertSessionHasErrors(['title', 'content']);

    }



}