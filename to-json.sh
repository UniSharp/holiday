cat 106.txt | sed -E 's/^([0-9]{4})([0-9]{2})([0-9]{2}).([0|2]).*$/{"date": "\1-\2-\3", "type": "\4"}/' | jq -s 'reduce .[] as $row ({}; . + {($row.date): ("2" == $row.type)})' > 106.json
