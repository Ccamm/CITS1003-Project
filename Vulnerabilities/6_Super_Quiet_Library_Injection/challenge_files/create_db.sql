CREATE TABLE IF NOT EXISTS "users" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "username" VARCHAR,
  "password" VARCHAR
);

CREATE TABLE IF NOT EXISTS "feedback" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "name" VARCHAR,
  "email" VARCHAR,
  "message" TEXT
);

CREATE TABLE IF NOT EXISTS "flag" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "flag" VARCHAR
);

INSERT INTO "users" ("username", "password") VALUES ("nigel", "nooneisevergoingtoguessthispasswordsinceitissooooomanycharacterslong!");
INSERT INTO "feedback" ("name", "email", "message") VALUES ("David", "david@themadhacker.com", "Your website has several SQL injection vulnerabilities... Please use prepared statements and fix them IMMEDIATELY!");
INSERT INTO "feedback" ("name", "email", "message") VALUES ("Ghostccamm", "fake@email.com", "I love the SQL injections that you have added as a feature to this website :)");
INSERT INTO "feedback" ("name", "email", "message") VALUES ("Alvaro", "alvaro@email.com", "Both the login and feedback pages do not properly sanitise user inputs before querying the backend DB. This is really serious and you need to fix this!");
INSERT INTO "flag" ("flag") VALUES ("CTF{i_5h0uLd_pRoBs_l3aRn_aBoUt_pRePaRed_qU3ri3s...}")
