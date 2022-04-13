<?php
class CountryModel extends DB{
	public function getAllCountry(){
		$qlr = "select * from country";
		$result = mysqli_query($this->con,$qlr);
		return mysqli_fetch_all($result);
	}
}
?>