<?php

class AcervoDTO {

    private $idacervo;
    private $autor1;
    private $autor2;
    private $titulo;
    private $subtitulo;
    private $editora;
    private $isbn;
    private $n_edicao;
    private $categoria;
    private $linguagem_livro;
    private $quantidade;
    private $status;
    private $autor_idautor;
    
    function getAutor_idautor() {
        return $this->autor_idautor;
    }

    function setAutor_idautor($autor_idautor) {
        $this->autor_idautor = $autor_idautor;
    }

                
    function getIdacervo() {
        return $this->idacervo;
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

    function getSubtitulo() {
        return $this->subtitulo;
    }

    function getEditora() {
        return $this->editora;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getN_edicao() {
        return $this->n_edicao;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getLinguagem_livro() {
        return $this->linguagem_livro;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdacervo($idacervo) {
        $this->idacervo = $idacervo;
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

    function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setN_edicao($n_edicao) {
        $this->n_edicao = $n_edicao;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setLinguagem_livro($linguagem_livro) {
        $this->linguagem_livro = $linguagem_livro;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}