#!/bin/bash
for i in *.jpg
do
    convert -resize '1280x1280' $i medium/$i
    convert -resize '480x480' $i small/$i
done
