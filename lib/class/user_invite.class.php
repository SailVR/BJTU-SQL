<?php
/**
 * User Invite Code
 */

class user_invite {
    public $uid;
    private $dbc;

    function  __construct($uid){
        global $dbc;
        $this->uid = $uid;
        $this->dbc = $dbc;
    }

    function get_code_num(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid' ";
        $query = $this->dbc->query($sql);
        $rs = $query->fetch_array();
        if(empty($rs)){
            return -1;
        }else{
            return $rs['invite_num'];
        }
    }

    //add code
    function add_code($num){
        for($a=1;$a<=$num;$a++){
            $x = rand(10,1000);
            $x = md5($x);
            $code = substr($this->uid,0,3).substr($x,rand(1,9),13);
            $sql = "INSERT INTO `invite_code` (`id`, `code`, `user`) VALUES (NULL, '$code', '$this->uid')";
            $this->dbc->query($sql);
        }
    }

    //set_invite_zero
    function clear_code(){
        $sql = "UPDATE `user` SET `invite_num` = '0' WHERE `uid` = '$this->uid'  ";
        $query = $this->dbc->query($sql);
        return $query;
    }
} 