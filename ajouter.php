
DELIMITER |
create procedure AjouterPhotos(in pnum int(11),in ptitre varchar(30),in pdesc varchar(100),in purl varchar(30),in palias varchar(30))
BEGIN
	insert into Images values(pnum,ptitre,pdesc,purl,palias);
    commit;                          
END  

call AjouterPhotos(2, 'chat', 'Beau chat', 'asdtgr234dasfaf23asdasd', 'Daph');
