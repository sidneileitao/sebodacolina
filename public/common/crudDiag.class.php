<?php 
/*  
 * Classe para operações CRUD na tabela ferramentas   
 */
class crudDiag{  
 
  /*  
   * Atributo para conexão com o banco de dados   
   */  
  private $pdo = null;  
 
  /*  
   * Atributo estático para instância da própria classe    
   */  
  private static $crudDiag = null; 
 
  /*  
   * Construtor da classe como private  
   * @param $conexao - Conexão com o banco de dados  
   */  
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }  
  
  /*
  * Método estático para retornar um objeto crudDiag    
  * Verifica se já existe uma instância desse objeto, caso não, instância um novo    
  * @param $conexao - Conexão com o banco de dados   
  * @return $crudDiag - Instancia do objeto crudDiag    
  */   
  public static function getInstance($conexao){   
   if (!isset(self::$crudDiag)):    
    self::$crudDiag = new crudDiag($conexao);   
   endif;   
   return self::$crudDiag;    
  } 
 
  /*   
  * Metodo para inclusão de novos registros   
  */   
  public function qry_insert(){   
   $sql_code = func_get_arg (0);

   if (!empty($sql_code)):   
    try{   
    $sql = $sql_code; 
    $stm = $this->pdo->prepare($sql);   
    $stm->execute(); 
    
    if(func_num_args()==2)
    {
      $ultimo_id = func_get_arg (1);
      $ultimo_id = $this->pdo->lastInsertId() ;
      return $ultimo_id;
    }
    //echo "<script>alert('Registro inserido com sucesso')</script>";   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   endif;   
  } 
    
  /*   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function qry_select($sql_code){   
   try{   
    $sql = "$sql_code";   
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }   
 } 