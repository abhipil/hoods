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

    public function setAddress($address)
    {
        return $this->checkaddress($address);
    }

    protected function checkaddress($address)
    {
        $exploded = explode(",", $address);
        $country = trim(array_pop($exploded));
        if ($this->exists($country) && (strcmp($country, "USA") == 0)) {
            echo "here";
            exit();
        } else {
            $this->setPageError("out_of_ny");
            return false;
        }

    }

    public function setLocation($lat, $lng)
    {

    }

    public function addnewAddress()
    {

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

    function isinPolygon($P, $V)
    {
        $wn = 0;   // the winding number counter
        $V[count($V)] = $V[0];
        $i = 0;// loop through all edges of the polygon
        while ($i < (count($V) - 1)) {                                // edge from V[i] to V[i+1]
            if ($this->is_greater($P[1], $V[$i][1])) {                         // start y <= P[1]
                if ($this->is_greater($V[$i + 1][1], $P[1]))                     // an upward crossing
                    if ($this->is_left($V[$i], $V[$i + 1], $P) > 0)   // P left of edge
                        $wn += 1;                            // have a valid up intersect
            } else {                                           // start y > P[1] (no test needed)
                if ($this->is_greater($P[1], $V[$i + 1][1]))                    // a downward crossing
                    if ($this->is_left($V[$i], $V[$i + 1], $P) < 0)   // P right of edge
                        $wn -= 1;                           // have a valid down intersect
            }
            $i++;
        }
        return $wn;
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