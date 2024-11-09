const express = require('express');
const { exit } = require('process');
const router = express.Router()
const dbconn = require("../core/dbcon.js");
const jwt = require('jsonwebtoken');
const { error } = require('console');

/**
 * @swagger
 * /users/all:
 *   get:
 *     tags:
 *      - Users
 *     summary: Returns a list of all users
 *     responses:
 *       200:
 *         description: A successful response
*/
router.get('/all', authToken, (req, res) => {
    res.status(200).send('list of all users');
});
/**
* @swagger
* /users/signup:
*   post:
*     tags:
*      - Users
*     summary: Signs up the user with the data provided
*     responses:
*       200:
*         description: A successful response
*/
router.post('/signup', (req, res) => { //returns the signup view

    const qUserName = req.body.username;
    const qPassword = req.body.password;
    const qEmail = req.body.email;
    const qMobile = req.body.mobile;

    if(!authUsername(qUserName)){return res.json({message: "username not provided."});}
    if(!authPassword(qPassword)){return res.json({message: "password not provided."});}
    if(!authEmail(qEmail)){}
    if(!authMobile(qMobile)){return res.json({message: "mobile not provided."});}

    return new Promise((resolve, reject) => {     
        var _query = `INSERT INTO users (username, password, email, mobile) VALUES (?, ?, ?, ?);`;
        dbconn.query(_query, [qUserName, qPassword, qEmail, qMobile], (err, results, fields) => {
            if (err) {
                if(err.errno===1062){   
                    return res.json({message: "user already exists."});
                }
                else{
                    throw err;
                }
            }
            return res.json({message: "user created successfully."});
        });
    })

    res.status(200).json({_query});
});
/**
* @swagger
* /users/login:
*   post:
*     tags:
*      - Users
*     summary: logs a user in if the username exists and the password is correct
*     responses:
*       200:
*         description: A successful response
*/
router.post('/login', (req, res) => { //returns the login view
    
    const qUserName = req.body.username;
    const qPassword = req.body.password;

    if(!qUserName){return res.json({message: "username not provided.", token: "0"});}
    if(!qPassword){return res.json({message: "password not provided.", token: "0"});}

    var _query = `SELECT * FROM users WHERE username='${qUserName}';`;

    return new Promise((resolve, reject) => {     
        dbconn.query(_query, (err, results, fields) => {
            if (err) throw err;
            console.log(`retrieved (${results.length}) records.`);
            if(results.length==1){
                const row = results[0];
                dbUserName = row.username;
                dbPassword = row.password;
                
                if(dbUserName==qUserName){//an explicit check for username equality even so the db query did the checking first
                    if(dbPassword==qPassword){
                        const payload = {
                            "username": dbUserName
                        };
                        const accessToken = jwt.sign(payload, process.env.ACCESS_TOKEN_SECRET);
                        return res.json({message: "user logged in successfully.", token: accessToken});
                    } else{
                        message = "wrong password.";
                        return res.json({message, token: "", dbPassword: dbPassword, qPassword: qPassword});
                    }
                } else{
                    message = "user not found.";
                    return res.json({message, token: "0"});
                }
            } else{
                message = "user not found.";
                return res.json({message, token: "0"});
            }
        });
    })
});
router.get('/add', (req, res) => { //adds the user
    res.render('users/add');
});
router.get('/signin', (req, res) => { //sings in the user

    // const qUserName = req.query.username;
    // const qPassword = req.query.password;
    // console.log("parameters:", req.query);
    // var _query = `SELECT * FROM users WHERE username='${qUserName}';`;

    // let result = {};
    // return new Promise((resolve, reject) => {     
    //     dbconn.query(_query, (err, results, fields) => {
    //         if (err) throw err;
    //         console.log(`retrieved (${results.length}) records.`);
    //         if(results.length==1){
    //             const dbPassword = results[0];
    //             if(dbPassword==qPassword){
    //                 result["message"] = "logged in!";
    //             } else{
    //                 result["message"] = "wrong password.";
    //             }
    //         } else{
    //             result["message"] = "user not found.";
    //         }
    //     });
    // })
    // .then(result =>{
    //     res.json(result);
    // })
});

// router.route('/:id')
// .get((req, res) => {
//     response = "get specific user"
//     userId = req.user;

//     if(userId){
//         response = userId;
//     }

//     res.send(response);
// })
// .put((req, res) => {
//     response = "get specific user"
//     userId = req.query.id;

//     if(userId){
//         response = `get user (${userId})`;
//     }

//     res.send(response);
// })
// .delete((req, res) => {
//     response = "get specific user"
//     userId = req.query.id;

//     if(userId){
//         response = `get user (${userId})`;
//     }

//     res.send(response);
// })

function authToken(req, res, next){
    console.log("api hit");
    console.log(req.user);
    const authHeader = req.headers['authorization'];
    const token = authHeader && authHeader.split(' ')[1];
    console.log("token:", token)
    if(!token){
        console.log("token is not valid")
        return res.status(401).send("token is not valid");
    } else{
       try{
            const payload = jwt.verify(token, process.env.ACCESS_TOKEN_SECRET);
            console.log({"payload": payload});
        }
        catch(error){
            return res.json({message: "Unauthorized."});
        }
        next(); 
    }
    
}
function authUsername(_username){
    const usernameRegex = /^[a-zA-Z0-9_]+$/;
    if(usernameRegex.test(_username)){
        return true;
    } else{
        return false;
    }
}
function authPassword(_password) {
    return true;
}
function authEmail(_email){
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(emailRegex.test(_email)){
        return true;
    } else{
        return false;
    }
}
function authMobile(_mobile){
    return true;
}
// router.param("username", (req, res, next, id)=>{
//     const users = [{"name":"Ayoub"}, {"name":"Mohammed"}]
//     req.user = users[id];
//     console.log("this is a middleware function")
//     next();
// }); //runs a function when the specified paramter is detected. This function is a type of middleware

module.exports = router; //or use export default router;