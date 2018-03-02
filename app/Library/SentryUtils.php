<?php
/**
 * Created by PhpStorm.
 * User: Andersen Pecorone
 * Date: 02/03/2018
 * Time: 13:26
 */


namespace App\Library;


class SentryUtils {

  protected $user;
  protected $sentryFeatures;
  protected $first_name;
  protected $last_name;
  protected $email;

  public function __construct($user){
    $this->user = $user;
    $this->sentryFeatures =  \App\Sentry::where('login','=', $this->user->username)->get();
    if($this->sentryFeatures === null){
      $this->first_name = $this->user->username;
      $this->last_name = 'Not in Sentry';
      $this->email = 'email@not.registred.com';
    }else{
      $this->first_name = $this->sentryFeatures->first()->first_name;
      $this->last_name = $this->sentryFeatures->first()->last_name;
      $this->email = $this->sentryFeatures->first()->email;
    }

  }

    /**
     * @return mixed
     */
    public function getFirstName() {
      return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
      return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
      return $this->email;
    }

    public function hasAccessToFeature($feature){
      if(strpos($feature,'|')){
        $features = explode('|',$feature);
        foreach ($features as $x){
          if($this->sentryFeatures->where('feature','LIKE', '%'.$x.'%' )->exists()){
            return true;
          }
        }
      }else{
        return  $this->sentryFeatures->where('feature','LIKE', '%'.$feature.'%' )->exists();
      }
      return false;

    }







}