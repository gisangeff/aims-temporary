<?php

class functions extends connection {

	function selectAll($query) {

		$statement = $this->connect()->query($query);
		return $statement->fetchAll();
	}

	public function insert($fields, $table_name) {

		try {
			$columns = implode(', ', array_keys($fields));
			$values = implode(", :", array_keys($fields));

			$query = "INSERT INTO $table_name ($columns) VALUES (:".$values.");";
			$statement = $this->connect()->prepare($query);

			foreach ($fields as $key => $value) {
				$statement->bindValue(':'.$key, $value);
			}

			$statementExecute = $statement->execute();

			if($statementExecute){
				header('Location: addRecord.php');
			}
		} catch (Exception $e) {
			
		}

	}

	public function getData($table_name, $column_id, $id) {

		$query = "SELECT * FROM $table_name WHERE $column_id = ".$id."";
		$statement = $this->connect()->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;

	}

	public function update($query) {
		
		$statement = $this->connect()->prepare($query);
		$statement->execute();
		header('Location:index.php');
	}

	public function delete($query) {
		try {
			$statement = $this->connect()->prepare($query);
			$statement->execute();
		} catch (Exception $e) {
			
		}
	}

	public function setID($query) {
		return $this->connect()->query($query)->fetchColumn() + 1;
	}

	public function count($query) {
		return $this->connect()->query($query)->fetchColumn();
	}





}
