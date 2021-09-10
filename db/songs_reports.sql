CREATE TABLE songs_reports (
    reportsId int(11),
    songsId int(11),
    UNIQUE(reportsId, songsId)
);