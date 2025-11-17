<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scheme;

class SchemeSeeder extends Seeder
{
    public function run(): void
    {
        $schemes = [
            [
                'name' => 'PM-KISAN',
                'eligibility' => 'Small and marginal farmers with less than 2 hectares of landholding',
                'benefits' => '₹6,000 per year in three equal installments',
                'deadline' => '2024-12-31',
                'category' => 'Direct Benefit Transfer',
                'state' => 'All India',
                'apply_link' => 'https://pmkisan.gov.in',
                'documents' => 'Aadhaar Card, Land Records, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'PM Surya Ghar Muft Bijli Yojana',
                'eligibility' => 'Domestic households with valid electricity connection and rooftop space',
                'benefits' => 'Subsidy up to ₹78,000 for solar panel installation, 300 units free electricity monthly',
                'deadline' => '2024-12-31',
                'category' => 'Solar Energy',
                'state' => 'All India',
                'apply_link' => 'https://pmsuryaghar.gov.in',
                'documents' => 'Electricity Bill, Aadhaar Card, Property Documents',
                'is_trending' => true
            ],
            [
                'name' => 'National Mission on Natural Farming',
                'eligibility' => 'All farmers interested in natural farming practices',
                'benefits' => 'Financial assistance and training for natural farming methods',
                'deadline' => '2024-12-31',
                'category' => 'Sustainable Agriculture',
                'state' => 'All India',
                'apply_link' => 'https://naturalfarming.gov.in',
                'documents' => 'Aadhaar Card, Land Records, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'Clean Plant Programme',
                'eligibility' => 'Farmers engaged in horticulture',
                'benefits' => 'Disease-free planting material and climate resilient varieties',
                'deadline' => '2024-12-31',
                'category' => 'Horticulture',
                'state' => 'All India',
                'apply_link' => 'https://agriculture.gov.in',
                'documents' => 'Farmer ID, Land Records, Bank Account Details',
                'is_trending' => false
            ],
            [
                'name' => 'Digital Agriculture Mission',
                'eligibility' => 'All farmers with digital literacy',
                'benefits' => 'Access to digital agriculture infrastructure and services',
                'deadline' => '2024-12-31',
                'category' => 'Technology',
                'state' => 'All India',
                'apply_link' => 'https://digitalagriculture.gov.in',
                'documents' => 'Aadhaar Card, Mobile Number, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'Agriculture Infrastructure Fund',
                'eligibility' => 'Farmers, FPOs, PACS, Marketing Cooperative Societies',
                'benefits' => 'Financial support for agriculture infrastructure projects',
                'deadline' => '2024-12-31',
                'category' => 'Infrastructure',
                'state' => 'All India',
                'apply_link' => 'https://agriinfra.dac.gov.in',
                'documents' => 'Project Proposal, Bank Account, Organization Registration',
                'is_trending' => false
            ],
            [
                'name' => 'National Mission on Edible Oils',
                'eligibility' => 'Farmers willing to cultivate oilseeds',
                'benefits' => 'Financial assistance and technical support for oilseed cultivation',
                'deadline' => '2024-12-31',
                'category' => 'Crop Specific',
                'state' => 'All India',
                'apply_link' => 'https://nmeo.dac.gov.in',
                'documents' => 'Land Records, Bank Account, Aadhaar Card',
                'is_trending' => true
            ],
            [
                'name' => 'Soil Health Card Scheme',
                'eligibility' => 'All farmers',
                'benefits' => 'Free soil testing and recommendations for nutrients and fertilizers',
                'deadline' => 'Ongoing',
                'category' => 'Technical Support',
                'state' => 'All India',
                'apply_link' => 'https://soilhealth.dac.gov.in',
                'documents' => 'Aadhaar Card, Land Records',
                'is_trending' => false
            ],
            [
                'name' => 'Pradhan Mantri Fasal Bima Yojana',
                'eligibility' => 'All farmers including sharecroppers and tenant farmers',
                'benefits' => 'Crop insurance coverage and financial support',
                'deadline' => 'Seasonal',
                'category' => 'Insurance',
                'state' => 'All India',
                'apply_link' => 'https://pmfby.gov.in',
                'documents' => 'Land Records, Bank Account, Aadhaar Card',
                'is_trending' => true
            ],
            [
                'name' => 'Kisan Credit Card Scheme',
                'eligibility' => 'All farmers, sharecroppers, tenant farmers',
                'benefits' => 'Easy access to credit for agriculture needs',
                'deadline' => 'Ongoing',
                'category' => 'Credit',
                'state' => 'All India',
                'apply_link' => 'https://kcc.gov.in',
                'documents' => 'Land Records, Photo ID, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'Maharashtra State Rural Livelihood Mission',
                'eligibility' => 'Rural farmers and women self-help groups in Maharashtra',
                'benefits' => 'Financial assistance up to ₹1 lakh and training for rural development',
                'deadline' => '2024-12-31',
                'category' => 'Rural Development',
                'state' => 'Maharashtra',
                'apply_link' => 'https://msrlm.org',
                'documents' => 'Aadhaar Card, Income Certificate, Land Records',
                'is_trending' => true
            ],
            [
                'name' => 'Karnataka Raitha Suraksha',
                'eligibility' => 'All farmers registered in Karnataka',
                'benefits' => 'Accident insurance coverage up to ₹2 lakhs',
                'deadline' => '2024-12-31',
                'category' => 'Insurance',
                'state' => 'Karnataka',
                'apply_link' => 'https://raitamitra.karnataka.gov.in',
                'documents' => 'Aadhaar Card, RTC, Land Records',
                'is_trending' => false
            ],
            [
                'name' => 'Punjab Farmers Financial Assistance',
                'eligibility' => 'Small and marginal farmers in Punjab',
                'benefits' => 'Direct financial assistance of ₹1,500 per acre',
                'deadline' => '2024-12-31',
                'category' => 'Direct Benefit Transfer',
                'state' => 'Punjab',
                'apply_link' => 'https://agripunjab.gov.in',
                'documents' => 'Aadhaar Card, Land Records, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'Telangana Rythu Bandhu',
                'eligibility' => 'All farmers owning land in Telangana',
                'benefits' => '₹5,000 per acre per season',
                'deadline' => 'Seasonal',
                'category' => 'Direct Benefit Transfer',
                'state' => 'Telangana',
                'apply_link' => 'https://rythubandhu.telangana.gov.in',
                'documents' => 'Pattadar Passbook, Aadhaar Card, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'Kerala Karshaka Suraksha',
                'eligibility' => 'Registered farmers in Kerala',
                'benefits' => 'Pension scheme and accident coverage',
                'deadline' => '2024-12-31',
                'category' => 'Social Security',
                'state' => 'Kerala',
                'apply_link' => 'https://keralaagriculture.gov.in',
                'documents' => 'Aadhaar Card, Krishi Card, Bank Account Details',
                'is_trending' => false
            ],
            [
                'name' => 'Gujarat Kisan Suryoday Yojana',
                'eligibility' => 'Farmers in Gujarat with agricultural power connection',
                'benefits' => 'Daytime power supply for irrigation',
                'deadline' => '2024-12-31',
                'category' => 'Infrastructure',
                'state' => 'Gujarat',
                'apply_link' => 'https://guj-agriculture.gov.in',
                'documents' => 'Power Connection Bill, Aadhaar Card, Land Documents',
                'is_trending' => true
            ],
            [
                'name' => 'Tamil Nadu Mission on Sustainable Dryland Agriculture',
                'eligibility' => 'Dryland farmers in Tamil Nadu',
                'benefits' => 'Subsidies for drip irrigation and drought-resistant crops',
                'deadline' => '2024-12-31',
                'category' => 'Sustainable Agriculture',
                'state' => 'Tamil Nadu',
                'apply_link' => 'https://tnagrisnet.tn.gov.in',
                'documents' => 'Land Records, Aadhaar Card, Bank Account Details',
                'is_trending' => false
            ],
            [
                'name' => 'Madhya Pradesh Mukhyamantri Kisan Kalyan Yojana',
                'eligibility' => 'All registered farmers in Madhya Pradesh',
                'benefits' => 'Additional financial assistance of ₹4,000 per year',
                'deadline' => '2024-12-31',
                'category' => 'Direct Benefit Transfer',
                'state' => 'Madhya Pradesh',
                'apply_link' => 'https://mpkrishi.mp.gov.in',
                'documents' => 'Kisan Registration Card, Aadhaar Card, Bank Details',
                'is_trending' => true
            ],
            [
                'name' => 'Rajasthan Krishak Sathi Yojana',
                'eligibility' => 'Small and marginal farmers in Rajasthan',
                'benefits' => 'Subsidy on farm equipment and solar pumps',
                'deadline' => '2024-12-31',
                'category' => 'Equipment Subsidy',
                'state' => 'Rajasthan',
                'apply_link' => 'https://agriculture.rajasthan.gov.in',
                'documents' => 'Land Records, Aadhaar Card, Income Certificate',
                'is_trending' => false
            ],
            [
                'name' => 'Odisha Krushak Assistance for Livelihood and Income Augmentation',
                'eligibility' => 'All farmers in Odisha',
                'benefits' => 'Financial assistance of ₹10,000 per farmer family',
                'deadline' => '2024-12-31',
                'category' => 'Direct Benefit Transfer',
                'state' => 'Odisha',
                'apply_link' => 'https://kalia.odisha.gov.in',
                'documents' => 'Land Records, Aadhaar Card, Bank Account Details',
                'is_trending' => true
            ],
            [
                'name' => 'Bihar Diesel Anudaan Yojana',
                'eligibility' => 'Farmers in Bihar using diesel pumps for irrigation',
                'benefits' => 'Diesel subsidy of ₹60 per liter up to 20 liters per acre',
                'deadline' => '2024-12-31',
                'category' => 'Input Subsidy',
                'state' => 'Bihar',
                'apply_link' => 'https://krishi.bih.nic.in',
                'documents' => 'Kisan Credit Card, Aadhaar Card, Bank Details',
                'is_trending' => false
            ]
        ];
        foreach ($schemes as $scheme) {
            Scheme::create($scheme);
        }
    }
} 