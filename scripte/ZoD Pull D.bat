d:
cd /xampp/htdocs/zodgame
git pull
echo git log --no-merges --date=iso8601 --pretty=format:"%%ad : %%s (%%an)" > changelog.txt
git log --no-merges --date=iso8601 --pretty=format:"%%ad : %%s (%%an)" >> changelog.txt
D:\xampp\php\php.exe D:\xampp\htdocs\zodgame\script_mysql_struktur.php
ftp -s:"D:\Dropbox\Trans_All\Scripte\ZoD-FTP D.txt"
git add TEMP_MYSQL_STRUKTUR.sql
git add changelog.txt
git add picture
git commit -m "Update SK"
git push