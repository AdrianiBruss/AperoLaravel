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
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->mock = Mockery::mock('Eloquent', 'Apero');
        $this->user_id = ['username'=>'Al', 'password'=>'Al'];

    }

    public function tearDown(){

        parent::tearDown();
        Artisan::call('migrate:reset');
        Mockery::close();

    }

    /**
     * @test test aperos on home page
     */
    public function testHome(){

        $this->mock->shouldReceive('all')->once();
        $this->app->instance('Apero', $this->mock);
        $this->call('GET', '/');
        $this->assertViewHas('aperos');

    }

    /**
     * @test test success store apero
     */
    public function testAperoSuccess(){

        $input = [
            'title' => 'Apero',
            'date'=>new DateTime('now'),
            'content'=>'blablabla',
            'user_id' => 1,
            'tag_id' => 2
        ];

        Auth::attempt($this->user_id, false);

        $this->call('POST', 'postCreate', $input);
        $this->assertRedirectedToRoute('home', null);

    }


    /**
     * @test test failing store apero
     */
    public function testAperoFails(){

        Auth::attempt($this->user_id, false);

        $this->call('POST', 'postCreate');

        $this->assertRedirectedToRoute('create', null);
        $this->assertSessionHasErrors(['title', 'content']);

    }

    /**
     * @test test count tags
     */
    public function testCountTag(){

        $input = [
            'title' => 'Apero',
            'date'=>new DateTime('now'),
            'content'=>'blablabla',
            'user_id' => 1,
            'tag_id' => 2
        ];

        Auth::attempt($this->user_id, false);

        $tag = Tag::findOrFail(8);
        $this->assertEquals(0, $tag->count_apero);
        $this->call('POST', 'postCreate', $input);

    }

}