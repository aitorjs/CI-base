Erabiltzaile bat bere motakin

SELECT * FROM `erabiltzaileak` 
JOIN motak ON erabiltzaileak.mota_id = motak.id
WHERE erabiltzaileak.id = 1


Erabiltzaile mota duten erabiltzaileak

SELECT * FROM `erabiltzaileak` 
JOIN motak ON erabiltzaileak.mota_id = motak.id
WHERE motak.id = 2

Erabiltzaile 2 bere motak eta blog sarrerekin

SELECT * FROM `erabiltzaileak` 
JOIN motak ON erabiltzaileak.mota_id = motak.id
JOIN blogak ON erabiltzaileak.id = blogak.erabiltzailea_id
WHERE erabiltzaileak.id = 2

Erabiltzaile 2 bere mota, blog sarrera eta etiketekin. arazoa sortzen duela blogeko etiketa bakoitzeko sarrera bat!

SELECT * FROM `erabiltzaileak` 
JOIN motak ON erabiltzaileak.mota_id = motak.id
JOIN blogak ON erabiltzaileak.id = blogak.erabiltzailea_id
JOIN blogak_etiketak ON blogak.id = blogak_etiketak.bloga_id
JOIN etiketak ON blogak_etiketak.etiketa_id = etiketak.id
WHERE erabiltzaileak.id = 2


Arazo honi hau da soluzioa:

3. select-a egin. hor ateratzen diren bloga_id berdinak gode eta horiekn foreach bat egin beheko sql-a eginez.

SELECT *
FROM `blogak_etiketak`
JOIN etiketak ON etiketak.id = blogak_etiketak.etiketa_id
WHERE blogak_etiketak.bloga_id =2