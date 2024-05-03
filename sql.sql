-- CRIACAO DA TABELA
CREATE TABLE agendamentos(
    id INTEGER PRIMARY KEY AUTO_INCREMENT, 
    nome VARCHAR(200) NOT NULL, 
    data_nascimento date NOT NULL, 
    celular VARCHAR(11) NOT NULL, 
    email VARCHAR(200) NOT NULL, 
    data_consulta DATE NOT NULL, 
    hora_consulta TIME NOT NULL, 
    motivo_consulta ENUM('Restauração', 'Canal', 'Implante', 'Extração', 'Clareamento', 'Lentes')  NOT NULL
);

-- PROCEDURES
-- Adicionar
DELIMITER //
CREATE PROCEDURE AdicionarAgendamento(
    IN nome VARCHAR(200), 
    IN data_nascimento date, 
    IN celular VARCHAR(11), 
    IN email VARCHAR(200), 
    IN data_consulta DATE, 
    IN hora_consulta TIME,
    motivo_consulta ENUM('Restauração', 'Canal', 'Implante', 'Extração', 'Clareamento', 'Lentes')
)
BEGIN
 INSERT INTO agendamentos(nome, data_nascimento, celular, email, data_consulta, hora_consulta, motivo_consulta) 
 VALUES(nome, data_nascimento, celular, email, data_consulta, hora_consulta, motivo_consulta);
END //
DELIMITER ;

-- Excluir
DELIMITER //
CREATE PROCEDURE ExcluirAgendamento(IN agendamento_id INT)
BEGIN
 DELETE FROM agendamentos WHERE id = agendamento_id;
END //
DELIMITER ;

-- Atualizar
DELIMITER //
CREATE PROCEDURE AtualizarAgendamento(
    IN agendamento_id INT,
    IN novo_nome VARCHAR(200), 
    IN nova_data_nascimento DATE, 
    IN novo_celular VARCHAR(11), 
    IN novo_email VARCHAR(200), 
    IN nova_data_consulta DATE, 
    IN nova_hora_consulta TIME,
    novo_motivo_consulta ENUM('Restauração', 'Canal', 'Implante', 'Extração', 'Clareamento', 'Lentes')
)
BEGIN
    UPDATE agendamentos 
    SET nome = novo_nome, 
        data_nascimento = nova_data_nascimento, 
        celular = novo_celular, 
        email = novo_email, 
        data_consulta = nova_data_consulta, 
        hora_consulta = nova_hora_consulta, 
        motivo_consulta = novo_motivo_consulta 
    WHERE id = agendamento_id;
END //
DELIMITER ;


-- Selecionar
DELIMITER //
CREATE PROCEDURE SelecionarAgendamento()
BEGIN
    SELECT id, nome, FormatarData(data_nascimento) as data_nascimento, celular, FormatarData(data_consulta) as data_consulta, FormatarEmail(email) as email, hora_consulta, motivo_consulta FROM agendamentos;
END //
DELIMITER ;

-- Selecionar Por ID
DELIMITER //
CREATE PROCEDURE SelecionarAgendamentoId(IN agendamento_id INT)
BEGIN
    SELECT 
    id, 
    nome, 
    data_nascimento, 
    celular, 
    data_consulta, 
    email, 
    hora_consulta, 
    motivo_consulta 
    FROM agendamentos
    WHERE id = agendamento_id;
END //
DELIMITER ;

-- FUNCTIONS
-- Formatar Data
DELIMITER $$
CREATE FUNCTION FormatarData(data_formatar DATE)
RETURNS VARCHAR(10)
BEGIN
    DECLARE data_formatada VARCHAR(10);
    
    SET data_formatada = DATE_FORMAT(data_formatar, '%d/%m/%Y');
    
    RETURN data_formatada;
END$$
DELIMITER ;


-- Formatar Email
DELIMITER $$
CREATE FUNCTION FormatarEmail(email VARCHAR(200))
RETURNS VARCHAR(200)
BEGIN
    DECLARE email_formatado VARCHAR(200);
    
    SET email_formatado = CONCAT(SUBSTRING_INDEX(email, '@', 1), '@', REPEAT('*', LENGTH(SUBSTRING_INDEX(email, '@', -1))) );
    
    RETURN email_formatado;
END$$
DELIMITER ;