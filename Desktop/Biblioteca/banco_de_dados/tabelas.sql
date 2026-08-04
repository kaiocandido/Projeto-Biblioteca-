DROP TABLE IF EXISTS locacao;
DROP TABLE IF EXISTS exemplar;
DROP TABLE IF EXISTS livro;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS status_locacao;
DROP TABLE IF EXISTS autor;
DROP TABLE IF EXISTS editora;
DROP TABLE IF EXISTS categoria;
DROP TABLE IF EXISTS controle_rotinas;

CREATE TABLE editora(
    id_editora    INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(100) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE autor(
    id_autor      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(100) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categoria(
    id_categoria  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao     VARCHAR(100) NOT NULL
);

CREATE TABLE livro(
    id_livro         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo           VARCHAR(200) NOT NULL,
    descricao        VARCHAR(1000) NOT NULL,
    id_autor         INT NOT NULL,
    id_editora       INT,
    id_categoria     INT NOT NULL,
    data_cadastro    DATETIME DEFAULT CURRENT_TIMESTAMP,
    ISBN             VARCHAR(20) UNIQUE,
    status           INT NOT NULL,
    ano_publicacao   YEAR,
    imagem           VARCHAR(200),
    FOREIGN KEY (id_autor) REFERENCES autor (id_autor) ON DELETE CASCADE,
    FOREIGN KEY (id_editora) REFERENCES editora (id_editora) ON DELETE SET NULL,
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria)ON DELETE CASCADE
);

CREATE TABLE exemplar(
    id_exemplar   INT AUTO_INCREMENT PRIMARY KEY,
    codigo        VARCHAR(20) NOT NULL UNIQUE,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_livro      INT NOT NULL,
    FOREIGN KEY (id_livro) REFERENCES livro (id_livro) ON DELETE CASCADE
);

CREATE TABLE usuario (
    id_usuario     INT AUTO_INCREMENT PRIMARY KEY,
    nome           VARCHAR(100) NOT NULL,
    cpf            VARCHAR(11) UNIQUE NOT NULL,
    email          VARCHAR(150) UNIQUE,
    data_cadastro  DATETIME DEFAULT CURRENT_TIMESTAMP,
    telefone       VARCHAR(20) NOT NULL,
    endereco       VARCHAR(1000),
    status         INT NOT NULL
);

CREATE TABLE status_locacao(
    id_status_locacao INT AUTO_INCREMENT PRIMARY KEY,
    descricao         VARCHAR(50) NOT NULL
);

CREATE TABLE locacao(
    id_locacao                      INT AUTO_INCREMENT PRIMARY KEY,
    id_exemplar                     INT NOT NULL,
    id_usuario                      INT NOT NULL,
    data_locacao                    DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_devolucao_prevista         DATETIME NOT NULL,
    data_devolucao                  DATETIME NULL,
    id_status_locacao               INT NOT NULL DEFAULT 1,
    FOREIGN KEY (id_exemplar)       REFERENCES exemplar (id_exemplar) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario)        REFERENCES usuario (id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_status_locacao) REFERENCES status_locacao (id_status_locacao)
);

CREATE TABLE controle_rotinas(
    rotina          VARCHAR(100) PRIMARY KEY,
    ultima_execucao DATE
);







