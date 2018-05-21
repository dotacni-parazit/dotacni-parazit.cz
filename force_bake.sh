#!/bin/bash
./bin/cake bake controller $1 -f
./bin/cake bake template $1 -f
