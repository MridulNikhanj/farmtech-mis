<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetTrainedController extends Controller
{
    public function index()
    {
        $cards = [
            [
                'title' => 'FSSAI Food Safety Training & Certification (FoSTaC)',
                'description' => 'Government-mandated food safety training for food business operators and SHGs. 16 courses at Basic, Advanced, and Special levels. Certification is perpetual.',
                'image' => 'https://www.fssai.gov.in/assets/images/fssai_logo.png',
                'link' => 'https://fostac.fssai.gov.in/',
                'button' => 'Learn More & Register'
            ],
            [
                'title' => 'SHG Capacity Building & Livelihood Training (NRLM)',
                'description' => 'Skill development, entrepreneurship, and food processing training for Self Help Groups under the National Rural Livelihoods Mission.',
                'image' => 'https://nrlm.gov.in/images/nrlm_logo.png',
                'link' => 'https://nrlm.gov.in/',
                'button' => 'See Trainings'
            ],
            [
                'title' => 'Food Processing & Hygiene Workshops',
                'description' => 'Hands-on workshops for SHGs and farmers on food processing, packaging, and hygiene, often organized by FSSAI, state governments, and NGOs.',
                'image' => 'https://www.fssai.gov.in/upload/uploadfiles/files/FoSTaC_Training.jpg',
                'link' => 'https://fostac.fssai.gov.in/',
                'button' => 'Upcoming Workshops'
            ],
            [
                'title' => 'Organic Farming & Certification',
                'description' => 'Workshops and certification programs for organic farming practices, including soil health, pest management, and organic inputs.',
                'image' => 'https://www.apeda.gov.in/apedawebsite/images/organic/organic_logo.png',
                'link' => 'https://www.apeda.gov.in/apedawebsite/organic/Organic_Products.htm',
                'button' => 'Explore Organic Training'
            ],
            [
                'title' => 'Digital Agriculture & Smart Farming',
                'description' => 'Training on digital tools, mobile apps, IoT, and smart farming technologies for modern agriculture.',
                'image' => 'https://www.digitalagriculture.net/wp-content/uploads/2020/09/digital-agriculture.jpg',
                'link' => 'https://www.digitalagriculture.net/',
                'button' => 'Join Digital Training'
            ],
            [
                'title' => 'Financial Literacy for Farmers',
                'description' => 'Sessions on credit, insurance, government schemes, and financial planning for farmers and SHGs.',
                'image' => 'https://www.nabard.org/auth/writereaddata/Images/Financial-Inclusion.jpg',
                'link' => 'https://www.nabard.org/',
                'button' => 'Learn Financial Skills'
            ]
        ];
        return view('get-trained.index', compact('cards'));
    }
} 