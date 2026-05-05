USE ADM;

CREATE TABLE IF NOT EXISTS func(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(255) NOT NULL
);



INSERT INTO func(name, email, password) 
VALUES(
    'Domingos Pedro',
    'domingosPedro123@gmail.com',
    '123456',
    'dotor');


CREATE TABLE IF NOT EXISTS paciente(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    telefone INT UNIQUE NOT NULL,
    data INT NOT NULL
);


CREATE TABLE IF NOT EXISTS medico(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone INT UNIQUE NOT NULL
    );


CREATE TABLE IF NOT EXISTS consulta(
    id INT AUTO_INCREMENT PRIMARY KEY;
    name VARCHAR(200) NOT NULL,
    data DATE,
    email VARCHAR(200) NOT NULL,
    telefone INT NOT NULL,
    motivo VARCHAR(500) NOT NULL
)
