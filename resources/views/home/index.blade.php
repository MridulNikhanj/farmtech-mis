@extends('layouts.main')

@section('content')
<div class="slider-container">
    <div class="slider">
        <div class="slide active" style="background-image: url('/assets/img/slider1.jpg');">
            <div class="slide-content">
                <h1>Welcome to FarmTech MIS</h1>
                <p>A comprehensive platform where farmers, FPOs, and community groups come together to upskill, collaborate, and drive value addition in agriculture.</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('/assets/img/slider2.jpg');">
            <div class="slide-content">
                <h1>Empowering Women-Led Agri Groups</h1>
                <p>Reaching the Unreached... Empowering Women-led organizations, SHGs/FPCs for greater productivity and innovation.</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('/assets/img/slider3.jpg');">
            <div class="slide-content">
                <h1>Elevate Your Skills With Tech</h1>
                <p>Refine your skills, upskill yoursef and build operational excellence in Agri space....</p>
            </div>
        </div>
    </div>
    <div class="slider-nav">
        <span class="prev">&#10094;</span>
        <span class="next">&#10095;</span>
    </div>
</div>

<!-- New Info Section -->
<div class="info-section container-fluid py-5">
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
            <h2 class="info-heading">Strengthening Rural Communities<br>Through Technology</h2>
            <p class="info-text">Self-Help Groups (SHGs) and Farmer Producer Organizations (FPOs) play a vital role in empowering farmers and rural communities. However, many still lack access to modern tools and knowledge that can transform their potential into sustainable growth. FarmTech MIS bridges this gap by bringing technology-driven solutions to the heart of farming communities — enabling better collaboration, skill enhancement, value addition, and access to government schemes. Together, we aim to build a stronger, self-reliant agricultural ecosystem..</p>
        </div>
        <div class="col-lg-5 col-md-8 text-center">
            <img src="/assets/img/info1.jpg" alt="Info" class="info-img img-fluid" />
        </div>
    </div>
</div>

<!-- Dashboard Section -->
<div class="dashboard-section">
    <div class="dashboard-title">
        <span class="dashboard-bar"></span>
        <span>Progress Highlights</span>
    </div>
    <div class="dashboard-grid">
        <div class="dashboard-card card-blue">
            <div class="dashboard-main-row"><div class="dashboard-icon">#</div><div class="dashboard-main">102,920,576</div></div>
            <div class="dashboard-desc">Households mobilized into SHGs</div>
        </div>
        <div class="dashboard-card card-teal">
            <div class="dashboard-main-row"><div class="dashboard-icon">#</div><div class="dashboard-main">9,175,483</div></div>
            <div class="dashboard-desc">SHGs promoted</div>
        </div>
        <div class="dashboard-card card-red">
            <div class="dashboard-main-row"><div class="dashboard-icon">#</div><div class="dashboard-main">17,375,870</div></div>
            <div class="dashboard-desc">Village Organizations promoted</div>
        </div>
        <div class="dashboard-card card-green">
            <div class="dashboard-main-row"><div class="dashboard-icon">#</div><div class="dashboard-main">5,385,671</div></div>
            <div class="dashboard-desc">Number of SHGs provided Revolving Fund</div>
        </div>
        <div class="dashboard-card card-purple">
            <div class="dashboard-main-row"><div class="dashboard-icon">₹</div><div class="dashboard-main">844,305.3</div></div>
            <div class="dashboard-desc">Amount of Revolving Fund disbursed to SHGs <span class="dashboard-small">(in Lakh)</span></div>
        </div>
        <div class="dashboard-card card-orange">
            <div class="dashboard-main-row"><div class="dashboard-icon">#</div><div class="dashboard-main">39,238,865</div></div>
            <div class="dashboard-desc">Number of SHGs provided Community Investment Fund (CIF)</div>
        </div>
        <div class="dashboard-card card-pink">
            <div class="dashboard-main-row"><div class="dashboard-icon">₹</div><div class="dashboard-main">2,854,853.4</div></div>
            <div class="dashboard-desc">Amount of Community Investment Fund disbursed to SHGs <span class="dashboard-small">(in Lakh)</span></div>
        </div>
        <div class="dashboard-card card-violet">
            <div class="dashboard-main-row"><div class="dashboard-icon">#</div><div class="dashboard-main">15,037,928</div></div>
            <div class="dashboard-desc">Community Resource Persons developed</div>
        </div>
    </div>
</div>

<!-- India Map Section -->
<div class="india-map-section">
    <h2 class="india-map-title">Explore SHGs by State</h2>
    <!--
    <div id="india-map"></div>
    -->
    <div class="india-map-img-wrapper">
        <img src="/assets/img/map.jpg" alt="State wise Self Help Groups in India" class="india-map-img" />
    </div>
</div>
@endsection

@push('styles')
<style>
.slider-container {
    position: relative;
    width: 100vw;
    height: calc(100vh - 60px);
    min-height: 400px;
    overflow: hidden;
    margin: 0;
    left: 50%;
    right: 50%;
    transform: translateX(-50%);
}
.slider {
    width: 100%;
    height: 100%;
    position: relative;
}
.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 1s ease;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
.slide.active {
    opacity: 1;
    z-index: 2;
}
.slide-content {
    background: rgba(0,0,0,0.35);
    color: #fff;
    padding: 2.5rem 3.5rem;
    border-radius: 18px;
    text-align: center;
    max-width: 700px;
    margin: auto;
    box-shadow: 0 4px 32px rgba(0,0,0,0.18);
}
.slide-content h1 {
    font-size: 3.2rem;
    font-weight: 700;
    margin-bottom: 1.2rem;
    line-height: 1.1;
}
.slide-content p {
    font-size: 1.5rem;
    font-weight: 400;
    margin-bottom: 0;
}
.slider-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
    z-index: 10;
    pointer-events: none;
}
.slider-nav span {
    font-size: 2.5rem;
    color: #fff;
    background: rgba(0,0,0,0.3);
    border-radius: 50%;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    pointer-events: auto;
    user-select: none;
    transition: background 0.2s;
}
.slider-nav span:hover {
    background: rgba(0,0,0,0.6);
}
@media (max-width: 900px) {
    .slide-content h1 { font-size: 2.1rem; }
    .slide-content { padding: 1.2rem 1.5rem; }
}
@media (max-width: 600px) {
    .slider-container { height: 320px; }
    .slide-content h1 { font-size: 1.2rem; }
    .slide-content p { font-size: 1rem; }
    .slide-content { padding: 0.7rem 0.5rem; }
}

/* Dashboard styles */
.dashboard-section {
    background: #f7eaff;
    padding: 0 0 2.5rem 0;
    margin-top: 0;
}
.dashboard-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #222;
    padding: 1.2rem 2.5rem 0.5rem 2.5rem;
    display: flex;
    align-items: center;
    gap: 1.2rem;
}
.dashboard-bar {
    width: 8px;
    height: 2.5rem;
    background: #8000ff;
    border-radius: 4px;
    display: inline-block;
}
.dashboard-sub {
    font-size: 1.2rem;
    font-weight: 400;
    color: #444;
}
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 1.5rem;
    padding: 1.5rem 2.5rem 0 2.5rem;
    max-width: 1800px;
    margin: 0 auto;
}
.dashboard-card {
    border-radius: 12px;
    color: #fff;
    padding: 1.1rem 1.5rem 0.75rem 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    box-shadow: 0 2px 16px rgba(0,0,0,0.08);
    min-width: 0;
    min-height: 70px;
    position: relative;
    overflow: hidden;
}
.dashboard-main-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    width: 100%;
    flex-shrink: 0;
}
.dashboard-icon {
    width: 44px;
    height: 44px;
    background: #fff;
    color: #222;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    flex-shrink: 0;
}
.dashboard-main {
    font-size: 1.7rem;
    font-weight: 700;
    margin-bottom: 0;
    letter-spacing: 1px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.dashboard-desc {
    font-size: 1.05rem;
    font-weight: 400;
    color: #f3f3f3;
    margin-top: 0.4rem;
    word-break: break-word;
}
.dashboard-small {
    font-size: 0.95rem;
    color: #e0e0e0;
}
.card-blue { background: #3b3b8f; }
.card-teal { background: #1b7c7c; }
.card-red { background: #a13b3b; }
.card-green { background: #18803b; }
.card-purple { background: #5a2d82; }
.card-orange { background: #a15a1b; }
.card-pink { background: #a13b6b; }
.card-violet { background: #4b2d82; }
@media (max-width: 1200px) {
    .dashboard-grid { grid-template-columns: 1fr 1fr; grid-template-rows: repeat(4, 1fr); }
}
@media (max-width: 700px) {
    .dashboard-title { font-size: 1.3rem; padding: 1rem 0.7rem 0.5rem 0.7rem; }
    .dashboard-grid { grid-template-columns: 1fr; grid-template-rows: repeat(8, 1fr); padding: 1rem 0.7rem 0 0.7rem; }
    .dashboard-card { padding: 1.2rem 0.7rem 1rem 0.7rem; }
}

.india-map-section {
    background: #fff;
    padding: 2.5rem 0 3rem 0;
    text-align: center;
}
.india-map-title {
    font-size: 2rem;
    font-weight: 700;
    color: #26605f;
    margin-bottom: 1.5rem;
}
.india-map-img-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: 0 auto;
    padding: 1.5rem 0 0 0;
}
.india-map-img {
    max-width: 98vw;
    width: 100%;
    height: auto;
    max-height: 700px;
    border-radius: 18px;
    box-shadow: 0 2px 16px rgba(0,0,0,0.08);
    object-fit: contain;
}
.info-section {
    margin-top: 0;
    margin-bottom: 2.5rem;
    background: #f8f8f8;
    border-radius: 0 0 32px 32px;
    padding-left: 3rem;
    padding-right: 3rem;
}
.info-heading {
    color: #26605F;
    font-size: 2.3rem;
    font-weight: 800;
    margin-bottom: 1.2rem;
}
.info-text {
    color: #333;
    font-size: 1.18rem;
    font-weight: 400;
    line-height: 1.7;
}
.info-img {
    border-radius: 2rem;
    box-shadow: 0 4px 24px rgba(38,96,95,0.10);
    max-width: 100%;
    height: auto;
}
@media (max-width: 900px) {
    .info-section { border-radius: 0 0 18px 18px; padding-left: 1rem; padding-right: 1rem; }
    .info-heading { font-size: 1.5rem; }
    .info-text { font-size: 1rem; }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    const prev = document.querySelector('.slider-nav .prev');
    const next = document.querySelector('.slider-nav .next');
    let current = 0;
    let timer;

    function showSlide(idx) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === idx);
        });
        current = idx;
    }

    function nextSlide() {
        showSlide((current + 1) % slides.length);
    }

    function prevSlide() {
        showSlide((current - 1 + slides.length) % slides.length);
    }

    function startAutoSlide() {
        timer = setInterval(nextSlide, 5000);
    }

    function stopAutoSlide() {
        clearInterval(timer);
    }

    prev.addEventListener('click', function() {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
    });
    next.addEventListener('click', function() {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
    });

    showSlide(0);
    startAutoSlide();
});
</script>
@endpush

<!-- Dialogflow Chatbot Integration -->
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  chat-icon="https://symbl-world.akamaized.net/i/webp/a6/969a17f9745a2459549e226d330545.webp"
  intent="WELCOME"
  chat-title="FarmTechBot"
  agent-id="a8f918a1-9562-4bf3-bcc0-75de29d21857"
  language-code="en"
></df-messenger> 