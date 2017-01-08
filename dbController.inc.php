<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "tarottool";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		//mysqli_select_db($this->database,$conn);
		mysqli_select_db($conn,$this->database);
	}
	
	function runQuery($conn, $query) {
		echo "$query";
		echo "$conn";
		$result = mysqli_query($conn, $query);
		echo "$result";
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>