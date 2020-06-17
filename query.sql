//join 3 tabel
SELECT * FROM `notadinas` 
JOIN hpe on hpe.notadinas_id = notadinas.id 
JOIN proses_pengadaan ON proses_pengadaan.notadinas_id = notadinas.id 
WHERE proses_pengadaan.selesai = '1' 

//join 4 tabel
SELECT * FROM `notadinas` 
JOIN hpe on hpe.notadinas_id = notadinas.id 
JOIN proses_pengadaan ON proses_pengadaan.notadinas_id = notadinas.id
LEFT JOIN kontrak ON kontrak.notadinas_id = notadinas.id
WHERE proses_pengadaan.selesai = '1'

