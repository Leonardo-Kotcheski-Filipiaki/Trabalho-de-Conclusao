create database if not exists tge  ;
use tge;
CREATE TABLE `chats` (
  `idChat` int(11) NOT NULL,
  `idCriador` int(11) NOT NULL,
  `nomeChat` varchar(45) NOT NULL,
  `TemadoChat` varchar(140) NOT NULL
) ;

CREATE TABLE `mensagens` (
  `idmsg` int(11) NOT NULL,
   `nomeChat` varchar(45) NOT NULL,
  `idUsuario` varchar(1000) NOT NULL,
  `mensagem` varchar(240) NOT NULL,
  `nomeUsuario` varchar(16) NOT NULL,
  `imgUsuario` varchar(200) NOT NULL
) ;


CREATE TABLE `usuariostge` (
  `id` int(11) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `imgPerf` varchar(145) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `chatOn` int(11) NOT NULL,
  jogofav1 varchar(100),
  jogofav2 varchar(100),
  jogofav3 varchar(100)
) ;

ALTER TABLE `chats`
  ADD PRIMARY KEY (`idChat`);


ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`idmsg`);


ALTER TABLE `usuariostge`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `chats`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `mensagens`
  MODIFY `idmsg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;


ALTER TABLE `usuariostge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

