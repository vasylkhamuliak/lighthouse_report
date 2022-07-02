# Lighthouse CLI git repo with docs - https://github.com/GoogleChrome/lighthouse

if [ $1 ]
then
   filename="settings-$1.json";
else
   filename='settings.json';
fi

jq -c -r '.sites[]' $filename | while read item
do
name=$(jq -r '.name' <<< $item)
url=$(jq -r '.url' <<< $item)

echo "Run Mobile lighthouse report for" $url;
lighthouse --view=true --output-path=./lighthouse/report/$name-mobile-report.html $url
echo "Finished. Open html mobile report for" $url;

echo "Run Desktop lighthouse report for" $url;
lighthouse --view=true --preset=desktop --output-path=./lighthouse/report/$name-desktop-report.html $url
echo "Finished. Open html desktop report for" $url;

done
