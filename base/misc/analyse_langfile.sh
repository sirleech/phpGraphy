#!/bin/bash
#
#  This program is free software; you can redistribute it and/or modify
#  it under the terms of the GNU General Public License as published by
#  the Free Software Foundation; either version 2, or (at your option)
#  any later version.
#
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#
#  You should have received a copy of the GNU General Public License
#  along with this program; if not, write to the Free Software
#  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
#

#
# This script run a serie of tests on a phpGraphy language file (See show_usage for details)
#
# Author: JiM / aEGIS - 2005-07-01
# $Id: analyse_langfile.sh 114 2005-07-01 11:24:18Z jim $
#

################
#  Variables   #
################

TMP_DIR=/tmp
ORIG_FILE="lang_en.inc.php"
RUN_DIFF=""


################
#  Functions   #
################

function show_usage {

echo "$0 - $Rev$"
echo ""
echo "Usage $0 [LANG_FILE]"
echo ""
echo "  LANG_FILE       Optional language filename, if omitted default to $ORIG_FILE"
echo "  -h or --help    display this screen"
echo ""
echo "eg: $0 lang_fr.inc.php" 
echo ""

}

function count_lines {

    egrep '^[ ]*\$' $1 | cut -d"=" -f1 | wc -l | awk '{ print $1}'

}

function count_ulines {

    egrep '^[ ]*\$' $1 | cut -d"=" -f1 | sort -ub | wc -l | awk '{ print $1}'

}

function diff_lang_files {

# Use $1 and $2 as argument
    egrep '^[ ]*\$' $1 | cut -d"=" -f1 | sort -n > $TMP_DIR/$1.tmp
    egrep '^[ ]*\$' $2 | cut -d"=" -f1 | sort -n > $TMP_DIR/$2.tmp
    echo -e "left: $1 | right: $2"
    sdiff -s $TMP_DIR/$1.tmp $TMP_DIR/$2.tmp
    rm -f $TMP_DIR/$1.tmp $TMP_DIR/$2.tmp

}

#############
#  Checks   #
#############

if [ "$1" == "-h" -o "$1" == "--help" ]
  then
    show_usage
    exit 0
fi

if [ "$1" != "" ]
  then
    FILE=$1
  else
    FILE=$ORIG_FILE
fi

if [ ! -f $FILE ]
  then
    echo "ERROR: Could not open $FILE"
    echo ""
    show_usage
    exit 1
fi


##################
#  Main Program  #
##################

echo "Analyze of $FILE..."
echo ""

LINES_NB=$(count_lines $FILE)
ULINES_NB=$(count_ulines $FILE)

echo -en "Variables found: $LINES_NB - Uniques: $ULINES_NB \tStatus "

echo -en "[\033[1m"
if [ "$LINES_NB" -eq "$ULINES_NB" ]
  then
    echo -en "\E[32;40mOK"
  else
    echo -en "\E[31;40mFAILED"
fi
echo -e "\033[0m]"
tput sgr0

if [ -f $ORIG_FILE -a "$ORIG_FILE" != "$FILE" ]
  then
    LINES_NB_CUST=$LINES_NB
    LINES_NB=$(count_lines $ORIG_FILE)
    echo -en "Comparing with $ORIG_FILE ($LINES_NB)"
    echo -en "\tStatus "
    echo -en "[\033[1m"
    if [ $LINES_NB -eq $LINES_NB_CUST ]
        then
          echo -en "\E[32;40mOK"
        else
          echo -en "\E[31;40mFAILED"
          RUN_DIFF=1;
    fi
    echo -e "\033[0m]"
    tput sgr0
fi

if [ "$RUN_DIFF" == 1 ]
  then
  echo "Differences found:"
  diff_lang_files $ORIG_FILE $FILE
fi

echo ""
    

