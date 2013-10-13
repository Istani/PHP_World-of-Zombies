C:
cd /xampp/htdocs/World-of-Zombies
git pull
echo git log --no-merges --date=iso8601 --pretty=format:"%%ad : %%s (%%an)" > changelog.txt
git log --no-merges --date=iso8601 --pretty=format:"%%ad : %%s (%%an)" >> changelog.txt
C:\xampp\php\php.exe C:\xampp\htdocs\World-of-Zombies\script_mysql_struktur.php
ftp -s:"C:\xampp\htdocs\World-of-Zombies\Scripte\ZoD-FTP C.txt"
git add TEMP_MYSQL_STRUKTUR.sql
git add changelog.txt
git add picture
git commit -m "Update SK"
git push