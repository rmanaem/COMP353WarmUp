UPDATE regionalerthistory SET
EndDate = '2016-12-30'
WHERE ID = 1;
UPDATE regionalerthistory SET
EndDate = '2019-05-08'
WHERE ID = 2;
UPDATE regionalerthistory SET
EndDate = '2019-07-18'
WHERE ID = 4;

INSERT INTO regionalerthistory (RegionID, AlertLevelID, EndDate) VALUES
(1, 2, '2020-02-13'),
(2, 2, '2020-02-13'),
(4, 2, '2020-02-13'),
(1, 3, '2020-09-08'),
(1, 4, '2020-11-23'),
(2, 3, '2020-12-19'),
(4, 1, '2021-01-26'),
(2, 2, '2021-02-21'),
(1, 3, null),
(2, 3, null),
(4, 2, null);