# Poznámky k datům z eAgri Registr de Minimis - podpora maleho rozsahu

1) konverze XLSX na CSV
```
ssconvert RDM_KOMPLET_2017.xlsx RDM_KOMPLET_2017.csv
# například, lze použít i xlsx2csv nebo jiné nástroje
```

2) db schéma

```sql
CREATE TABLE `eagri_rdm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kod_prijemce` varchar(255) DEFAULT NULL,
  `kod_prijemce_num` int(11) DEFAULT NULL,
  `ico_prijemce` varchar(255) DEFAULT NULL,
  `ico_prijemce_num` int(11) DEFAULT NULL,
  `ico_poskytovatele` varchar(255) NOT NULL,
  `castka_kc` int(11) NOT NULL,
  `ucel` text NOT NULL,
  `in_year` year(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `ico_poskytovatele` (`ico_poskytovatele`),
  KEY `in_year` (`in_year`),
  KEY `kod_prijemce_num` (`kod_prijemce_num`),
  KEY `ico_prijemce_num` (`ico_prijemce_num`),
  FULLTEXT KEY `ucel` (`ucel`)
) ENGINE=InnoDB AUTO_INCREMENT=28666 DEFAULT CHARSET=utf8
```

3) Import dat

kompletní datasety
```sql
LOAD DATA LOCAL INFILE 'RDM_KOMPLET_2018.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col1,@col2,@col3,@col
4,@col5) SET id=NULL,created=NOW(),in_year=2018,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;

LOAD DATA LOCAL INFILE 'RDM_KOMPLET_2017.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col1,@col2,@col3,@col
4,@col5) SET id=NULL,created=NOW(),in_year=2017,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;
```

měsíce 2019 02-05
```sql
LOAD DATA LOCAL INFILE 'RDM_2019_02.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col1,@col2,@col3,@co
l4,@col5) SET id=NULL,created=NOW(),in_year=2019,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;
LOAD DATA LOCAL INFILE 'RDM_2019_03.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col1,@col2,@col3,@co
l4,@col5) SET id=NULL,created=NOW(),in_year=2019,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;
LOAD DATA LOCAL INFILE 'RDM_2019_04.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col1,@col2,@col3,@co
l4,@col5) SET id=NULL,created=NOW(),in_year=2019,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;
LOAD DATA LOCAL INFILE 'RDM_2019_05.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col1,@col2,@col3,@co
l4,@col5) SET id=NULL,created=NOW(),in_year=2019,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;
```

měsíční dataset 2019_01 má 1. sloupec navíc (status - bezproblémový)
```sql
LOAD DATA LOCAL INFILE 'RDM_2019_01.csv' INTO TABLE cedr_custom.eagri_rdm FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' IGNORE 1 ROWS (@col0,@col1,@col2,@col3,@co
l4,@col5) SET id=NULL,created=NOW(),in_year=2019,kod_prijemce=@col1,ico_prijemce=@col2,ico_poskytovatele=@col3,castka_kc=@col4,ucel=@col5;
```

4) Oprava dat, kde je to nutné

vlozeni radku udela prazdne hodnoty kde by mohlo byt null
v kod_prijemce a ico_prijemce je uvedena textove informace kdy ico prestalo byt aktivni PO

```sql
UPDATE eagri_rdm SET ico_prijemce=NULL WHERE ico_prijemce="";
UPDATE eagri_rdm SET kod_prijemce=NULL WHERE kod_prijemce="";
UPDATE eagri_rdm SET ico_prijemce=substring_index(ico_prijemce, " ",1);
UPDATE eagri_rdm SET kod_prijemce=substring_index(kod_prijemce, " ",1);
```

5) Konverze textu na cisla kvuli FK vazbam

```sql
UPDATE eagri_rdm SET kod_prijemce_num = CAST(kod_prijemce AS UNSIGNED) WHERE kod_prijemce IS NOT NULL;
UPDATE eagri_rdm SET ico_prijemce_num = CAST(ico_prijemce AS UNSIGNED) WHERE ico_prijemce IS NOT NULL;
```
