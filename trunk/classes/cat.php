<?

class Cat extends Entity
{

	var $table = TCAT;

	function GetList() {
		$cond = "status = '".STATE_ACTIVE."'";
		$t = $this->GetManyByCond($cond);
		$cat_list = array();
		foreach($t as $v) {
			$cat_list[$v['id']] = $v['title'];
		}
		
		return $cat_list;
	}

}

?>