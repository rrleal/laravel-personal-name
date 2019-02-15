<?php

namespace Rleal\NameFormatter;

trait NameFormatter
{

    protected $user;

    protected $firstName;

    protected $middleName;

    protected $lastName;

    protected $separator = ' ';

    public function name()
    {
        $this->user = $this;

        $this->setNames();

        return $this;
    }

    public function setNames()
    {

        $this->setFirstName();

    }

    public function setFirstName()
    {

        if ( $this->hasFirstName() ) {

            $this->firstName = $this->getAttribute('first_name');

        }

        $this->firstName = array_first(
            explode($this->separator, $this->getAttribute(
                array_first(
                    $this->names
                )
            ))
        );

    }

    public function setMiddleName()
    {

        if ( $this->hasMiddleName() ) {

            $this->middleName = $this->getAttribute('middle_name');

        }

        $this->middleName = array_first(
            explode(' ', $this->getAttribute(
                array_first(
                    $this->names
                )
            ))
        );

    }

    public function setLastName()
    {

        if ( $this->hasLastName() ) {

            $this->lastName = $this->getAttribute('last_name');

        }

        $this->lastName = array_last(
            explode($this->separator, $this->getAttribute(
                array_first(
                    $this->names
                )
            ))
        );

    }

    public function hasFirstName()
    {

        if ( array_key_exists('first_name', $this->names) ) {
            return true;
        }

        return false;

    }

    public function hasMiddleName()
    {

        if ( array_key_exists('middle_name', $this->names) ) {
            return true;
        }

        return false;

    }

    public function hasLastName()
    {

        if ( array_key_exists('last_name', $this->names) ) {
            return true;
        }

        return false;

    }

    public function format($style = null){
        return $this->firstName;
    }

    public function initials(){

    }

    public function capitalize(){

    }

    public function compact(){

    }

}
