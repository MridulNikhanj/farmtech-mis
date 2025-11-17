@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <!-- Hero Banner -->
    <div class="get-assist-hero mt-5 mb-6">
        <h1 class="get-assist-title">Get the Help You Need to Succeed</h1>
        <div class="get-assist-sub">Access expert advice, tools and insights to optimise your operational strategy</div>
    </div>

    <!-- New grid of 4 rectangles -->
    <div class="row mt-8 mb-6 gx-4 assistance-quick-links">
        <div class="col-md-6 mb-4">
            <a href="https://www.kisanmandi.com/" class="assist-rect" target="_blank">
                <div class="assist-bg" style="background-image:url('/assets/img/value1.jpg'); background-size:cover; background-position:center;">
                    <div class="assist-gradient"></div>
                    <div class="assist-content assist-content-bottom">
                        <span class="assist-title">Market Link</span>
                        <div class="assist-desc" style="color:#fff; font-size:1.2rem; font-weight:400; margin-top:0.7rem;">Access Better Markets for Your Produce<br>Maximize the value of your farm products by connecting directly with trusted buyers.</div>
                    </div>
                </div>
                <div class="assist-hover">
                    <div class="assist-hover-main">
                        <div class="assist-hover-title">Market Link</div>
                        <div class="assist-hover-desc">Access Better Markets for Your Produce<br>Maximize the value of your farm products by connecting directly with trusted buyers.</div>
                    </div>
                    <div class="assist-hover-arrow-green">&#8594;</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 mb-4">
            <a href="https://incomedrivercalculator.idhtrade.org/" class="assist-rect" target="_blank">
                <div class="assist-bg" style="background-image:url('/assets/img/value2.jpg'); background-size:cover; background-position:center;">
                    <div class="assist-gradient"></div>
                    <div class="assist-content assist-content-bottom">
                        <span class="assist-title">Income Driver Calculator</span>
                        <div class="assist-desc" style="color:#fff; font-size:1.2rem; font-weight:400; margin-top:0.7rem;">Calculate and compare household income to a benchmark. Model scenarios to close income gaps.</div>
                    </div>
                </div>
                <div class="assist-hover">
                    <div class="assist-hover-main">
                        <div class="assist-hover-title">Income Driver Calculator</div>
                        <div class="assist-hover-desc">Calculate and compare household income to a benchmark. Model scenarios to close income gaps.</div>
                    </div>
                    <div class="assist-hover-arrow-green">&#8594;</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 mb-4">
            <a href="https://www.soilhealth.dac.gov.in/home" class="assist-rect" target="_blank">
                <div class="assist-bg" style="background-image:url('/assets/img/value3.jpg'); background-size:cover; background-position:center;">
                    <div class="assist-gradient"></div>
                    <div class="assist-content assist-content-bottom">
                        <span class="assist-title">Know Your Soil, Grow Better</span>
                        <div class="assist-desc" style="color:#fff; font-size:1.2rem; font-weight:400; margin-top:0.7rem;">Healthy soil means a healthier harvest. Click here to check your soil health and get your Soil Health Card through the official government portal.</div>
                    </div>
                </div>
                <div class="assist-hover">
                    <div class="assist-hover-main">
                        <div class="assist-hover-title">Know Your Soil, Grow Better</div>
                        <div class="assist-hover-desc">Healthy soil means a healthier harvest. Click here to check your soil health and get your Soil Health Card through the official government portal.</div>
                    </div>
                    <div class="assist-hover-arrow-green">&#8594;</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 mb-4">
            <a href="https://farmfitinsightshub.org/business-modelling" class="assist-rect" target="_blank">
                <div class="assist-bg" style="background-image:url('/assets/img/value4.jpg'); background-size:cover; background-position:center;">
                    <div class="assist-gradient"></div>
                    <div class="assist-content assist-content-bottom">
                        <span class="assist-title">Business Modelling</span>
                        <div class="assist-desc" style="color:#fff; font-size:1.2rem; font-weight:400; margin-top:0.7rem;">Perform a quick analysis to quantify young business case and understand essential data for success.</div>
                    </div>
                </div>
                <div class="assist-hover">
                    <div class="assist-hover-main">
                        <div class="assist-hover-title">Business Modelling</div>
                        <div class="assist-hover-desc">Perform a quick analysis to quantify young business case and understand essential data for success.</div>
                    </div>
                    <div class="assist-hover-arrow-green">&#8594;</div>
                </div>
            </a>
        </div>
    </div>

    <!-- Find a Mitra Quick Help -->
    <div class="mb-6 mt-14 find-mitra-section">
        <h2 class="mitra-faq-title center mb-4 find-mitra-heading-spacer">Find a Mitra (Quick Help)</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="display-4 mb-2">💼</div>
                        <h5 class="card-title">Loan Application Rejected</h5>
                        <p class="card-text">Get help from a consultant for your agriculture loan application.</p>
                        <a href="https://www.google.com/search?q=agriculture+loan+consultant+near+me" target="_blank" class="btn btn-success w-100">Get Help Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="display-4 mb-2">📦</div>
                        <h5 class="card-title">Need Packaging Material</h5>
                        <p class="card-text">Find suppliers for organic and safe packaging material.</p>
                        <a href="https://www.google.com/search?q=organic+packaging+suppliers+near+me" target="_blank" class="btn btn-success w-100">Get Help Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="display-4 mb-2">🧪</div>
                        <h5 class="card-title">Soil Testing</h5>
                        <p class="card-text">Locate soil testing labs and get expert advice.</p>
                        <a href="https://www.google.com/search?q=soil+testing+labs+near+me" target="_blank" class="btn btn-success w-100 mb-2">Get Help Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="display-4 mb-2">🛠️</div>
                        <h5 class="card-title">Machine Repair</h5>
                        <p class="card-text">Find repair services for your farm machinery and equipment.</p>
                        <a href="https://www.google.com/search?q=tractor+repair+near+me" target="_blank" class="btn btn-success w-100">Get Help Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="mb-6 mt-14 faq-section-spacer faq-section-extra-space">
        <h2 class="mitra-faq-title mb-4 faq-heading-spacer">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1" style="background:#f2c043;color:#111;border-bottom:none;">
                        How do I check my PM-KISAN status?
                    </button>
                </h2>
                <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Visit <a href="https://pmkisan.gov.in/" target="_blank">pmkisan.gov.in</a> and enter your Aadhaar number.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2" style="background:#f2c043;color:#111;border-bottom:none;">
                        My crop has yellow spots – what to do?
                    </button>
                </h2>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Upload photos in the 'Field Issues' section for diagnosis by a KVK scientist.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3" style="background:#f2c043;color:#111;border-bottom:none;">
                        Where to get subsidy for drip irrigation?
                    </button>
                </h2>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Contact your state agriculture helpline or visit your district agriculture office.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4" style="background:#f2c043;color:#111;border-bottom:none;">
                        How to register as an FPO seller?
                    </button>
                </h2>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        See the step-by-step guide at <a href="https://enam.gov.in/" target="_blank">eNAM</a> or visit your district office.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5" style="background:#f2c043;color:#111;border-bottom:none;">
                        Why was my application rejected?
                    </button>
                </h2>
                <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Common reasons include incomplete documents, incorrect details, or missing eligibility. Check the document checklist and reapply.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.accordion-button:not(.collapsed) {
    color: #111;
    background-color: #f4cd69;
}
.accordion-button.collapsed {
    background-color: #f2c043;
    color: #111;
    border-bottom: none;
}
.accordion-item {
    background-color: #fffbe6;
    border: none;
    margin-bottom: 8px;
    border-radius: 12px;
    overflow: hidden;
}
.accordion-button:focus {
    box-shadow: 0 0 0 0.2rem rgba(38, 96, 95, 0.25);
}
.fixed-bottom {
    box-shadow: 0 -2px 8px rgba(38,96,95,0.08);
}
.assistance-quick-links {
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
}
.assist-rect {
    display: block;
    position: relative;
    border-radius: 32px;
    overflow: hidden;
    min-height: 340px;
    height: 340px;
    box-shadow: 0 2px 16px rgba(38,96,95,0.08);
    transition: box-shadow 0.22s, transform 0.22s;
    text-decoration: none;
}
.assist-bg {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background-size: cover;
    background-position: center;
    z-index: 1;
}
.assist-gradient {
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 60%;
    background: linear-gradient(90deg, rgba(0,0,0,0.7) 60%, rgba(0,0,0,0.0) 100%);
    z-index: 2;
}
.assist-content {
    position: absolute;
    left: 24px;
    bottom: 32px;
    z-index: 3;
}
.assist-content-bottom {
    top: unset;
    bottom: 32px;
}
.assist-title {
    color: #fff;
    font-size: 2.7rem;
    font-weight: 700;
    letter-spacing: 0.01em;
    text-shadow: 0 2px 8px rgba(0,0,0,0.18);
}
.assist-hover {
    position: absolute;
    inset: 0;
    background: #3cb371;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    padding: 32px 28px;
    opacity: 0;
    z-index: 4;
    transition: opacity 0.35s cubic-bezier(.77,0,.18,1);
}
.assist-hover-main {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
}
.assist-hover-title {
    color: #145c3a;
    font-size: 2.1rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}
.assist-hover-desc {
    color: #fff;
    font-size: 1.15rem;
    font-weight: 400;
    max-width: 340px;
    line-height: 1.5;
}
.assist-hover-arrow-green {
    font-size: 3.2rem;
    background: #145c3a;
    color: #fff;
    border-radius: 50%;
    width: 68px;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(20,92,58,0.13);
    position: absolute;
    left: 28px;
    bottom: 32px;
    margin: 0;
    line-height: 1;
    font-size: 2.6rem;
}
.assist-rect:hover {
    box-shadow: 0 8px 32px rgba(60,179,113,0.18);
    transform: translateY(-4px) scale(1.03);
}
.assist-rect:hover .assist-hover {
    opacity: 1;
}
.assist-rect:hover .assist-bg, .assist-rect:hover .assist-gradient, .assist-rect:hover .assist-content {
    opacity: 0;
}
@media (max-width: 900px) {
    .assist-title { font-size: 1.5rem; }
    .assist-hover-text { font-size: 1.2rem; }
    .assist-hover { padding: 18px 12px; }
    .assist-rect { min-height: 160px; height: 160px; }
}
.get-assist-hero {
    margin-top: 7rem;
    margin-bottom: 5rem;
    text-align: center;
}
.get-assist-title {
    color: #26605F;
    font-size: 3.2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    margin-top: 0;
}
.get-assist-sub {
    color: #444;
    font-size: 1.6rem;
    font-weight: 400;
    margin-left: 0;
    margin-bottom: 2.5rem;
}
/* Style for Mitra/FAQ headings to match Benefits */
.mitra-faq-title {
    color: #306d6b;
    font-size: 2.3rem;
    font-weight: 800;
    margin-bottom: 1.2rem;
}
.mitra-faq-title.center {
    text-align: center;
}
/* Spacing after FAQ section */
.faq-section-spacer {
    margin-bottom: 2.5rem !important;
}
/* Add extra space below Find a Mitra and above FAQ heading */
.find-mitra-section {
    margin-bottom: 5rem !important;
}
.faq-section-extra-space {
    padding-top: 0.5rem;
}
/* Add spacing between FAQ heading and accordions */
.faq-heading-spacer {
    margin-bottom: 2.2rem !important;
}
/* Add spacing above Find a Mitra heading (same as FAQ heading) */
.find-mitra-heading-spacer {
    padding-top: 1.2rem;
}
</style>
@endpush
@endsection 