const mysql = require('mysql2');
const dbHostName = process.env.DB_HOST_NAME;
const dbUserName = process.env.DB_USERNAME;
const dbPassword = process.env.DB_PASSWORD;
const dbName = process.env.DB_DATABASE_NAME;
//database connection
const dbconn = mysql.createConnection({
  host: dbHostName, 
  user: dbUserName, 
  password: dbPassword, 
  database: dbName
});
dbconn.connect((err) => {
  if (err) throw err;
  console.log('Connected to database!');
});
module.exports = dbconn; //or use export default router;