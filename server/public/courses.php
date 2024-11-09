<!DOCTYPE html>
<html lang="en">
<!-- INCLUDE HEAD ELEMENT -->
<?php require 'components/head.php'; ?>
<body>
    <!-- INCLUDE PARTICLE EFFECT CONTAINER -->
    <div id="particles-js"></div> 
    <!-- INCLUDE HEADER -->
    <?php require 'components/header.php'; ?>
    <div class="ver-2"></div>
    <main class="main">
        <div class="container">
            <h1 class="main-title centertxt bg-black edge" onclick="toggleContainer(this)">الدورات</h1>
            <div class="card-group">
                <div class="card">
                    <a href="courseArticle.php?id=1">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/6.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=2">
                        <div class="card-title">دورة أساسيات البرمجة في php</div>
                        <div class="card-img"><img src="images/courses/1.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=3">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/2.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=4">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/3.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=5">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/7.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=6">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/8.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=7">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/9.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=8">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/10.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=9">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/11.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=10">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/12.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=11">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/13.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <script>
        function toggleContainer(elm){
            const elm = elm.nextElementSibling;
            if(elm.style.visibility === "hidden"){
                elm.style.visibility = "true";
            } else{
                elm.style.visibility = "true";
            }
        }
    </script>
    <!-- INCLUDE FOOTER -->
    <?php require 'components/footer.php'; ?>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./js/particles.js"></script>
</body>
</html>