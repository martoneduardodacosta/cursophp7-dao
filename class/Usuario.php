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

				$row = $results[0];

				$this->setIdusuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));

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

				$row = $results[0];

				$this->setIdusuario($row['idusuario']);	
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro($row['dtcadastro']);
				
			} else {

				throw new Exception("Login ou senha inválidos");
						
			}


		}



	}

?>
