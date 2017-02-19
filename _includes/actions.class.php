<?php

class actions extends connectDb{

    protected $_now;
    
	public function __construct() {
		parent::__construct();
		$this->_now = date("Y-m-d H:i:s");
	}
	
	public function __destruct() {
		parent::__destruct();
	}

    public function traceUpdate($source, $token,$version){
		$remote = $_SERVER['REMOTE_ADDR'];
        //si deja en base, nous ne faisons rien
		//$q_exist = "SELECT count(*) as nb from oko_update where source='$source' and apptoken='$token' and version='$version' and remote_address='$remote'";
		$q_exist = "SELECT count(*) as nb from oko_update where source='$source' and apptoken='$token' and version='$version'";
        $this->log->debug($q_exist);
        
        $exist = $this->query($q_exist);     
        
        if($exist){
			$res = $exist->fetch_object();
	    	
	    	if ($res->nb == 0) {
	    	    //si pas deja en base alors on l'ajoute
		    		//$insert = "INSERT INTO oko_update set date='$this->_now', source='$source',remote_address='$remote', apptoken='$token', version='$version'";
		    		$insert = "INSERT INTO oko_update set date='$this->_now', source='$source', apptoken='$token', version='$version'";
                    $this->log->debug($insert);
                    $this->query($insert);
                
	            echo "done";

	    	}else{
	    	    $this->log->debug("Déjà en base $source :: $token :: $version");
	    	}
        }
         
    }
    
    public function getListClient(){
    	$q = "select date, source, remote_address, apptoken, version from oko_update order by date;";
    	
		$result = $this->query($q);
	    $r = array();
	    
	    if($result){
	    	while($res = $result->fetch_object()){
				array_push($r,$res);
			}
	    }
    	return $r;
    }
    
    public function getNbClient(){
    	$q = "select count(distinct apptoken) as nbClient from oko_update where apptoken not like 'DEV-%';";
    	
		$result = $this->query($q);
	    $r = array();
	    
	    if($result){
	    	return $result->fetch_object();
	    }
    	
    }
    
    public function getJsonNbClient($cross){
	//$t = ($cross)?'callback':'';
    	header("Content-type: text/json; charset=utf-8");
	if($cross){
		header('Access-Control-Allow-Origin: *');
		echo 'response('.json_encode($this->getNbClient(), JSON_NUMERIC_CHECK).');';
	}else{
		echo json_encode($this->getNbClient(), JSON_NUMERIC_CHECK);
	}
    }
    

    
    
    
    
}