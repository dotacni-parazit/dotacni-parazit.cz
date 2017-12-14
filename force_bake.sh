#!/bin/bash

./bin/cake bake model $1 --table $1 -f
# pro ciselniky
# ./bin/cake bake model $1 --table ${1,} -f
# pro specialky
# ./bin/cake bake model CiselnikUcelZnakDotacniTitulv01 --table ciselnikUcelZnak_DotacniTitulv01 -f
# ./bin/cake bake model CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 --table ciselnikDotaceTitul_RozpoctovaSkladbaParagrafv01 -f
# ./bin/cake bake model CiselnikDotaceTitulStatniRozpocetUkazatelv01 --table ciselnikDotaceTitul_StatniRozpocetUkazatelv01 -f

./bin/cake bake controller $1 -f
./bin/cake bake template $1 -f
