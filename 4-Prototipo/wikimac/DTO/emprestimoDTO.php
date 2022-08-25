<?php

class EmprestimoDTO {

    private $idemprestimo;
    private $idacervo;
    private $data_inicio;
    private $data_termino;
    private $renovar;
    private $cpf_usuario;
    private $usuario_idusuario;
    private $acervo_idacervo;
    
    private $autor1;
    private $autor2;
    private $titulo;
    private $subtitulo;
    private $editora;
    private $n_edicao;
    private $isbn;
    private $idusuario;
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

        function getN_edicao() {
        return $this->n_edicao;
    }

    function setN_edicao($n_edicao) {
        $this->n_edicao = $n_edicao;
    }

        function getSubtitulo() {
        return $this->subtitulo;
    }

    function getEditora() {
        return $this->editora;
    }

    function getEdicao() {
        return $this->edicao;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    function setEdicao($edicao) {
        $this->edicao = $edicao;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

        function getAutor1() {
        return $this->autor1;
    }

    function getAutor2() {
        return $this->autor2;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setAutor1($autor1) {
        $this->autor1 = $autor1;
    }

    function setAutor2($autor2) {
        $this->autor2 = $autor2;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

        
    function getIdemprestimo() {
        return $this->idemprestimo;
    }

    function getIdacervo() {
        return $this->idacervo;
    }

    function getData_inicio() {
        return $this->data_inicio;
    }

    function getData_termino() {
        return $this->data_termino;
    }

    function getRenovar() {
        return $this->renovar;
    }

    function getCpf_usuario() {
        return $this->cpf_usuario;
    }

    function getUsuario_idusuario() {
        return $this->usuario_idusuario;
    }

    function getAcervo_idacervo() {
        return $this->acervo_idacervo;
    }

    function setIdemprestimo($idemprestimo) {
        $this->idemprestimo = $idemprestimo;
    }

    function setIdacervo($idacervo) {
        $this->idacervo = $idacervo;
    }

    function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    function setData_termino($data_termino) {
        $this->data_termino = $data_termino;
    }

    function setRenovar($renovar) {
        $this->renovar = $renovar;
    }

    function setCpf_usuario($cpf_usuario) {
        $this->cpf_usuario = $cpf_usuario;
    }

    function setUsuario_idusuario($usuario_idusuario) {
        $this->usuario_idusuario = $usuario_idusuario;
    }

    function setAcervo_idacervo($acervo_idacervo) {
        $this->acervo_idacervo = $acervo_idacervo;
    }


}