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
		return $this->_writeData(serialize($data));
	}

	public function readString() {
		if(!file_exists($this->_fileName))
			throw new InvalidArgumentException('The file you want to read does not exist!');
		return fread(fopen($this->_fileName, 'r'), filesize($this->_fileName));
	}

	public function readArray() {
		return unserialize($this->_readData());
	}
	
	public function getEntryCount() {
		return count(file($this->_fileName));
	}
}
