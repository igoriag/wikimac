<?php

class UsuarioDTO {
    
    private $idusuario;
    private $id_usuario;
    private $nome;
    private $cpf;
    private $rg;
    private $telefone;
    private $telefone2;
    private $data_nascimento;
    private $endereco;
    private $cep;
    private $email;
    private $cidade;
    private $login;
    private $senha;
    private $perfil;
    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

        function getTelefone2() {
        return $this->telefone2;
    }

    function setTelefone2($telefone2) {
        $this->telefone2 = $telefone2;
    }

        function getCidade() {
        return $this->cidade;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

        function getIdusuario() {
        return $this->idusuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCep() {
        return $this->cep;
    }

    function getEmail() {
        return $this->email;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }


}
