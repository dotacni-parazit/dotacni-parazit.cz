# Konverze a import PAP do SQL

## Shell
wget -c "https://www.statnipokladna.cz/assets/cs/media/IISSP-CSUIS_Ciselniky_2019-07-31_PAP-IC-2019-07-31-v01.zip"
unzip IISSP-CSUIS_Ciselniky_2019-07-31_PAP-IC-2019-07-31-v01.zip
iconv -f latin2 -t utf8 PAP-IC-2019-07-31-v01.unl > PAP-IC-2019-07-31-v01.utf8.unl

## MySQL
TRUNCATE cedr_custom.pap_ico;
LOAD DATA LOCAL INFILE './PAP-IC-2019-07-31-v01.utf8.unl' INTO TABLE cedr_custom.pap_ico FIELDS TERMINATED BY '|' (ico,name,@start,@end) SET `id`=NULL, start=STR_TO_DATE(@start,"%d.%m.%Y"), end=STR_TO_DATE(@end,"%d.%m.%Y");
