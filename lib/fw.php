<?php

	include 'config.php';

	date_default_timezone_set($config['DEFAULT_TIME_ZONE']);

	function absolutePath($relativePath)
	{
		global $config;
		static $prefix = null;
		if($prefix == null)
		{
			$scriptName = $_SERVER['SCRIPT_NAME'];
			$appPrefix = $config['APP_PREFIX'];
			$pos = strpos($scriptName,$appPrefix);
			if($pos >= 0)
			{
				$prefix = substr($scriptName,0,$pos) . $appPrefix . '/';
			}
			else
			{
				error_log("Erro na configuração da aplicação. Prefixo $appPrefix não é parte do nome do script $scriptName.");
				die();
			}
		}

		return $prefix . $relativePath;
	}

	function headinclude()
	{
		global $css;
		foreach($css as $c)
		{
			$c = absolutePath($c);
			echo "<link href=\"$c\" rel=\"stylesheet\">";
		}

		global $headjs;
		foreach($headjs as $sh)
		{
			$sh = absolutePath($sh);
			echo "<script src=\"$sh\"></script>";
		}
	}

	$formData = array();

	function formData($data)
	{
		global $formData;
		array_push($formData, $data);
	}

	function endinclude()
	{
		global $endjs, $formData;
		foreach($endjs as $sf)
		{
			$sf = absolutePath($sf);
			echo "<script src=\"$sf\"></script>";
		}
		$flag = false;
		foreach($formData as $fd)
		{
			if(!$flag)
			{
				echo '<script>';
			}
			$flag = true;
			echo 'formData(' . json_encode($fd) . ');';
		}
		if($flag)
		{
			echo '</script>';
		}
	}

 function validateDate($date)
    {
        $d = DateTime::createFromFormat('d/m/Y', $date);
        return $d && $d->format('d/m/Y') === $date;
    }
 
    function validateEmail($email)
    {
        // First, we check that there's one @ symbol, and that the lengths are right
        if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
            // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
            return false;
        }
        // Split it into sections to make life easier
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                return false;
            }
        }
        if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                    return false;
                }
            }
        }
 
        return true;
    }
 
    function getConnection()
    {
        static $dbh = null;
        global $config;
        global $host, $user, $database, $pass;
 
        if($dbh == null)
        {
            $host = $config["DB_HOST"];
            $user = $config["DB_USER"];
            $database = $config["DB_DATABASE"];
            $pass = $config["DB_PASSWORD"];
            // Try to open connection to mysql database
            try
            {
                $dbh = new PDO("mysql:host={$host};dbname={$database};charset=utf8",$user,$pass);
            }
            catch(PDOException $e)
            {
                error_log("Unable to open connection {$user}@{$host} database {$database} using password.");
                header('HTTP/1.1 500 Internal Server Error');
                die();
            }
        }
        return $dbh;
    }
 
    function strToDate($str)
    {
        if($str === "")
        {
            return NULL;
        }
        return DateTime::createFromFormat("d/m/Y",$str);
    }
 
    function sqlToDate($str)
    {
        if($str === "")
        {
            return NULL;
        }
        return DateTime::createFromFormat("Y-m-d",$str);
    }
 
    function sqlToStr($str)
    {
        return dateToStr(sqlToDate($str));
    }
 
    function dateToSQL($date)
    {
        return $date->format("Y-m-d");
    }
 
    function dateToStr($date)
    {
        return $date->format("d/m/Y");
    }

    function dateFormat($str)
    {
        if(strlen($str) == 10)
        {
            return substr($str,8,2) . "/" . substr($str,5,2) . "/" . substr($str,0,4);
        }
        else
        {
            return "";
        }
    }

    function timestampFormat($str)
    {
        if(strlen($str) > 11)
        {
            return substr($str,8,2) . "/" . substr($str,5,2) . "/" . substr($str,0,4) . " às " . substr($str,11);
        }
        else
        {
            return "";
        }
    }

 
    function sqlInsert($tableName, $newRecord)
    {
        $sep = "";
        $sql = "INSERT INTO $tableName (";
        foreach($newRecord as $fieldName => $fieldValue)
        {
            $sql .= "{$sep}{$fieldName}";
            $sep = ",";
        }
        $sql .= ") VALUES (";
        $sep = "";
        foreach($newRecord as $fieldName => $fieldValue)
        {
            $sql .= "{$sep}:{$fieldName}";
            $sep = ",";
        }
        $sql .= ")";
        $stm = getConnection()->prepare($sql);
        foreach($newRecord as $fieldName => $fieldValue)
        {
            if($fieldValue === "")
            {
                $fieldValue = NULL;
            }            
            if(gettype($fieldValue) == "object" && get_class($fieldValue) == "DateTime")
            {
                $stm->bindValue(":{$fieldName}",dateToSQL($fieldValue));
            }
            else
            {
                $stm->bindValue(":{$fieldName}",$fieldValue);                
            }
        }
 
        if($stm->execute())
        {
            $lastid = getConnection()->lastInsertId();
            return $lastid ? $lastid : TRUE;
        }
        else
        {
            print_r($stm->errorInfo());
            return FALSE;
        }
    }
 
    function sqlUpdate($tableName, $record, $key)
    { 
        $sep = "";
        $sql = "UPDATE $tableName SET ";
        foreach($record as $fieldName => $fieldValue)
        {
            $sql .= "{$sep}{$fieldName}=:{$fieldName}";
            $sep = ",";
        }
        $sql .= " WHERE ";
        $sep = "";
        foreach($key as $fieldName => $fieldValue)
        {
            $sql .= "{$sep}{$fieldName}=:{$fieldName}";
            $sep = " AND ";
        }
 
        $stm = getConnection()->prepare($sql);
        foreach($record as $fieldName => $fieldValue)
        {
            if($fieldValue === "")
            {
                $fieldValue = NULL;
            }
            if(gettype($fieldValue) == "object" && get_class($fieldValue) == "DateTime")
            {
                $stm->bindValue(":{$fieldName}",dateToSQL($fieldValue));
            }
            else
            {
                $stm->bindValue(":{$fieldName}",$fieldValue);                
            }
        }
        foreach($key as $fieldName => $fieldValue)
        {
            if(gettype($fieldValue) == "object" && get_class($fieldValue) == "DateTime")
            {
                $stm->bindValue(":{$fieldName}",dateToSQL($fieldValue));
            }
            else
            {
                $stm->bindValue(":{$fieldName}",$fieldValue);                
            }
        }
        return $stm->execute();
    }
 
    function sqlSelectFirst($tableName, $where = null)
    {
        $sql = "SELECT * FROM $tableName";
        if($where)
        {
            $sep = " WHERE ";
            foreach($where as $fieldName => $fieldValue)
            {
                $sql .= "{$sep}{$fieldName}=:{$fieldName}";
                $sep = " AND "; 
            }
        }
        $stm = getConnection()->prepare($sql);
        if($where)
        {
            foreach($where as $fieldName => $fieldValue)
            {
                if(gettype($fieldValue) == "object" && get_class($fieldValue) == "DateTime")
                {
                    $stm->bindValue(":{$fieldName}",dateToSQL($fieldValue));
                }
                else
                {
                    $stm->bindValue(":{$fieldName}",$fieldValue);
                }
            }
        }
        if($stm->execute())
        {
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            $stm->closeCursor();
            return $row;
        }
        else
        {
            return null;
        }
    }
