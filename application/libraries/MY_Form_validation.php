<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {

        parent::__construct();

    }

    /**
     * Renvoie toutes les erreurs de validation sur un formulaire
     *
     * 
     * @return  array|boolean
     */
    public function getAllErrors() {

        $error_array = array();

        if (count($this->_error_array) > 0) {
             
            //foreach ($this->_error_array as $k => $v) {
            foreach ($this->_error_array as $v) {

                //$error_array[$k] = $v;

                $error_array[] = $v;

            }

            return $error_array;

        }

        return false;

    }

    /**
     * Méthode utilisée par la librairie (form_validation) pour valider les chaînes de caractères de type alpha numérique
     *
     * @param   string $str chaîne de caractère
     * @param   array $params des eventuels paramètres
     * @return  boolean  
     */
    public function alpha_numeric_space($str, $params) {
        return ( ! preg_match("/^([a-zA-ZÀ-ÿ0-9 '])+$/i", $str)) ? FALSE : TRUE;
    }

    /**
     * Alpha-numeric with semicon
     *
     * @param   string
     * @return  bool
     */
    public function alpha_semicolon($str)
    {
        return (bool) preg_match('/^[a-z0-9;]+$/i', $str);
    }



    /**
     * Méthode utilisée par la librairie (form_validation) pour valider la date de naissance
     *
     * @param   string $str la date de naissance
     * @param   array $params des eventuels paramètres
     * @return  boolean  
     */
    public function valide_date($str, $params) {
        
        $format1 = 'd/m/Y';
        //$format2 = 'Y-m-d';
        $date = DateTime::createFromFormat($format1, $str); // On formate la date au format 'jour/mois/année'
        if($date && $date->format($format1) == $str) { // Si la date donnée par l'utilisateur correspond à ce format, alors la date est valide
            return true;
        } else { // Sinon on affiche un message d'erreur
            //$this->form_validation->set_message('validateDate', 'La date de naissance n\'est pas valide. Format: jj/mm/aaaa');
            return false;
        }

    }
    
    /**
     * Méthode utilisée par la librairie (form_validation) pour valider la date de naissance
     *
     * @param   string $str la date de naissance
     * @param   array $params des eventuels paramètres
     * @return  boolean  
     */
    public function valide_datetime($str, $params) {
        
        $format1 = 'd/m/Y H:i:s';
        //$format2 = 'Y-m-d';
        $date = DateTime::createFromFormat($format1, $str); // On formate la date au format 'jour/mois/année'
        if($date && $date->format($format1) == $str) { // Si la date donnée par l'utilisateur correspond à ce format, alors la date est valide
            return true;
        } else { // Sinon on affiche un message d'erreur
            //$this->form_validation->set_message('validateDate', 'La date de naissance n\'est pas valide. Format: jj/mm/aaaa');
            return false;
        }

    }

    

    /**
     * Méthode utilisée par la librairie (form_validation) pour valider la date de naissance
     *
     * @param   string $str la date de naissance
     * @param   array $params des eventuels paramètres
     * @return  boolean  
     */
    public function valide_hour($str, $params) {
        
        $format1 = 'H:i';
        //$format2 = 'Y-m-d';
        $date = DateTime::createFromFormat($format1, $str); // On formate la date au format 'jour/mois/année'
        if($date && $date->format($format1) == $str) { // Si la date donnée par l'utilisateur correspond à ce format, alors la date est valide
            return true;
        } else { // Sinon on affiche un message d'erreur
            //$this->form_validation->set_message('validateDate', 'La date de naissance n\'est pas valide. Format: jj/mm/aaaa');
            return false;
        }

    }




    /**
     * Méthode utilisée par la librairie (form_validation) pour valider la date de naissance
     *
     * @param   string $str la date de naissance
     * @param   array $params des eventuels paramètres
     * @return  boolean  
     */
    public function valide_datetime_not_future($str, $params) {
        
        $format1 = 'd/m/Y H:i:s';
        $now = new DateTime('now');
        //$format2 = 'Y-m-d';
        $date = DateTime::createFromFormat($format1, $str); // On formate la date au format 'jour/mois/année'
        if($date && $date->format($format1) == $str && $date <= $now) { // Si la date donnée par l'utilisateur correspond à ce format, alors la date est valide
            return true;
        } else { // Sinon on affiche un message d'erreur
            //$this->form_validation->set_message('validateDate', 'La date de naissance n\'est pas valide. Format: jj/mm/aaaa');
            return false;
        }

    }






     /**
     * Méthode utilisée par la librairie (form_validation) pour valider la date de naissance
     *
     * @param   string $str la date de naissance
     * @param   array $params des eventuels paramètres
     * @return  boolean  
     */
    public function valide_date_not_future($str, $params) {
        
        $format1 = 'd/m/Y';
        $now = new DateTime('now');
        $date = DateTime::createFromFormat($format1, $str); // On formate la date au format 'jour/mois/année'
        if($date && $date->format($format1) == $str && $date <= $now) { // Si la date donnée par l'utilisateur 
                                                                        // correspond à ce format, alors la date est valide
            return true;
            
        } else { // Sinon on affiche un message d'erreur
            //$this->form_validation->set_message('validateDate', 'La date de naissance n\'est pas valide. Format: jj/mm/aaaa');
            return false;
        }

    }




    public function valide_phone_number($str, $params) {
        if(preg_match("/^\d{2}-\d{2}-\d{2}-\d{2}$/", $str))
            return true;
        else
            return false;
    }



}