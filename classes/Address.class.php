<?php
require_once('classes/DB.class.php');
require_once('classes/Model.class.php');


/**
 *
 */
abstract class Address extends Model
{
    protected $aptnum;
    protected $buldnum;
    protected $street;
    protected $city;
    protected $state;
    protected $zip;
    protected $lat;
    protected $lng;

    function __construct($argument)
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
     * https://trello.com/c/LFsFJGBM
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
        $P = $params;
        $V = null;
        $ret = array();
        $stmt = 'select bid,lat,lng FROM hoods.blockbounds order by bid,next asc;';
        $rows = DB::select($stmt, $params = array(), $result = array());
        $stmt = 'select distinct(bid) from blockbounds';
        $blocks = DB::select($stmt, $params = array(), $result = array());
        foreach ($blocks as $block) {
            foreach ($rows as $row) {
                if ($row['bid'] == $block['bid']) {
                    $V[] = array($row['lat'], $row['lng']);
                }
            }
            if ($this->isinPolygon($P, $V) != 0) {
                $ret[] = array('bid' => $block['bid'],
                    'bounds' => $V);
            }
            $V = array();
        }
        echo json_encode($ret, JSON_PRETTY_PRINT);
        die();
    }


    /**
     * isinPolygon: Checks if point lies in a polygon
     *
     * @param {array(2)}            $P: x,y coordinates of a point
     * @param {array(3).{array(2)}  $V: vertices of polygon
     *
     * @return {int}                  $wn: winding number of point wrt to polygon
     *                                 (=0) only if point outside polygon
     *
     * @comments : Adapted from here
     * http://www.dgp.toronto.edu/~mac/e-stuff/point_in_polygon.py
     *
     */
    function isinPolygon($P, $V)
    {
        $wn = 0;                                                        // the winding number counter
        $V[count($V)] = $V[0];
        $i = 0;                                                         // loop through all edges of the polygon
        while ($i < (count($V) - 1)) {                                  // edge from V[i] to V[i+1]
            if ($this->is_greater($P[1], $V[$i][1])) {                  // start y <= P[1]
                if ($this->is_greater($V[$i + 1][1], $P[1]))            // an upward crossing
                    if ($this->is_left($V[$i], $V[$i + 1], $P) > 0)     // P left of edge
                        $wn += 1;                                       // have a valid up intersect
            } else {                                                    // start y > P[1] (no test needed)
                if ($this->is_greater($P[1], $V[$i + 1][1]))            // a downward crossing
                    if ($this->is_left($V[$i], $V[$i + 1], $P) < 0)     // P right of edge
                        $wn -= 1;                                       // have a valid down intersect
            }
            $i++;
        }
        return $wn;
    }

    function is_greater($p, $q)
    {
        if (bcsub($p, $q, 7) > 0)
            return true;
        else false;
    }

    function is_left($P0, $P1, $P2)
    {
        return bcsub(
            bcmul(
                bcsub($P1[0], $P0[0], 7),
                bcsub($P2[1], $P0[1], 7),
                7),
            bcmul(
                bcsub($P2[0], $P0[0], 7),
                bcsub($P1[1], $P0[1], 7),
                7),
            7);
    }
}

?>