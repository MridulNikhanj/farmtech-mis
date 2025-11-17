@extends('layouts.main')

@section('content')
<div class="get-trained-hero mb-5 mt-4">
    <h1 class="get-trained-title">Learn. Grow. Lead</h1>
    <div class="get-trained-sub">Grow Stronger with Training & Certifications</div>
</div>
<div class="row justify-content-center">
    @php
    $cards = [
        [
            'image' => asset('assets/img/gt1.jpg'),
            'title' => 'FSSAI Food Safety Training & Certification (FoSTaC)',
            'description' => 'Government-mandated food safety training for food business operators and SHGs. 16 courses at Basic, Advanced, and Special levels. Certification is perpetual.',
            'button' => 'Learn More & Register',
            'link' => 'https://fostac.fssai.gov.in/'
        ],
        [
            'image' => asset('assets/img/gt2.jpg'),
            'title' => 'SHG Capacity Building & Livelihood Training (NRLM)',
            'description' => 'Skill development, entrepreneurship, and food processing training for Self Help Groups under the National Rural Livelihoods Mission.',
            'button' => 'See Trainings',
            'link' => 'https://nrlm.gov.in/outerReportAction.do?methodName=showIndex#gsc.tab=0'
        ],
        [
            'image' => asset('assets/img/gt3.jpg'),
            'title' => 'Food Processing & Hygiene Workshops',
            'description' => 'Workshops on food processing, hygiene, and safety for agri-entrepreneurs and SHGs. Learn best practices and compliance.',
            'button' => 'Explore Workshops',
            'link' => 'https://www.ficsi.in/academy-of-food-safety-and-hygiene'
        ],
        [
            'image' => asset('assets/img/gt4.jpg'),
            'title' => 'Organic Farming & Certification',
            'description' => 'Get certified in organic farming. Learn about standards, certification process, and market access for organic produce.',
            'button' => 'Get Certified',
            'link' => 'https://www.indiafilings.com/learn/organic-farming-certification-in-india/'
        ],
        [
            'image' => asset('assets/img/gt5.jpg'),
            'title' => 'Digital Agriculture & Smart Farming',
            'description' => 'Adopt digital tools and smart farming techniques. Training on IoT, data-driven agriculture, and modern farm management.',
            'button' => 'Start Learning',
            'link' => 'https://www.edx.org/learn/agriculture/world-bank-group-e-learning-on-digital-agriculture'
        ],
        [
            'image' => asset('assets/img/gt6.jpg'),
            'title' => 'Financial Literacy for Farmers',
            'description' => 'Improve your financial skills. Learn about credit, savings, insurance, and financial planning for farmers.',
            'button' => 'Learn Finance',
            'link' => 'https://www.rfilc.org/learning/financial-education-for-farmers/'
        ],
    ];
    @endphp
    @foreach($cards as $card)
    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
        <div class="card h-100 shadow-sm training-card">
            <img src="{{ $card['image'] }}" class="card-img-top" alt="{{ $card['title'] }}" style="height:180px; object-fit:cover; background:#f8f9fa;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $card['title'] }}</h5>
                <p class="card-text">{{ $card['description'] }}</p>
                <a href="{{ $card['link'] }}" target="_blank" class="btn btn-success mt-auto">{{ $card['button'] }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Benefits Section -->
<div class="container my-5">
    <h2 class="get-trained-title text-center mb-5">Benefits</h2>
    <div class="row align-items-center mb-5 benefit-row">
        <div class="col-md-5 text-center mb-3 mb-md-0">
            <img src="{{ asset('assets/img/benefit1.jpg') }}" alt="Benefit 1" class="img-fluid benefit-img rounded-4" style="max-height:200px;">
        </div>
        <div class="col-md-7">
            <h4 class="fw-bold mb-2" style="color:#21915C;">Expert-Led Training</h4>
            <p class="mb-0 benefit-desc">Learn directly from industry experts and certified trainers. Our programs ensure you gain practical, up-to-date skills for real-world success in agriculture and food processing.</p>
        </div>
    </div>
    <div class="row align-items-center flex-md-row-reverse mb-5 benefit-row">
        <div class="col-md-5 text-center mb-3 mb-md-0">
            <img src="{{ asset('assets/img/benefit2.jpg') }}" alt="Benefit 2" class="img-fluid benefit-img rounded-4" style="max-height:200px;">
        </div>
        <div class="col-md-7">
            <h4 class="fw-bold mb-2" style="color:#21915C;">Certification & Recognition</h4>
            <p class="mb-0 benefit-desc">Receive recognized certificates upon completion, boosting your credibility and employability. Stand out in the job market or grow your agri-business with certified skills.</p>
        </div>
    </div>
    <div class="row align-items-center mb-5 benefit-row">
        <div class="col-md-5 text-center mb-3 mb-md-0">
            <img src="{{ asset('assets/img/benefit3.jpg') }}" alt="Benefit 3" class="img-fluid benefit-img rounded-4" style="max-height:200px;">
        </div>
        <div class="col-md-7">
            <h4 class="fw-bold mb-2" style="color:#21915C;">Hands-On Experience</h4>
            <p class="mb-0 benefit-desc">Participate in practical workshops and live demonstrations. Get hands-on experience with the latest tools, techniques, and technologies in agriculture and food safety.</p>
        </div>
    </div>
    <div class="row align-items-center flex-md-row-reverse mb-4 benefit-row">
        <div class="col-md-5 text-center mb-3 mb-md-0">
            <img src="{{ asset('assets/img/benefit4.jpg') }}" alt="Benefit 4" class="img-fluid benefit-img rounded-4" style="max-height:200px;">
        </div>
        <div class="col-md-7">
            <h4 class="fw-bold mb-2" style="color:#21915C;">Community & Networking</h4>
            <p class="mb-0 benefit-desc">Connect with fellow learners, trainers, and industry professionals. Build a strong network to share knowledge, find opportunities, and grow together in the agri-sector.</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.training-card {
    border-radius: 20px;
    border: 1.5px solid #e3e8ee;
    background: #f9fafb;
    box-shadow: 0 2px 8px rgba(38,96,95,0.07);
    transition: box-shadow 0.25s, transform 0.22s, border-color 0.22s;
    overflow: hidden;
    padding-bottom: 0.5rem;
    max-width: 510px;
    min-width: 390px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 1.5rem;
    margin-top: 0.5rem;
    display: flex;
    flex-direction: column;
    height: 290px;
}
.training-card:hover {
    box-shadow: 0 12px 32px rgba(38,96,95,0.18), 0 1.5px 8px rgba(38,96,95,0.10);
    transform: scale(1.045);
    border-color: #b2d8d8;
    background: #f4fefd;
    z-index: 2;
}
.card-img-top {
    background: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 180px;
    width: 100%;
    object-fit: cover;
    padding: 0;
    display: block;
}
.card-title {
    color: #26605f;
    font-weight: 700;
    font-size: 1.08rem;
    min-height: 40px;
    margin-bottom: 0.2rem;
}
.card-text {
    color: #444;
    font-size: 0.95rem;
    flex-grow: 1;
    margin-bottom: 0.5rem;
}
.btn-success {
    background-color: #26605f;
    border-color: #26605f;
    font-weight: 600;
    border-radius: 8px;
    font-size: 0.98rem;
    letter-spacing: 0.01em;
    box-shadow: 0 2px 8px rgba(38,96,95,0.08);
    transition: background 0.18s, border 0.18s, box-shadow 0.18s;
    width: 90%;
    min-width: 180px;
    max-width: 220px;
    margin-left: auto;
    margin-right: auto;
    padding: 0.45rem 0.5rem;
    display: block;
    white-space: nowrap;
}
.btn-success:hover {
    background-color: #21915C;
    border-color: #21915C;
    box-shadow: 0 4px 16px rgba(33,145,92,0.13);
    transform: scale(1.07);
}
.row.justify-content-center {
    row-gap: 2.2rem;
    column-gap: 2.5rem;
}
@media (max-width: 991.98px) {
    .col-lg-4 { flex: 0 0 50%; max-width: 50%; }
}
@media (max-width: 767.98px) {
    .col-lg-4, .col-md-6 { flex: 0 0 100%; max-width: 100%; }
    .training-card { max-width: 98vw; min-width: 0; height: auto; }
}
.benefit-row {
    background: #f7fced;
    border-radius: 18px;
    box-shadow: 0 2px 12px rgba(38,96,95,0.07);
    padding: 2.2rem 1.2rem 2.2rem 1.2rem;
    margin-bottom: 2.5rem;
}
.benefit-img {
    box-shadow: 0 2px 12px rgba(38,96,95,0.10), 0 0 24px 6px #ffe066;
    background: #fff;
    padding: 1.2rem;
}
.benefit-row h4 {
    font-size: 2rem;
    color: #21915C;
    font-weight: 700;
    margin-bottom: 0.7rem;
}
.benefit-desc {
    font-size: 1.18rem;
    color: #444;
    line-height: 1.6;
}
@media (max-width: 767.98px) {
    .benefit-row { padding: 1.2rem 0.5rem; }
    .benefit-img { max-width: 120px; }
}
.get-trained-hero {
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
    text-align: center;
}
.get-trained-title {
    color: #26605F;
    font-size: 3.2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    margin-left: 0;
}
.get-trained-sub {
    color: #444;
    font-size: 1.6rem;
    font-weight: 400;
    margin-left: 0;
    margin-bottom: 0.5rem;
}
</style>
@endpush 