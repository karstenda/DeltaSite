<?php
/**
 * Handling all file operations in one location
 * 
 * @author Pieter Maene <pieter@maene.eu>
 */
class FileHandler {
	private $_fileName = '';

	public function __construct($fileName) {
		$this->_fileName = $fileName;
	}
	
	public function writeString($data) {
		return is_int(fwrite(fopen($this->_fileName, 'c'), $data)) ? true : false;
	}

	public function writeArray(array $data) {
		return $this->writeString(serialize($data));
	}

	public function readString() {
		if(!file_exists($this->_fileName))
			throw new InvalidArgumentException('The file you want to read does not exist!');
		return fread(fopen($this->_fileName, 'r'), filesize($this->_fileName));
	}

	public function readArray() {
		return unserialize($this->readData());
	}
	
	public function getEntryCount() {
		return count(file($this->_fileName));
	}
	
	public function getEntryCountFor($firstcol) {
	
		$count = 0;
	
		$file = fopen($this->_fileName, 'r');
		// Skip first line
		$line = fgets($file);
		// Read line by line
		while(!feof($file))
		{
			$line = fgets($file);
			$lineArray = explode(',', $line);
			if ($lineArray[0] == $firstcol)
				$count++;
		}
		fclose($file);	
		
		return $count;
	}
}
