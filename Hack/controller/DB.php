<?php

class DB{
	
	private static $_instance=null;
	private $_pdo,
			$_query,
			$_error =false,
			$_results,
			$_count=0;
			
			
			
	private function __construct(){
		
		try{
			$this->_pdo=new PDO('mysql:host=localhost;dbname=kids;','root', 'root');
		}catch(PDOException $e){
			die($e->getMessage());
			
			
		}
	}
	
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance=new DB();
		}
		return self::$_instance;
	}
	
	public function update($table, $value , $id, $fields ){
		$set='';
		$x=1;
		foreach($fields as $field => $name){
			$set.="{$field} = ?";
			
			if($x<count($fields)){
				$set.=',';
			}
			$x++;
		}
		
		$sql="UPDATE {$table} SET {$set} WHERE {$value}={$id}";
		if(!($this->query($sql , $fields)->error())){
			return true;
			
		}else{
			
			return false;
			
		}
		
	}
	
	
	public function query($sql,$params=array()){
		$this->_error=false;
		
		
		if($this->_query=$this->_pdo->prepare($sql)){
			if(count($params)){
				$x=1;
				foreach($params as $param){
					
					$this->_query->bindValue($x,$param);
					$x++;
				}
				
				
				
			}

			if($this->_query->execute()){
				
				$this->_results=$this->_query->fetchAll(PDO::FETCH_ASSOC);
				$this->_count=$this->_query->rowCount();
			}else{
					
				$this->_error=true;
			}
		}
		
		
		
		return $this;
	}
	
	
	
	public function error(){
		
		return $this->_error;
	}
	
	public function count(){
		return $this->_count;
		
	}
	
	public function result(){
		return $this->_results;
		
	}
	
	public function first(){
		return $this->_results[0];
		
	}
	
	
	
}

