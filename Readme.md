## Install lighthouse and jq

`npm install -g lighthouse`

`sudo apt-get install jq` or `brew install jq`

## Setup and run

1. Run `git clone git@github.com:vasylkhamuliak/lighthouse_report.git`
2. Go to folder `cd lighthouse_report`
3. Create folder for reports `mkdir report`
3. Run `cp sites-example.json sites.json` and add sites in list.
4. Run script `./run_lighthose_reports.sh`

## Arguments for shell script

$1 - file name
Example: `./run_lighthose_reports.sh sites-another.json` or `./run_lighthose_reports.sh sites-all.json`
