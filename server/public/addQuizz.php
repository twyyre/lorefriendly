<!DOCTYPE html>
<html lang="en">
<!-- INCLUDE HEAD ELEMENT -->
<?php require 'components/head.php'; ?>
<body>
    <!-- INCLUDE PARTICLE EFFECT CONTAINER -->
    <div id="particles-js"></div> 
    <!-- INCLUDE HEADER -->
    <?php require 'components/header.php'; ?>
    <main class="main slender">
        <h1 class="main-title">إنشاء كويز</h1>
        <!--input question and choices-->
        <div class="container rtl">
            <h3 class="edge centertxt">اضافة سؤال:</h3>
            <div class="question-group question-input">
                <div class="centered slender row">
                    <h4 class="">السؤال:</h4>
                    <div class="hor"></div>
                    <input type="text" class="question block" placeholder="ما هو سؤالك?"/>
                </div>
                <div class="ver"></div>
                <div class="container slender">
                    <button class="btn block bg-white" onclick="addChoice(this)">أضف خيار</button>
                    <div class="container choice-container choice-input"></div>
                </div>
                <div class="hor"></div>
                <button class="btn block bg-black" onclick="addQuestion(this)">أضف السؤال</button>
                
            </div>
        </div>
        <!--display questions and their choices-->
        <div class="container">
            <h3 class="edge centertxt rtl">الأسئلة المقدمة:</h3>
            <div class="submitted-question-group">
                <div class="question-group">
                    <button onclick="removeQuestion(this)">ازالة</button>
                    <p class="question">Question?</p>
                    <div class="container choice-container">
                        <p class="choice">choice</p>
                        <p class="choice">choice</p>
                        <p class="choice">choice</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit-quiz">
            <button class="btn block bg-black lgtxt">انشاء الكويز</button>
        </div>
    </main>
    <script src="js/js.js"></script>
    <!-- INCLUDE FOOTER -->
    <?php require 'components/footer.php'; ?>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./js/particles.js"></script>
</body>
</html>