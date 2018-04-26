<?php

	class Usuario {

		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		//Usuario
		public function getIdusuario()
		{
			return $this->idusuario;
		}

		public function setIdusuario($value)
		{
			$this->idusuario = $value;
		}

		// Deslogin
		public function getDeslogin()
		{ 
			return $this->deslogin;
		}

		public function setDeslogin($value)
		{
			$this->deslogin = $value;
		}

		// Senha
		public function getDessenha()
		{
			return $this->dessenha;
		}

		public function setDessenha($value)
		{
			$this->dessenha = $value;
		}

        // Data Cadastro
		public function getDtcadastro(){
			return $this->dtcadastro;
		}

		public function setDtcadastro($value)
		{
			$this->dtcadastro = $value;
		}
 
		public function loadById($id)
		{
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuarios where idusuario = :ID", array(":ID"=>$id));

			if (count($results) > 0) {

				$this->setData($results[0]);	

			}

		}

		//Lista todos os registros da tabela
		public static function getLIst(){

			$sql = new Sql();

			Return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;"); 
		}	

		public static function search($Login){

			$sql = new Sql();	

			Return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin", array(':search'=>"%".$Login."%"));


		} 

		public function __toString(){

			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()
			));
		}	

		public function login($login, $password){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN and dessenha = :PASSWORD", array(":LOGIN"=>$login, ":PASSWORD"=>$password));

			if (count($results) >0){


				$this->setData($results[0]);	


			} else {

				throw new Exception("Login ou senha inválidos");
						
			}

		}	

		public function setData($data){

				$this->setIdusuario($data['idusuario']);	
				$this->setDeslogin($data['deslogin']);
				$this->setDessenha($data['dessenha']);
				$this->setDtcadastro($data['dtcadastro']);

		}

		public function __construct($login = "", $password = ""){

				$this->setDeslogin($login);
				$this->setDessenha($password);
		}


		public function insert(){

			$sql = new Sql();

			$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(':LOGIN'=>$this->getDeslogin(), ':PASSWORD'=>$this->getDessenha()));

				if (count($results) > 0){

					$this->setData($results[0]);	

				}


		}



	}

?>
