const container = document.querySelector('div.choice-input');
const submittedQuestionGroup = document.querySelector('div.submitted-question-group');

function submitQuestions(elm){
    
}
function addQuestion(elm){
    try{
        const questionGroup = elm.parentNode;
        const questionElm = questionGroup.querySelector("input.question");
        const choiceGroup = questionGroup.querySelector("div.choice-input");
        const choices = choiceGroup.querySelectorAll("input.choice");

        var newQuestionGroup = `<div class="question-group"><button onclick="removeQuestion(this)">remove</button><p class="question">${questionElm.value}</p><div class="container choice-container"></div>`;
        submittedQuestionGroup.innerHTML += newQuestionGroup;

        QuestionGroupContainer = submittedQuestionGroup.querySelectorAll("div.question-group");
        newQuestionGroup = QuestionGroupContainer[QuestionGroupContainer.length-1]
        alert(submittedQuestionGroup)
        var choiceList = newQuestionGroup.querySelector("div.choice-container");

        choices.forEach(choice => {
            choiceElm = `<p class="choice">${choice.value}</p>`;
            choiceList.innerHTML += choiceElm;
        });

    }
    catch(error){
        document.querySelector("body").innerHTML = error;
    }
}
function removeQuestion(elm){
    submittedQuestionGroup.removeChild(elm.parentNode);
}
function addChoice(elm){
    const elm2 = `<div class="container choice slender row">
        <input type="text" name="choice" class="choice block" onclick=""/>
        <div class="btn toggle-box" onclick="toggleBox(this)"></div>
        <button class="btn block qwidth" onclick="removeChoice(this)">remove</button>
    </div>`;
    try{
        var element = elm.parentNode.querySelector('.choice-input');
        element.innerHTML += elm2;
    }
    catch(error){
        document.querySelector('body').innerHTML = error;
    }
}
function removeChoice(elm){
    elm.parentNode.parentNode.removeChild(elm.parentNode);
}
function sendReq(elm){
    try{
    elm.innerHTML = "sent"
    fetch("https://isterlab.com/test.php")
    .then((response) => response.json())
    .then((json) => elm.innerHTML = JSON.stringify(json));
    }
    catch(error){
    elm.innerHTML = error;
    }
}
let toggled = false;
function toggleBox(elm){
    if(toggled){
        elm.style.backgroundColor = 'lime';
    } else{
        elm.style.backgroundColor = 'red';
    }
    toggled = !toggled;
    console.log("toggled:", toggled)
}
function sendMail(){ //gemini func

    const nodemailer = require('nodemailer');

    const transporter = nodemailer.createTransport({
        host: 'smtp.example.com',
        port: 587,
        secure: false, // true for 465, false for other ports
        auth: {
            user: 'your_email@example.com',
            pass: 'your_password'
        }
    });

    const mailOptions = {
        from: 'your_email@example.com',
        to: 'recipient_email@example.com',
        subject: 'Sending Email with Node.js',
        text: 'This is a test email sent using Node.js.'
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.log(error);
        } else {
            console.log('Email sent: ' + info.response);
        }
    });
}

