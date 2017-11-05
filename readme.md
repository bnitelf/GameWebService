# Game Web Service
A simple game web service. Written in PHP. 

- Project structure ไม่ได้มีโครงสร้างหรือ pattern อะไรเป็นพิเศษ แม้ว่าจะตั้งชื่อ folder ว่า controller, model ก็ตาม
- ไม่ได้ใช้ MVC

## Purpose
- สร้างสำหรับใช้เป็นตัวอย่างอย่างง่ายสำหรับเป็น web service ให้กับ game
- Project ที่ใช้ web service เป็น web service
  - [CocosCreator-LearnNetwork](https://github.com/bnitelf/CocosCreator-LearnNetwork)

## Prerequisite (for see sample)
- PHP version 5.4 or above.
- xampp or wamp or appserv

## How to use
1. Downlaod as zip.
1. แตกไฟล์ Right click -> Extract here
1. เป็นชื่อ folder "GameWebService-master" -> "GameWebService"
1. ย้าย folder ไปไว้ใน {your_xampp_instaled_directory}/htdocs/
1. เอา GameWebService/database/script/CreateDatabase.sql ไป run ใน phpMyAdmin เพื่อสร้าง database
1. ลอง test db connection ได้โดยพิมพ์ http://localhost/gamewebservice/database/testconnection.php ที่ browser ต้องขึ้นว่า "Connect to database successful."


## File ต่างๆ ที่เกี่ยวข้องหลักๆ
- **index.html** - บอกวิธีใช้ web service แต่ละ function
- **database/DbConnection.php** - settings database ที่นี่
- **database/TestConnection.php** - สำหรับ test connection to database
- **database/script/CreateDatabase.sql** - sql script สำหรับสร้าง database ที่จะใช้และ user "mygameuser" ด้วย
- **Player.php** - เป็นไฟล์หลักที่จะรับ request จาก client
- **MyGameWebService.postman_collection.json** - เป็นไฟล์ collection ของโปรแกรม postman สามารถนำไป import ใน postman แล้วลองยิง request ไปที่ web service ดูได้
