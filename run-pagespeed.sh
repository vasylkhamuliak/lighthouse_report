#!/bin/bash

echo "Run page speed tests";

if [ $1 ]
then
   filename=$1;
else
   filename='';
fi

php pagespeed/getScores.php $filename
