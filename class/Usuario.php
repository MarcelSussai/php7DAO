<?php
class Usuario {

    private $iduser;
    private $vclogin;
    private $vcsenha;
    private $dtcadastro;

    public function setIdUser($v) {
        $this->iduser = $v;
    }
    public function getIdUser() {
        return $this->iduser;
    }

    public function setVcLogin($v) {
        $this->vclogin = $v;
    }
    public function getVcLogin() {
        return $this->vclogin;
    }

    public function setVcSenha($v) {
        $this->vcsenha = $v;
    }
    public function getVcSenha() {
        return $this->vcsenha;
    }

    public function setDtCadastro($v) {
        $this->dtcadastro = $v;
    }
    public function getDtCadastro() {
        return $this->dtcadastro;
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_user WHERE iduser = :ID", array(
            ":ID"=>$id
        ));
        if (count($results) > 0) {
            $row = $results[0];
            $this->setIdUser($row['iduser']);
            $this->setVcLogin($row['vclogin']);
            $this->setVcSenha($row['vcsenha']);
            $this->setDtCadastro(new DateTime($row['dtcadastro']));
        }
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_user ORDER BY vclogin;");
    }

    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_user WHERE vclogin LIKE :SEARCH ORDER BY vclogin;", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

public function login($vclogin, $vcsenha){
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM tb_user WHERE vclogin = :LOG AND vcsenha = :PASS", array(
        ":LOG"=>$vclogin,
        ":PASS"=>$vcsenha
    ));
    if (count($results) > 0) {
        $row = $results[0];
        $this->setIdUser($row['iduser']);
        $this->setVcLogin($row['vclogin']);
        $this->setVcSenha($row['vcsenha']);
        $this->setDtCadastro(new DateTime($row['dtcadastro']));
    } else {
        throw new Exception("Login ou senha inválidos!");
    }

}

    public function __toString() {
        return json_encode(array(
            "iduser"=>$this->getIdUser(),
            "vclogin"=>$this->getVcLogin(),
            "vcsenha"=>$this->getVcSenha(),
            "dtcadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
        ));
    }
}