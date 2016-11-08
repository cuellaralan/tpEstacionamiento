<?php
class cd
{
	public $id;
 	public $patente;
 	public $ingreso;

  	public function BorrarCd()
	 {
	 		$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from estacionamiento 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }


	public function ModificarCd()
	 {

			$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update estacionamiento 
				set patente='$this->patente',
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarElCd()
	 {
				$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into estacionamiento (patente)values('$this->patente')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	  public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE estacionamiento 
				set patente=:patente
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into estacionamiento (patente,ingreso)values(:patente,:ingreso)");
				$consulta->bindValue(':patente', $this->patente, PDO::PARAM_STR);
				$consulta->bindValue(':ingreso', $this->ingreso, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function GuardarCD()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarCdParametros();
	 		}else {
	 			$this->InsertarElCdParametros();
	 		}

	 }


  	public static function TraerTodoLosCds()
	{
			$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente from estacionamiento");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cd");		
	}

	public static function TraerUnCd($id) 
	{
			$objetoAccesoDato = AccesoDatos2::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente from estacionamiento where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
			return $cdBuscado;				

			
	}



	


	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}