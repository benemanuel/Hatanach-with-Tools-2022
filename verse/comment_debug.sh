#!/bin/bash
sed -i 's#echo "<p debug=#if ($debug_flag) echo "<p debug=#g' $1
#sed -i 's#echo "<p debug=#//echo "<p debug=#g' $1


