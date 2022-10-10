SELECT placa, SUBSTRING(placa,4,1) as letra from producao where SUBSTRING(placa,4,1)=9

update producao set placa=REPLACE(placa,'9','-') where LOCATE('9',placa) = 4