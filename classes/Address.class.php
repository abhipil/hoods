<?php
require_once('classes/Profile.class.php');


/**
 *
 */
abstract class Address extends Profile
{
    protected $aptnum;
    protected $buldnum;
    protected $street;
    protected $city;
    protected $state;
    protected $zip;
    protected $lat;
    protected $lng;

    function __construct()
    {
    }

    public function setAddressLoc($address, $lat, $lng)
    {
        if ($this->matchAddrwithLoc($address, $lat, $lng)) ;
        $this->checkaddress($address);
        $this->checkLoc($lat, $lng);
    }

    /**
     * @func private matchAddrwithLoc
     * @description Matches $address with $lat and $lng using a Google Maps API call
     * @param $address  User input/Geocoded
     * @param $lat  User input/Geocoded
     * @param $lng  User input/Geocoded
     * @return bool returns true if match else false
     * https://trello.com/c/WXCtlRtn
     */
    private function matchAddrwithLoc($address, $lat, $lng)
    {
        return true;
    }

    private function checkaddress($address)
    {
        $exploded = array_filter(explode(",", $address), 'strlen');
        $country = trim(array_pop($exploded));
        if ($this->exists($country) && (strcmp($country, "USA") == 0)) {
            list($state, $zip) = array_filter(explode(" ", trim(array_pop($exploded))), 'strlen');
            if ($this->exists($zip))
                $this->zip = trim($zip);
            else
                return false;
            if ($this->exists($state))
                $this->state = trim($state);
            else
                return false;
            $this->city = trim(array_pop($exploded));
            list($buldnum, $street) = array_filter(explode(" ", array_pop($exploded), 2), "strlen");
            $this->street = $street;
            $this->buldnum = $buldnum;
        } else {
            $this->setPageError("out_of_ny");
            return false;
        }
        return true;
    }

    private function checkLoc($lat, $lng)
    {
        if (strlen(substr($lat, strpos($lat, '.') + 1)) > 6) {
            $this->lat = round($lat + 0, 7);
            $this->lng = round($lng + 0, 7);
        } else
            return false;
        return true;
    }

    public function addnewAddress()
    {
        $stmt = "INSERT INTO address (uid,lat,lng,aptnum,bldgnum,street,city,state,zip) VALUES (?,?,?,?,?,?,?,?,?)";
        if (isset($this->userid))
            $params = array($this->userid, $this->lat, $this->lng, $this->aptnum, $this->buldnum, $this->street, $this->city, $this->state, $this->zip);
        else
            return false;
        return DB::insert($stmt, $params, array());
    }

    public function addnewLocation()
    {

    }

    public function getallblockbounds($params)
    {

    }
}


?>