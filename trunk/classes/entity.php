<?

class Entity
{

	// new DB($table, $id=NULL) - создать объект записи из таблицы $table, загрузить в него поле по ID

	// ExistsByField($field, $val) - есть ли запись $field='$val'
	// ExistsByFields($dict) - есть ли запись, поля которой равны полям массива
	// LoadByField($field, $val) - выбрать запись $field='$val'
	// LoadByFields($dict) - выбрать запись, поля которой равны полям массива
	// LoadByCond($cond) - выбрать запись по условию $cond
	// Load($id) - загрузить по ID
	// Save() - сохранить в БД
	// Set($name, $value) - установить значение для поля
	// Get($name) - получить значение для поля
	// GetId() - получить ID
	// Reset($name) - сбросить значение поля
	// Delete() - удалить из БД

	var $attr = array();
	var $id = NULL;
	var $table = NULL;
	var $maintable = NULL;
	var $idfield = 'id';
	var $allfields = '*';
	var $foreign = array();
	var $jcond = '';

	 function __construct($id = NULL, $table = NULL) {
		if (is_null($this->table)) {
			if ($table = NULL) {
				throw new exception('Не возможно создать сущность');
			}
			$this->table = $table;
		}

		if (is_null($this->maintable)) {
			$this->maintable = $this->table;
		}

		if ($this->jcond)
			$this->jcond .= ' AND';

		if ($id) {
			$this->attr['id'] = $id;
			$this->Load($id);
		}
	}
	
	 function Exists($id) {
		return $this->ExistsByField('id', $id);
	}

	function ExistsByField($field, $val) {
		$val = sqlQuote($val);
		$r   = query("SELECT COUNT(*) as result FROM `{$this->table}` WHERE {$this->jcond} ($field=$val)");
		
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		
		$row = mysql_fetch_row($r);
		return $row[0];
	}
	
	
	function ExistsByFields($dict) {
		$query = "SELECT count(*) as result FROM `{$this->table}` WHERE {$this->jcond} (";
		$sep = '';
		foreach($dict as $k => $v) {
			$query .= "$sep$k=".sqlQuote($v);
			$sep    = ' AND ';
		}
		$query .= ')';

		$r = query($query);
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		$row = mysql_fetch_row($r);
		return $row[0];
	}

	function ExistsByCond($cond, $field = 'count(*)') {
		$r = query("SELECT {$field} as result FROM `{$this->table}` WHERE {$this->jcond} ($cond)");
		
		if (!$r) {
			throw new exception('Attention! SQL error');
		}
		
		$row = mysql_fetch_row($r);
		return $row[0];
	}

	function LoadByField($field, $val) {
		$val   = sqlQuote($val);
		$query = "SELECT {$this->idfield} FROM `{$this->table}` WHERE {$this->jcond} ($field=$val)";
		$query .= " ORDER BY {$this->idfield} desc LIMIT 1";
		$r = query($query);

		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		if (mysql_num_rows($r)) {
			$row = mysql_fetch_row($r);
			$this->Load($row[0]);
		}
	}
	
	function LoadByFields($dict) {
		$query = "SELECT {$this->idfield} FROM `{$this->table}` WHERE {$this->jcond} (";
		$sep = '';
		foreach($dict as $k => $v) {
			$query .= "$sep$k=".sqlQuote($v);
			$sep    = ' AND ';
		}
		$query .= ')';
	
		$query .= " ORDER BY {$this->idfield} desc LIMIT 1";
	
		$r = query($query);
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		
		if (mysql_num_rows($r)) {
			$row = mysql_fetch_row($r);
			$this->Load($row[0]);
		}
	}

	function LoadByCond($cond) {
		$r = query("SELECT {$this->idfield} as result FROM `{$this->table}` WHERE {$this->jcond} ($cond) ORDER BY {$this->idfield} desc LIMIT 1");

		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		
		if (mysql_num_rows($r)) {
			$row = mysql_fetch_row($r);
			$this->Load($row[0]);
		}
	}

	function GetManyByCond($cond, $order=NULL, $page=NULL, $per_page=20) {
		$q = "SELECT {$this->allfields} FROM `{$this->table}` WHERE {$this->jcond} ($cond)";
		if ($order) $q.=" ORDER BY $order";
		
		if (!$page) {
			return $this->GetMany($cond, $order);
		}	
		
		$n = $this->ExistsByCond($cond);
		
		$page = (int) $page;
		if ($page > 0 && $n < ($page-1)*$per_page)
			$page = 1;
		
		if ($page > 0) $q.=' LIMIT '.(($page-1)*$per_page).','.$per_page;
		
		$r = query($q);
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		$res = array();
		$n = mysql_num_rows($r);
		for ($i=0;$i<$n;$i++) {
			$row = mysql_fetch_assoc($r);
			$res[]=$row;
		}
		
		return $res;
	}
	
	function GetMany($cond, $order = NULL, $limit = NULL) {
		$q = "SELECT {$this->allfields} FROM `{$this->table}` WHERE {$this->jcond} ($cond)";
		if ($order) $q.=" ORDER BY $order";
		
		if ($limit) {
			$q .= " LIMIT {$limit}";
		}
		
		$r = query($q);
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		
		$res = array();
		$n = mysql_num_rows($r);
		for ($i=0;$i<$n;$i++) {
			$row = mysql_fetch_assoc($r);
			$res[] = $row;
		}
		
		return $res;
	}
	
		
	function Select($cond, $fields = NULL, $order = NULL, $limit = NULL) {
		if (!$fields) {
			$files = $this->allfields;
		}
		$q = "SELECT {$fields} FROM `{$this->table}` WHERE {$this->jcond} ($cond)";
		if ($order) $q.=" {$order}";
		
		if ($limit) {
			$q .= " LIMIT {$limit}";
		}
		
		$r = query($q);
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		
		$res = array();
		$n = mysql_num_rows($r);
		for ($i=0;$i<$n;$i++) {
			$row = mysql_fetch_assoc($r);
			$res[] = $row;
		}
		
		return $res;
	}
	
		
	function GetExclusive($field, $cond, $order = NULL, $page = NULL, $per_page = 20 ) {
		$sql = "SELECT * FROM `{$this->table}` WHERE {$this->jcond} ($cond)";
		$sql .= " GROUP BY $field";
		if ($order) {
			$sql.=" ORDER BY $order";
		}
		
		$r = query($sql);
		if (!$r) {
 			throw new exception('Ошибка в запросе');
		}
		
		$n = mysql_num_rows($r);
		
		$page = (int) $page;
		if ($page > 0 && $n < ($page-1)*$per_page) {
			$page = 1;
		}
		
		if ($page > 0) {
			$sql.=' LIMIT '.(($page-1)*$per_page).','.$per_page;
		}
		
		$r = query($sql);
		if (!$r) {
			throw new exception('Ошибка в запросе');
		}
		
		$res=array();
		$n = mysql_num_rows($r);
		for($i = 0; $i < $n; $i++) {
			$row = mysql_fetch_assoc($r);
			$res[] = $row;
		}
		
		return $res;
	}
		
	function GetPagedTable($cond, $order=NULL, $page = NULL, $per_page = 20) {
		$p = array();
		
		$p['items'] = $this->GetManyByCond($cond, $order, $page, $per_page);
		$q = "SELECT COUNT($this->idfield) FROM `{$this->table}` WHERE {$this->jcond} ($cond)";
		if ($order) {
			$q.=" ORDER BY $order";
		}
		$num = one_result($q);
		$p['pages'] = max(1, ceil($num/$per_page)); // Всего старниц
		$p['page'] = $page; // Текущая страница
		$p['count'] = $num; // Все записей в таблице с таким $cond;
		
		return $p;
	}

	function SelectSum($field, $cond, $order = NULL) {
		$q = "SELECT SUM(".$field.") FROM `{$this->table}` WHERE {$this->jcond} ($cond)";
		
		
		
		if($order) 
			$q.=" ORDER BY $order";

		$r = query($q);
		$row = mysql_fetch_row($r);
		return $row[0];
	}

	function GetSortTable($cond, $cols, $order = 1, $page = 1, $per_page = 20) {
		$oid = (int) $order;
		$arr = explode('|', get($cols, abs($oid)));
		$sort = get($arr, 1);
		if ($sort && $oid < 0) {
			$sort = get($arr, 2, $sort.' desc');
		}
		$p = $this->GetPagedTable($cond, $sort, $page, $per_page);
		$p['columns'] = array();
		foreach ($cols as $key => $val) {
			$a = explode('|', $val);
			$col = array($a[0]);
			if (count($a) > 1) {
				$col[1] = ($oid == $key) ? -$key : $key;
				if (abs($oid) == $key) {
					$col[2] = ($oid == $key) ? 1 : -1;
				} else {
					$col[2] = 0;
				}
			} else {
				$col[1] = 0;
			}
			
			$p['cols'][$key] = $col;
		}
		
		return $p;
	}

	function Set($name, $value) {
		if ($name != 'id') {
			$this->attr[$name] = $value;
		}
	}

	function Get($name) {
		return get($this->attr, $name);
	}

	function Load($id) {
		$id = intval($id);
		$sql = "SELECT {$this->allfields} FROM `{$this->table}` WHERE {$this->jcond} ({$this->idfield}=$id)";
		$r = query($sql);
		if (!$r) {
			throw new exception('Невозможо загрузить сущность');
		}

		$row = mysql_fetch_assoc($r);

		if (count($row) > 1) { 
			$this->attr       = $row;
			$this->attr['id'] = $id;
		} else {
			$this->attr['id'] = NULL;
		}
	}

	function Save() {
		if (strpos($this->maintable,',')!==false or is_null($this->maintable)) {
			throw new exception('Не указана главная таблица');
		}

		$temp = array();
		foreach ($this->attr as $key => $val)
		if ($key != 'id' and !in_array($key, $this->foreign) ) {
			$temp[] = "`$key`=".sqlQuote($val);
		}
		
		$pfields = implode(', ', $temp);
		
		if (is_null(get($this->attr, 'id'))) {
			query("INSERT INTO `{$this->maintable}` SET $pfields");
			$this->attr['id'] = mysql_insert_id();
		} else {
			$q = "UPDATE `{$this->maintable}` SET $pfields where id='" . $this->attr['id'] . "'";
			$r = query($q);

			if (!$r) {
				throw new exception("Невозможно обновиться сущность `{$this->table}`.<br />$q");
			}
		}
	}
	
	function UpdateByCond($cond, $fields) {
		$q = "UPDATE `{$this->maintable}` SET $fields WHERE {$cond}";
		$r = query($q);
		
		if (!$r) {
			throw new exception("Невозможно обновиться сущность `{$this->table}`.<br />$q");
		}
		
		return mysql_affected_rows();
	}
 	
	function GetId() {
		return get($this->attr, 'id');
	}

	function GetTitle() {
		return get($this->attr,'title');
	}

	function Delete() {
		if (strpos($this->maintable,',')!==false or is_null($this->maintable)) {
			throw new exception('Не указана главная таблица');
		}
		
		if (get($this->attr, 'id') !== NULL) {
			$r = query("DELETE FROM `{$this->maintable}` WHERE id='".$this->GetId()."'");
			if (!$r) {
				throw new exception("Не возможно удалить запись");
			}
		} else {
				throw new exception("Запись не существует в таблице");
		}
	}
	
	function DeleteByCond($cond) {
		$q = "DELETE FROM `{$this->maintable}` WHERE {$this->jcond} $cond";
		
		$r = query($q);
		if (!$r) {
			throw new exception("Не возможно удалить записи");
		}
		
		return mysql_affected_rows();
	}

	function IsActive() {
		return ($this->Get('status') == STATE_ACTIVE);
	}
	
	function SetBuffer($list = array()) {
		if (!count($list)) return false;
		$ids = '';
		$sep = '';
		foreach($list as $v) {
			$ids .= $sep.$v['id'];
			$sep = ",";
		}
		$this->UpdateByCond("id IN ({$ids})", "status = '".STATE_BUFFER."', buffer = NOW()");
	}
	
	
	function IsMy() {
		global $account_id;
		return ($this->Get('adid') == $account_id);
	}
		
}
?>