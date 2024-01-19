create table Music(
    music_id int(7) not null auto_increment,
    music_name varchar(100) not null,
    music_link varchar(300) not null,
    musician_id int(7) not null,
    primary key (music_id),
    foreign key (musician_id) references Musician(musician_id)
    );