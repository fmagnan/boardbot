#!/bin/sh

RED='\033[0;31m'
BLUE='\033[0;34m'
GREEN='\033[0;32m'
NC='\033[0m'

title(){
    echo "\n${GREEN}--- $1 ---${NC}"
}

failure(){
    echo "${RED}$1${NC}"
    exit 1
}

DOCKER_CMD="docker exec -w /var/www/private/boardbot php_84 php -d memory_limit=1024M"

title "Mago formatter"
output=$($DOCKER_CMD bin/mago fmt)
echo $output
nb_rows=$(echo $output |grep "1)"|wc -l)
if [ "$nb_rows" -gt "0" ]; then
   failure "Mago formatter made changes, please run your commit again."
fi

title "Mago Linter"
output=$($DOCKER_CMD bin/mago lint)
echo "$output"


#title "Mago Analyzer"
#output=$($DOCKER_CMD bin/mago analyze)
#echo "$output"
#nb_rows=$(echo "$output" |grep "No errors"|wc -l)
#if [ "$nb_rows" -eq "0" ]; then
#   failure "Mago analyzer failure, commit has been cancelled."
#fi

title "PestPHP"
output=$($DOCKER_CMD bin/pest)
echo $output
nb_rows=$(echo $output |grep "FAILURES\|ERRORS"|wc -l)
if [ "$nb_rows" -gt "0" ]; then
   failure "PestPHP failure, commit has been cancelled."
fi