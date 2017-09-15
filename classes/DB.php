<?php
require_once "$_SERVER[DOCUMENT_ROOT]/config.php";


class DB
{
    protected static $instance = null;
    private static $table;
    private static $idName;
    private static $id;
    private static $sortDirection;
    private static $sortParam;
    private static $start;
    private static $num;
    private static $sql;

    public function __construct() {}
    public function __clone() {}

    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => TRUE,
            );
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }
    
    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
        
    public static function getRow($table, $idName, $id)
    {
      self::$table = $table;
      self::$idName = $idName;
      self::$id = $id;
      return DB::run("SELECT * FROM " . self::$table . " WHERE " . self::$idName . "=?", [self::$id])->fetch();
    }
    
    public static function getRows($table)
    {
      self::$table = $table;
      return DB::run("SELECT * FROM " . self::$table)->fetchAll();
    }
    
    public static function getRowsSort($table, $sortParam, $sortDirection = NULL)
    {
      self::$table = $table;
      self::$sortDirection = $sortDirection;
      self::$sortParam = $sortParam;
      if (self::$sortDirection == NULL) {
        self::$sortDirection = 'ASC';
      }
      
      return DB::run("SELECT * FROM " . self::$table . " ORDER BY " . self::$sortParam . " " . self::$sortDirection)->fetchAll();
    }
    
    public static function getBlog($start, $num)
    {
      self::$start = $start;
      self::$num = $num;
      //echo 'st = ' . self::$start . ' num = ' . self::$num;
      return DB::run("SELECT * FROM posts ORDER BY post_pubdate DESC LIMIT " . self::$start . ", " . self::$num)->fetchAll();
    }
    
    public static function getNum($table)
    {
      self::$table = $table;
      return DB::run("SELECT COUNT(*) as count FROM " . self::$table)->fetchColumn();
    }

}
