#!/bin/bash

if [ $1 ]
then
   FILENAME="settings-$1.json";
else
   FILENAME='settings.json';
fi
export FILENAME

echo "Run lighthouse tests";
./lighthouse/run_lighthouse_reports.sh
