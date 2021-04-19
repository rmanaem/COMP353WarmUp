DELIMITER //
CREATE TRIGGER CheckAlertLevelIncrementation
BEFORE INSERT 
ON RegionAlertHistory 
FOR EACH ROW
BEGIN
	IF (ABS((SELECT AlertLevelID FROM RegionAlertHistory 
    WHERE RegionID = NEW.RegionID AND EndDate IS NULL
    GROUP BY RegionID) - NEW.AlertLevelID) <> 1) THEN
		SIGNAL SQLSTATE "45000" 
			SET MESSAGE_TEXT = "Alert level can only be modified by 1 level at a time";
	END IF;
END //

CREATE TRIGGER SetDefaultAlertLevel
AFTER INSERT
ON Region
FOR EACH ROW
BEGIN
	INSERT INTO RegionAlertHistory(RegionID, AlertLevelID) VALUES (NEW.ID, 1);
END // 