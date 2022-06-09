# Lighthouse CLI git repo with docs - https://github.com/GoogleChrome/lighthouse

jq -c -r '.[]' input.json | while read item;
do
name=$(jq -r '.name' <<< "$item")
url=$(jq -r '.url' <<< "$item")

echo "Run Mobile lighthouse report for" $url;
# lighthouse --view=true --quiet --output-path=./report/$name-mobile-report.html $url
echo "Finished. Open html mobile report for" $url;

 echo "Run Desktop lighthouse report for" $url;
# lighthouse --view=true --preset=desktop --output-path=./report/betting-desktop-report.html https://www.betting.se/
echo "Finished. Open html desktop report for" $url;

done
