<?php
 /*   
  * Constantes de parâmetros para configuração da conexão   
  */   
  define('HOST', 'localhost');   
 // define('DBNAME', 'DB_BLOG');   
  define('CHARSET', 'utf8');   
 // define('USER', 'root');   
 // define('PASSWORD', '123456');   
 
  class Conexao {  
 
   /*   
   * Atributo estático para instância do PDO   
   */   
   private static $pdo;  
 
   /*   
   * Escondendo o construtor da classe   
   */   
   private function __construct() {   
    //   
   }  
   
   /*   
   * Método estático para retornar uma conexão válida   
   * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão   
   */   
   public static function getInstance() { 
   
    $config = parse_ini_file('sltools.ini'); 
    
    if (!isset(self::$pdo)) {   
     try {   
      $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);   
      self::$pdo = new PDO("mysql:host=" . $config['host'] . "; dbname=" . $config['dbname'] . "; charset=" . CHARSET . ";", $config['userdb'], $config['senhadb'], $opcoes);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
     } catch (PDOException $e) {   
      print "Erro: " . $e->getMessage();   
     }   
    }   
    return self::$pdo;   
   }   
  }  