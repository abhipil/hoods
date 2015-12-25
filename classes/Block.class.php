<?php
require_once('classes/Address.class.php');

/**
 *
 */
abstract class Block extends Address
{
    public $blockid;
    public $hoodid;
    public $memberid;
    public $notaMember;

    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['blockid']))
            $this->blockid = $_SESSION['blockid'];
    }

    /**
     * @func setBlockVariables
     * @description Initialises block variables
     *      At registration, $bid, $uid must be passed
     */
    public function isMember($userid=null)
    {
        if($userid){
            $blockid=$this->getBlockID($userid);
        }
        else{
            $userid=$this->userid;
            $blockid=$this->blockid;
        }
        $stmt = "select status from member WHERE uid=$userid AND bid=$blockid";
        $rows = DB::select($stmt, array());
        if (!$this->exists($rows))
            $rows = NULL;
        if (strcmp($rows[0]['status'], 'joined') == 0)
            return true;
        elseif (strcmp($rows[0]['status'], 'requested') == 0)
            return false;

    }

    public function setBlockVariables($uid = null, $bid = null)
    {
        if ($this->exists($bid)) {
            $this->blockid = $bid;
            $_SESSION['blockid'] = $bid;
        } else
            $this->blockid = $this->getBlockID();
        $this->hoodid = $this->getHoodID();
    }

    public function getBlockID($userid = null)
    {
        $stmt = "select bid from member WHERE uid=$userid";// AND status='requested'
        $rows = DB::select($stmt);
        if (!$this->exists($rows))
            $rows = NULL;
        //if()
        return $rows[0]['bid'];
    }

    public function getHoodID($bid = null)
    {
        $bid = isset($bid) ? $bid : $this->blockid;
        $stmt = "select hid from block WHERE bid=$bid";
        $rows = DB::select($stmt);
        if (!$this->exists($rows))
            $rows = NULL;
        return $rows[0]['hid'];
    }

    public function getActiveRequests()
    {
        $stmt = "SELECT count(reqid) as cnt FROM hoods.mem_req join member on member.memid=mem_req.memid
                where member.bid=$this->blockid and member.status='requested';";
        $rows = DB::select($stmt);
        if (!$this->exists($rows))
            $rows = NULL;
        //if()
        return $rows[0]['cnt'];
    }

    public function getBlockName($blockid = null)
    {
        $blockid = isset($blockid) ? $blockid : $this->blockid;
        $stmt = "select bname from block WHERE bid=$blockid";
        $rows = DB::select($stmt);
        if (!$this->exists($rows))
            $rows = NULL;
        return $rows[0]['bname'];
    }

    public function jsonAllBlocksin($loc)
    {
        $P = $loc;
        $V = null;
        $ret = array();
        $blocks = $this->getAllblocks();
        $rows = $this->getAllBlockBounds();
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
        return json_encode($ret, JSON_PRETTY_PRINT);
    }

    public function getAllblocks()
    {
        $stmt = 'SELECT DISTINCT(bid) FROM blockbounds'; // Change to from blocks after all blockbounds have been inserted
        $blocks = DB::select($stmt, $params = array(), $result = array());
        if (!$this->exists($blocks))
            $blocks = NULL;
        return $blocks;
    }

    public function getAllBlockBounds($bid=null){
        if(isset($bid))
            $stmt = 'SELECT bid,lat,lng FROM hoods.blockbounds where bid='. $bid .' ORDER BY bid,next ASC;';
        else
            $stmt = 'SELECT bid,lat,lng FROM hoods.blockbounds ORDER BY bid,next ASC;';
        $rows = DB::select($stmt, $params = array(), $result = array());
        if (!$this->exists($rows))
            $rows = NULL;
        return $rows;
    }

    /**
     * @func isinPolygon:
     * @description Checks if point lies in a polygon
     *
     * @param $P {array(2)}              $P: x,y coordinates of a point
     * @param $V $ {array(*).{array(2)}  $V: vertices of polygon
     * @return int {int}                    $wn: winding number of point wrt to polygon
     *                                      (=0) only if point outside polygon
     *
     * @comments : Adapted from here
     * http://www.dgp.toronto.edu/~mac/e-stuff/point_in_polygon.py
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
        return false;
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

    public function addnewMember()
    {
        $stmt = "INSERT INTO member (uid,bid) VALUES (?,?)";
        if ($this->exists($this->userid) && $this->exists($this->blockid))
            $params = array($this->userid, $this->blockid);
        else
            return false;
        return DB::insert($stmt, $params, array());
    }

    public function getRequests($full=null){
        if($full)
            $stmt = "SELECT reqid,approve1,approve2,approve3,approvals,uname
                    FROM (hoods.mem_req join member on member.memid=mem_req.memid) join user on user.uid=member.uid
                    where approvals>0
                    and bid=$this->blockid;";
        else
            $stmt = "select approvals, uname, bid, reqid from mem_req JOIN member on mem_req.memid = member.memid
                NATURAL JOIN user WHERE approvals>0 and bid=$this->blockid";
        $rows = DB::select($stmt, array(), array());
        return $rows;
    }

    public function approveRequests($reqid, $pos){
        $stmt = "UPDATE `hoods`.`mem_req` SET `approve".$pos."`=$this->userid WHERE `reqid`=$reqid;";
        return DB::insert($stmt,array(),array());
    }
}
?>