<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Library\SentryUtils;
use \App\Sentry;
use Illuminate\Foundation\Testing\Concerns\ImpersonatesUser;

class SentryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;


    public function testNoFeatures(){

      $user = \App\User::firstOrCreate(['username'=>'temp']);
      $sentry = new SentryUtils($user);
      $this->assertEquals($sentry->getFirstName(),$user->username);
      $this->assertEquals($sentry->getLastName(),'Not in Sentry');
      $this->assertEquals($sentry->getEmail(),'email@not.registred.com');
      $this->assertFalse($sentry->hasAccessToFeature('/FEATURE'));
      $this->assertEquals($sentry->getTotalRows(),0);

    }

    public function testHasFeature(){

      $user = \App\User::firstOrCreate(['username'=>'temp']);
      $sentryModel = new Sentry();

      $sentryModel->login='temp';
      $sentryModel->first_name='First';
      $sentryModel->last_name='Last';
      $sentryModel->email='temp@email.com';
      $sentryModel-> feature='/FEATURE';
      $sentryModel->access_mode='I';
      $sentryModel->save();


      $sentry = new SentryUtils($user);
      $this->assertEquals($sentry->getFirstName(),'First');
      $this->assertEquals($sentry->getLastName(),'Last');
      $this->assertEquals($sentry->getEmail(),'temp@email.com');
      $this->assertTrue($sentry->hasAccessToFeature('/FEATURE'));
      $this->assertEquals($sentry->getTotalRows(),1);

    }

  public function testHasMoreFeatures(){

    $user = \App\User::firstOrCreate(['username'=>'temp']);


    for($i=1;$i<=3;$i++) {
      $sentryModel = new Sentry();
       $sentryModel->login = 'temp';
      $sentryModel->first_name = 'First';
      $sentryModel->last_name = 'Last';
      $sentryModel->email = 'temp@email.com';
      $sentryModel->feature = '/FEATURE';
      $sentryModel->access_mode = 'I';
      $sentryModel->save();
    }


    $sentry = new SentryUtils($user);
    $this->assertEquals($sentry->getFirstName(),'First');
    $this->assertEquals($sentry->getLastName(),'Last');
    $this->assertEquals($sentry->getEmail(),'temp@email.com');
    $this->assertTrue($sentry->hasAccessToFeature('/FEATURE'));
    $this->assertEquals($sentry->getTotalRows(),3);

  }

  public function testHasPartialFeature(){

    $user = \App\User::firstOrCreate(['username'=>'temp']);
    $sentryModel = new Sentry();

    $sentryModel->login='temp';
    $sentryModel->first_name='First';
    $sentryModel->last_name='Last';
    $sentryModel->email='temp@email.com';
    $sentryModel-> feature='/PARTIALFEATURE/VIEW';
    $sentryModel->access_mode='I';
    $sentryModel->save();


    $sentry = new SentryUtils($user);
    $this->assertEquals($sentry->getFirstName(),'First');
    $this->assertEquals($sentry->getLastName(),'Last');
    $this->assertEquals($sentry->getEmail(),'temp@email.com');
    $this->assertTrue($sentry->hasAccessToFeature('/PARTIALFEATURE'));
    $this->assertEquals($sentry->getTotalRows(),1);

  }

  public function testHasOrFeature(){

    $user = \App\User::firstOrCreate(['username'=>'temp']);
    $sentryModel = new Sentry();

    $sentryModel->login='temp';
    $sentryModel->first_name='First';
    $sentryModel->last_name='Last';
    $sentryModel->email='temp@email.com';
    $sentryModel-> feature='/FEATURE/VIEW';
    $sentryModel->access_mode='I';
    $sentryModel->save();


    $sentry = new SentryUtils($user);
    $this->assertEquals($sentry->getFirstName(),'First');
    $this->assertEquals($sentry->getLastName(),'Last');
    $this->assertEquals($sentry->getEmail(),'temp@email.com');
    $this->assertTrue($sentry->hasAccessToFeature('/FEATURE/VIEW|/ADMINISTRATOR'));
    $this->assertEquals($sentry->getTotalRows(),1);

  }



}
