# Lighthouse CLI git repo with docs - https://github.com/GoogleChrome/lighthouse

if [ $1 ]
then
   filename=$1;
else
   filename='sites.json';
fi

$(
jq -c -r '.[]' ${filename} | while read item;
do
name=$(jq -r '.name' <<< "$item")
url=$(jq -r '.url' <<< "$item")

echo "Run Mobile lighthouse report for" $url;
lighthouse --view=true --output-path=./report/$name-mobile-report.html $url
echo "Finished. Open html mobile report for" $url;

echo "Run Desktop lighthouse report for" $url;
lighthouse --view=true --preset=desktop --output-path=./report/$name-desktop-report.html $url
echo "Finished. Open html desktop report for" $url;

done
);
