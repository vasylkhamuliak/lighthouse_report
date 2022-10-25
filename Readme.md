# Setup

1. Run `git clone git@github.com:vasylkhamuliak/pagespeed_lighthouse_report.git`
2. Go to folder `cd pagespeed_lighthouse_report`
3. Run `cp settings-example.json settings.json`, open `settings.json` and add sites in list and [GooglePage Speed API KEY](https://developers.google.com/speed/docs/insights/v5/get-started) .
4. Create folder for reports for Lighthose `cd lighthose && mkdir report`
5. Run tests `./run-pagespeed.sh` or `./run-lighthouse.sh` (for lighthouse look at [instruction below](#install-lighthouse-and-jq))

# PageSpeed
This tests are doing with Google Page Speed API and can working in background. Run script and waiting to result.

## Run PageSpeed tests

```
./run-pagespeed.sh
```

It will generate `CSV Output`. You can copy it and paste it in the first cell in Excel, then go to Data, then select "Text to columns".

## Arguments for pagespeed shell script
If you want run pagespeed test from custom settings.json file (example, name settings-all.json). Need create this custom `settings-all.json` file and add argument `all` to `./run-pagespeed.sh`
```
./run-pagespeed.sh all
```

And after that script take API KEY and sites list from file `settings-all.json`



# Lighthouse
This tests are doing with Google Chrome Lighthouse CLI and Chrome browser. It will generate html templates results. All results are saved in folder `lighthouse/reports` and opened in new tab in browser Chrome.

For tests need to have installed `lighthouse cli` and `jq` libraries

## Run lighthouse tests

```
./run-lighthouse.sh
```

## Install Lighthouse and jq

```
npm install -g lighthouse

sudo apt-get install jq
or ( brew install jq ) - for MacOS
```


## Arguments for lighthouse shell script

If you want run lighthouse test from custom settings.json file (example, name settings-all.json). Need create this custom `settings-all.json` file and add argument `all` to `./run-lighthouse.sh`
```
./run-lighthouse.sh all
```

And after that script take sites list from file `settings-all.json`
