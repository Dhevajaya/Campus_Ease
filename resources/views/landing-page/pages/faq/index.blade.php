@extends("landing-page.layouts.main")

@section("title","Faq")

@section("css")
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    .body {
    min-height: 120vh;
    font-family: 'Poppins', sans-serif;
    background: #efefef;
    display: flex;
    justify-content: center;
    }

    .container1 {
    position: relative;
    background: #fff;
    margin-top: 50px;
    margin-bottom: 30px;
    border-radius: 10px;
    filter: drop-shadow(0 0 10px
            rgba(0, 0, 0, 0.5));
    }

    .accordion {
    position: relative;
    width: 350px;
    margin-left: 40px;
    }

    .title1 {
    margin-top: 20px;
    font-size: 2rem;
    text-align: center;
    }

    .content-accordion {
    margin-top: 35px;
    margin-right: 50px;
    }

    .question-answer {
    width: 100%;
    border-bottom: 1px solid #e8e8e8;
    }

    .question {
    display: flex;
    justify-content: space-between;
    }

    .title-question {
    margin: 1.4rem 0rem;
    font-size: 1.2rem;
    font-weight: 500;
    color: #000;
    }

    .question-btn {
    font-size: 1.5rem;
    background: transparent;
    border-color: transparent;
    cursor: pointer;
    }

    .up-icon1 {
    display: none;
    }

    .answer {
    font-size: 1.2rem;
    line-height: 1.8;
    display: none;
    }

    .show-text .answer {
    display: block;
    }

    .show-text .up-icon1 {
    display: inline;
    }

    .show-text .down-icon {
    display: none;
    }

    @media screen and (min-width: 992px) {
    .accordion {
        height: 0;
        display: flex;
    }

    .content-accordion {
        margin-top: 85px;
    }

    .title1 {
        margin-top: 50px;
        font-size: 3rem;
    }
    }
</style>
@endsection

@section("preloader")
    @component("landing-page.components.preloader")
    @endcomponent
@endsection

@section("content")

<section class="hero-area">
    <div class="breadcrumbs-wrapper blue-dark-gradient">
        <div class="shape shape-one scene"><span data-depth="2"></span></div>
        <div class="shape shape-two scene"><span data-depth="3"></span></div>
        <div class="shape shape-three scene"><span data-depth="4"></span></div>
        <div class="shape shape-four scene"><span data-depth=".1"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-title-text text-center">
                        <h1 class="title">FAQ</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">FAQ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="contact-information-area pb-70 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="30">
                    @foreach ($table as $index => $row)
                    <div class="question-answer">
                        <div class="question">
                            <h3 class="title-question">
                                {{$row->questions}}
                            </h3>
                            <button class="question-btn">
                                <span class="up-icon1">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                                <span class="down-icon">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </button>
                        </div>
                        <div class="answer">
                            <p>{{$row->answer}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section("scrolltop")
    @component("landing-page.components.scrolltop")
    @endcomponent
@endsection

@section("script")
<script>
    const questions = document.querySelectorAll('.question-answer');

    questions.forEach(function(question) {
        const btn = question.querySelector('.question-btn');
        btn.addEventListener("click", function() {
            questions.forEach(function(item) {
                if (item !== question) {
                    item.classList.remove("show-text");
                }
            })
            question.classList.toggle("show-text");
        })
    })
</script>
@endsection

