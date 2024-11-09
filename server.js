const  express = require("express");
const app = express();

const anime = require('animejs'); //for animations
const { specs, swaggerUi } = require('./swagger.js');
const path = require("path");
app.use(express.urlencoded({extended: true})); //need this middleware to be able to access the body of forms
app.set("view engine", "ejs"); //need to specify this for views
app.use(express.static(path.join(__dirname, "public"))); //to serve static files
app.use(express.json()) //you can use body parsor or express.json() to be able to read post request body

const port = process.env.PORT || 3000;

//ROUTES
app.use('/quests', require('./routes/quests.js'));

app.get('/', (req, res) => {
    return res.status(200).send("Lorefriendly 0.1");
});
app.listen(port, (error) =>{
    //callback function when the server runs
    const qm = require("./models/questModel.js");
    console.log(qm);

    if(!error){
        console.log(`Server is Successfully Running, and App is listening on port  ${port}`);
    }
    else{
        console.log("Error occurred, server can't start:", error);
    }
});