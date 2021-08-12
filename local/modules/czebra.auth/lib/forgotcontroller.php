<?php

namespace Czebra\Auth;

class ForgotController
{
   public static function setNewPassword($USER_ID, $password, $regExp)
   {
       if ( preg_match($regExp, $password) )
       {
           $user = new \CUser;
           $fields = [
               "ACTIVE" => "Y",
               "PASSWORD" => $password,
               "CONFIRM_PASSWORD" => $password,
           ];
           $user->Update($USER_ID, $fields);
           if ( $user->LAST_ERROR ) {
               $result['error'] = $user->LAST_ERROR;
               $result['success'] = false;
           } else {
               $result['success'] = true;
           }
       } else {
           $result['success'] = false;

           $result['test'] = [
               'p' => $password,
               'rg' => $regExp,
               'id' => $USER_ID
           ];


           $result['password_is_valid'] = false;
           return $result;
       }
       return $result;
   }


}