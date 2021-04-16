INSERT INTO messageTemplate (Subject, Template) VALUES
('Important information regarding your PCR Test', '{PersonName},<br>We regret to inform you that your PCR test taken at {PublicHealthCentreName} on {PCRTestDateOfTest} has returned positive for COVID-19. For the next 14 days, we ask that you fill out a daily symptom tracker on <a href="{url}">the PCR tracker website</a> at {url}. In the meantime, please read and observe the following recommendations:<br>{Recommendations}'),
('Important information regarding your PCR Test', '{PersonName},<br>We are pleased to inform you that your PCR test taken at {PublicHealthCentreName} on {PCRTestDateOfTest} has returned negative for COVID-19. Please remain vigilant of the pandemic, follow local guidelines, and return for a new test if you believe you have been exposed to the virus.'),
('Important information regarding your health', '{PersonName},<br>Recent testing indicates that you have been recently exposed to the COVID-19 virus. Please travel to a nearby hospital or clinic for a PCR test as soon as possible.'),
('Your next symptom report must be filled', '{PersonName},<br>Please navigate to <a href="{url}">the PCR tracker website</a> at {url} to fill out today\'s symptom tracker, and continue to observe the following recommendations. We suggest regular review of these recommendations as they are always subject to change.<br>{Recommendations}'),
('Your region alert level has changed', '{PersonName},<br>Please note that the alert level in {RegionName} has changed to level {AlertLevelID} ({AlertLevelName}) - {AlertLevelDescription}. Please consult local sources for details on new policies and recommendations.');