<?php

class Job
{
    # Properties
    private $company;
    private $title;
    private $date;
    private $city;
    private $state;
    private $country;
    private $description;

    function __construct($title, $company, $date, $city, $state, $country, $description)
    {
        $this->title = $title;
        $this->company = $company;
        $this->date = $date;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->description = $description;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getCompany()
    {
        return $this->company;
    }

    function getDate()
    {
        return $this->date;
    }

    function getCity()
    {
        return $this->city;
    }

    function getState()
    {
        return $this->state;
    }

    function getCountry()
    {
        return $this->country;
    }

    function getDescription()
    {
        $description = html_entity_decode($this->description, ENT_COMPAT, 'UTF-8');
        return str_replace(['"', "'", "$", "[", "]", ":", ";"], '', $description);
    }

    function getPlace()
    {
        return $this->city . ', ' . $this->state . ', ' . $this->country;
    }

}

class JobFactory
{
    public static function create($title, $company, $date, $city, $state, $country, $description)
    {
        return new Job($title, $company, $date, $city, $state, $country, $description);
    }
}

?>