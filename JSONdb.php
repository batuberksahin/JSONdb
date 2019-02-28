<?php

/*
*
* Simple JSON Database
*
* @author batuberksahin
* @author github.com/batuberksahin
*
* @license GPL 3.0
* @version 1.0.0
*
*/

class JSONdb
{

  protected $file;
  protected $dbSchema;

  public function __construct($targetFile, $schema)
  {
    $this->file = __DIR__ . '/' . $targetFile;

    if(!file_exists($this->file)) $this->createDb($this->file);

    if(!is_array($schema)) throw new Exception("JSONdb error: JSONdb schema must be an array!");
    $this->dbSchema = $schema;
    
  }

  public function getContentById($id)
  {
    $data = $this->getFullContent();
    if(empty($data[$id])) throw new Exception("JSONdb error: Undefined id (" . $id . ")");
    return $data[$id];
  }

  public function getFullContent()
  {
    $data = file_get_contents($this->file, true);
    return json_decode($data);
  }

  public function deleteById($id)
  {
    $data = $this->getFullContent();
    if(empty($data[$id])) throw new Exception("JSONdb error: Undefined id (" . $id . ")");

    unset($data[$id]);

    file_put_contents($this->file, json_encode(array_values($data), true));
  }

  public function insert($content)
  {
    $data = $this->getFullContent();
    $insert = $content;
    var_dump($data);
    array_push($data, $insert);
    file_put_contents($this->file, json_encode($data, true));
  }

  protected function createDb($createFile)
  {
    try{
      file_put_contents($this->file, "[]");
    }catch(Exception $e){ 
      throw new Exception("JSONdb error: " . $e->getMessage());
    }
  }

}

?>
