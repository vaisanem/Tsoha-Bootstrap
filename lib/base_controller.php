<?php

  class BaseController{

    public static function get_user_logged_in(){
        if (isset($_SESSION['person'])) {
            $id = $_SESSION['person'];
            $person = Person::find($id);
            return $person;
        }
        return null;
    }

    public static function check_logged_in(){
        if (!isset($_SESSION['person'])) {
            Redirect::to('/kirjaudu', array('message' => 'Sinun on kirjauduttava ensin.'));
        }
    }
    
    public static function check_mode(){
        if (isset($_SESSION['person'])) {
            $person = self::get_user_logged_in();
            if ($person->mode == 0) {
                Redirect::to('/asetukset', array('message' => 'Yritit tehdä muutoksia, vaikka sinulla ei ole muokkausoikeuksia.'));
            }
        }
    }

  }
