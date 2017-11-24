<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A test create.
     *
     * @return void
     */
    public function testCreate()
    {
        $data= [
            'firstName' => str_random(10),
            'lastName' => str_random(10),
            'email' => str_random(5).'@school.com',
            'password' => bcrypt('secret')
        ];
        $user = User::create($data);
        $user->save();
        $expered = User::where('id',$user->id)->get();
        $this->assertTrue(!$expered->isEmpty());
    }

    /**
     * A test notexist.
     *
     * @return void
     */
    public function testUserShouldNotExist()
    {

        $expered = User::where('id',-1)->get();
        $this->assertTrue($expered->isEmpty());

    }
}
