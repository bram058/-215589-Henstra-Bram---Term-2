<?php
	class CSV
	{
		//STATIC
		public static $data;

		private static function parse($delimiter = ";")
		{
			self::$data = preg_replace('/\r\n/', "\n", self::$data);
			self::$data = explode("\n", self::$data);

			foreach (self::$data as &$line)
			{
				$line = explode($delimiter, $line);
			}
		}

		public static function read($file, $delimiter = ";")
		{
			self::$data = file_get_contents($file);
			self::parse($delimiter);
			return self::$data;
		}

		public static function write($file, $data, $delimiter = ";")
		{
			foreach ($data as &$row) 
			{
				foreach ($row as &$col)
				{
					//always returns true if variable can be treated as a numer
					if (!is_numeric($col))
					{
						if (is_string($col))
						{
							 if(!preg_match('/".*"/', $col))
							 	$col = '"' . $col . '"';
						}
						
						else 
						{
							// throwing an exception ends the code
							throw new Exception("Data type is incompatible", 1);							
						}
					
					}
				}

				$row = implode($delimiter, $row);
			}

			$data = implode("\n", $data);
			file_put_contents($file, $data);
		}

		//INSTANCE
		private $file_data;

		public function __construct($file)
		{
			$this->file_data = CSV::read($file);
		}

		public function get_row($index)
		{
			if(isset($this->file_data[$index]))
				return $this->file_data[$index];

			return null;
		}

		public function get_cell($row_index, $col_index)
		{
			$row = $this->get_row($row_index);
			if ($row == null)
				return null;

			if (isset($row[$col_index]))
			{
				if (is_string($row[$col_index]))
				{
					$row[$col_index] = preg_replace('/"(.*)"/', '$1', $row[$col_index]);
				}
				return $row[$col_index];
			}

			return null;
		}

		public function set_cell($row_index, $col_index, $value)
		{
			

				if (isset($this->file_data[$row_index]))
				{
					$this->file_data[$row_index][$col_index] = $value;
					return $this->file_data[$row_index][$col_index];
				}
	
				return null;
		}

		public function add_row($columns)
		{
			$this->file_data[] = $columns;
			$index = count($this->file_data);
			if ($index > 0) $index--;
			return $this->file_data[$index] == $columns;
		}

		public function print()
		{
			$i = 0;
			foreach ($this->file_data as $row) 
			{
				echo "Row $i: ";
				foreach ($row as $col) 
				{
					echo "$col, ";
				}
				echo "\n"; 
				$i++;
			}			
		}

		public function remove_row($row_index)
		{
			if ($row_index < 0 || count($this->file_data) < $row_index)
				return;

			array_splice($this->file_data, $row_index, 1);
		}

		public function update_row($row_index, $row)
		{
			// checking
			// echo "update_row: $row_index <0 || " .count($this->file_data)." < $row_index\n";

			if ($row_index < 0 || count($this->file_data) < $row_index)
				return;

			$this->file_data[$row_index] == $row;
		}

		public function save($file, $delimiter = ";"){
			CSV::write($file, $this->file_data, $delimiter);
		}
	}

	$csv = new CSV("list.csv");
	
	//testing for results, specifically to test the get_cell function on line 46
	// $r1_c1 = $csv->get_cell(1,1);
	// $r1_c1 = $csv->get_cell(1,2);
	// $r1_c1 = $csv->get_cell(1,3);
	// echo "Row 1@0: $r1_c0\n";
	// echo "Row 1@1: $r1_c1\n";
	// echo "Row 1@2: $r1_c2\n";
	// echo "Row 1@3: $r1_c3\n";

	// echo "input\n";
	// $csv->print();
	// $r1_c1 = $csv->get_cell(1,1);
	// $r1_c1 = $csv->set_cell(1,1, "something");
	// $column_data = [ 10, "Another question", 1, 2, 3 ]
	// $succes = $csv->add_row($column_data);
	// $csv->remove_row(2);
	// $csv->update_row(2, [11, "Yet another question", 10, 11, 12]);
	// echo "Output: \n"
	// $csv->print();
	// $csv->save('Another_list.csv')
	
	// print_r($csv->file_data);
?>