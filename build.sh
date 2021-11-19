#!/usr/bin/env bash
cd ..
echo "This will take a little longer, please wait..."
cp -rf i_fast_api ~/
MY_CURENT_LOCATION=`pwd`
cd ~/
cd i_fast_api
./eevee --build
mv SERVER.tar.gz /mnt/c/Users/umair/Downloads/
rm -rf ~/i_fast_api
cd "$MY_CURENT_LOCATION"
