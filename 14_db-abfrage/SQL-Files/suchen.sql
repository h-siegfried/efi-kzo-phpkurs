SELECT `SuS`.`p_vorname` AS `S_Vorname`, `SuS`.`p_name` AS `S_Name`, 
       `kurs`.`kurs_name`,
       `LP`.`p_vorname` AS `KLP_Vorname`, `LP`.`p_name` AS `KLP_Name`

FROM `kurs`, 
     `person` AS `SuS`, 
     `person` AS `LP`, 
      person_besucht_kurs,
      person_unterrichtet_kurs

WHERE `SuS`.`p_ID` = person_besucht_kurs.person_p_ID
  AND person_besucht_kurs.kurs_kurs_ID = kurs.kurs_ID
  AND kurs.kurs_ID = person_unterrichtet_kurs.kurs_kurs_ID
  AND person_unterrichtet_kurs.istKlaLe = 1
  AND person_unterrichtet_kurs.person_p_ID = `LP`.`p_ID`