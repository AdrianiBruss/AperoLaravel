<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 02/02/15
 * Time: 16:25
 */

class AperoTest extends TestCase{

    protected $mock;

    public function setUp(){
        parent::setUp();
        $this->mock = Mockery::mock('Eloquent', 'Apero');
    }

    public function tearDown(){

        parent::tearDown();
        Mockery::close();

    }

    /**
     * @test
     */
    public function testAperoSuccess(){

        $input = [
            'title' => 'Apero',
            'email'=>'email@email',
            'url_thumbnail'=>'http://image.jpg',
            'abstract'=>'bla',
            'date'=>new DateTime('now'),
            'tag'=>'php',
            'description'=>'blablabla',
            'user_id' => 1,
            'tag_id' => 2
        ];

        $this->mock->shouldReceive('create')
            ->once()
            ->with($input);

        $this->app->instance('Apero', $this->mock);

        $this->call('POST', 'postCreate', $input);

        $this->assertRedirectedToRoute('create', null, ['message'=>'Your post has been created']);


    }


    public function testAperoFails(){

        $input = [
            'title' => '',
            'email'=>'',
            'url_thumbnail'=>'http://image.jpg',
            'abstract'=>'bla',
            'date'=>new DateTime('now'),
            'tag'=>'php',
            'description'=>'blablabla',
            'user_id' => 1,
            'tag_id' => 2
        ];

        $this->call('POST', 'postCreate', $input);

        $this->assertRedirectedToRoute('create');
        $this->assertSessionHasErrors($input);

    }


//    public function testRedirectForm(){
//
//        $this->call('POST', 'postCreate');
//        $this->assertRedirectedToRoute('create', null, ['message'=>'Your post has been created']);
//
//
//    }

}