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
Insert into song (title, album) VALUES('All the beats', 0);
Insert into song (title, album) VALUES('Heart beats', 1);
Insert into song (title, album) VALUES('Mad beats', 0);
Insert into song (title, album) VALUES('Red Beets', 1);
Insert into song (title, album) VALUES('I am beat', 0);
Insert into song (title, album) VALUES('Beats', 1);
Insert into song (title, album) VALUES('Good beats', 0);
Insert into song (title, album) VALUES('Bad beats', 1);
Insert into song (title, album) VALUES('Most beats', 0);
Insert into songlist (list, songid) VALUES (0, 4);
Insert into songlist (list, songid) VALUES (0, 1);
Insert into songlist (list, songid) VALUES (0, 2);
Insert into songlist (list, songid) VALUES (0, 6);
Insert into songlist (list, songid) VALUES (0, 5);
Insert into songlist (list, songid) VALUES (1, 6);
Insert into songlist (list, songid) VALUES (1, 5);
Insert into songlist (list, songid) VALUES (1, 0);
Insert into songlist (list, songid) VALUES (1, 1);
insert into playlist(title, songs) VALUES ('First Playlist', 0); --songs references songlist(list)
insert into playlist(title, songs) VALUES ('Second Playlist', 1); --songs references songlist(list)

select p.title, l.list from playlist p join songlist l on p.songs = l.list group by p.title, l.list; -- song list id from songs
select s.title, a.album from song s join album a on s.album = a.id order by a.album ASC;



delete sl 
from songlist as sl 
join playlist as p 
on sl.list = p.songs join song as s 
on sl.songid = s.id 
where s.id = 'Heart beats' and p.title = 'Second Playlist';
