DROP TABLE IF EXISTS songlist;
DROP TABLE IF EXISTS song;
DROP TABLE IF EXISTS playlist;
DROP TABLE IF EXISTS album;



CREATE TABLE album (
   id SERIAL PRIMARY KEY,
   album VARCHAR(256) NOT NULL,
   releaseDate DATE,
   albumArtist VARCHAR(256)
   
);

CREATE TABLE song (
    id SERIAL PRIMARY KEY,
    title VARCHAR(256) NOT NULL UNIQUE,
    album INT NOT NULL references album(id)

);

CREATE TABLE songlist(
    id SERIAL PRIMARY KEY,
    List INT NOT NULL,
    songID INT NOT NULL REFERENCES song(id)
);

CREATE TABLE playlist (
    id SERIAL PRIMARY KEY,
    title VARCHAR(256) NOT NULL UNIQUE,
    songs INT NOT NULL -- reference songlist(list) one to many - not sure how to do that.
    );

Insert into album (id, album, releaseDate, albumArtist) VALUES (0,'The better ones', '2015-12-17', 'AJR');
Insert into album (album, releaseDate, albumArtist) VALUES ('The worse ones', '2014-12-17', '21 Pilots');
Insert into song (title, album) VALUES('No beats', 1);
Insert into song (title, album) VALUES('Some beats', 0);
Insert into songlist (list, songid) VALUES (1, 1);
Insert into songlist (list, songid) VALUES (0, 1);
Insert into songlist (list, songid) VALUES (0, 2);
insert into playlist(title, songs) VALUES ('Both Songs', 1); --songs references songlist(list)

