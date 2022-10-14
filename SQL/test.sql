-- 3ème story
INSERT INTO user(email, mdp, pseudo) VALUES ("mbourouih94@gmail.com", "hash", "MehdiKit")

UPDATE user(mdp) VALUES ("hash2") WHERE id = :id AND mdp = :MAX_PDB_SNAPSHOTS


-- 4ème story
SELECT id FROM user WHERE email = :email && mdp = :mdp

UPDATE user(ip) VALUES("ip") WHERE id = :id
-- si c'est bon ça renvoie l'id de la personne est on peut la stock dans les cookies ou la SESSION
SELECT * FROM uesers WHERE id = :id && ip = :ip
-- Affiche tout selon l'id stocker et pour plus de sécurité on verifie si l'adresse ip dans la bdd correspond à celle du pc sinon il doit se reconnecter

-- 5ème story
INSERT INTO jeux(name) VALUES ("The Power Of Memory")

-- 6ème & 7ème story
SELECT (id_player, id_game, difficulty, score) FROM scores WHERE id = :id
SELECT name FROM jeux where id = :id_game ORDER BY ASC
SELECT pseudo FROM user where id = :id_player

-- c'est incomprehensible ce qu'il faut faire 

-- 8ème story
--admettons qu'il y ai un if avant avec :

SELECT id FROM scores where id_player = :id_player && id_game = :id_game

--------- si true :
UPDATE scores(score) VALUES (:score) where id

--------- si false :
INSERT INTO scores(id_player, id_game, difficulty, score) VALUES (:id_player, :id_game, difficulty, score)


--9ème & 10ème story
INSERT INTO message(id_game, id_player, message) VALUES (:id_game, :id_player, :message)

:date_up = NOW() - 24 * 3600

SELECT * FROM message WHERE date >= :date_up ORDER BY DESC

SELECT name from users WHERE id = :id

