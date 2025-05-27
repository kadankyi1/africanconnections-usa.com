<?php
namespace Database;

class PagesData
{
    public $pages_data;

    public function __construct(){
        $this->pages_data = [
            "home" => [
                /*************************************************************************************************************************
                                                HOME PAGE
                *************************************************************************************************************************/
                'name' =>'Home',
                'title' =>'African Connections | We Are Your Gateway To Africa',
                'description' =>'African Connections | See Our Trending Tours, Countries We Tour, Snapshot Of Our Many Reviews And More About Our Services',
                'keywords' =>'African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' => '/home',
                
            ],
            "about_us" => [
                /*************************************************************************************************************************
                                                ABOUT US PAGE
                *************************************************************************************************************************/
                'name' =>'About Us',
                'title' =>'About The Company & CEO | Learn More About African Connections',
                'description' =>'About African Connections. The CEO, The Company, What We Do, Our Experience And More',
                'keywords' =>'About African Connections, African Connections USA, Travel To Ghana, Ghana Tour, Experience the wonder of Ghana',
                'url' =>'/about',
                
            ],
            "tours" => [
                /*************************************************************************************************************************
                                                TOURS PAGE
                *************************************************************************************************************************/
                'name' =>'Tours',
                'title' =>'Tours | View Exciting Tours From African Connections',
                'description' =>'African Connections Tours Listing. See All Our Tours To Africa Which Includes Ghana, Egypt, Senegal And More',
                'keywords' =>'African Connections Tours Listing, African Connections Tours, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/tours',
                
            ],
            "reviews" => [
                /*************************************************************************************************************************
                                                REVIEWS PAGE
                *************************************************************************************************************************/
                'name' =>'Reviews',
                'title' =>'Reviews, Testimonials & Why Choose Us | African Connections',
                'description' =>'See Real Reviews And Testimonial Videos Of African Connections By Some Of Our Tourists.',
                'keywords' =>'Reviews African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/reviews',
                
            ],
            "make_a_payment" => [
                /*************************************************************************************************************************
                                                MAKE A PAYMENT PAGE
                *************************************************************************************************************************/
                'name' =>'Make A Payment',
                'title' =>'Make A Payment For A Tour | African Connections USA',
                'description' =>'Make A Payment For Your Tour With African Connections. You can pay in full or pay in installments. You can use credit cards online or contact us for ACH payments',
                'keywords' =>'Make A Payment African Connections, Make A Payment African Connections Tours',
                'url' =>'/pay',
                
            ],
            "travel_insurance" => [
                /*************************************************************************************************************************
                                                TRAVEL INSURANCE PAGE
                *************************************************************************************************************************/
                'name' =>'Travel Insurance',
                'title' =>'Travel Insurance | Get Quotes & Buy Insurance For Your Trip',
                'description' =>'Travel Insurance Through African Connections. Get A Travel Insurance Quote',
                'keywords' =>'Travel Insurance African Connections, African Connections Tours, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/travel-insurance',
                
            ],
            "blog" => [
                /*************************************************************************************************************************
                                                TOURS PAGE
                *************************************************************************************************************************/
                'name' =>'Blog',
                'title' =>'Exciting Blog With Articles By African Connections',
                'description' =>'Blog Articles By African Connections About Ghana, Africa, African Traditions, Tours And More',
                'keywords' =>'African Connections Blog Article, African Connections, African Connections USA, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/blog',
                
            ],
            "contact_us" => [
                /*************************************************************************************************************************
                                                TOURS PAGE
                *************************************************************************************************************************/
                'name' =>'Contact Us',
                'title' =>'Contact African Connections | View Address & Phone',
                'description' =>'Contact Information For African Connections. Phone Number And Office Address.',
                'keywords' =>'Contact African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/contact-us',
                
            ],
            "youth_program" => [
                /*************************************************************************************************************************
                                                TOURS PAGE
                *************************************************************************************************************************/
                'name' =>'Youth Program',
                'title' =>'Youth Program | An Initiative By African Connections',
                'description' =>'Learn about the Sankofa Youth Enrichment Program by African Connections Seeking to strengthen Chicago area youth',
                'keywords' =>'Sankofa Youth, Sankofa Youth Enrichment Program, Sankofa Youth Enrichment Program African Connections.',
                'url' =>'/youth-program',
                
            ],
            "ghana_country" => [
                /*************************************************************************************************************************
                                                GHANA COUNTRY PAGE
                *************************************************************************************************************************/
                'name' =>'Ghana',
                'title' =>'Ghana Tours | View Exciting Tours To Ghana By African Connections',
                'description' =>'See All Our Tours To Ghana By African Connections. Learn About Tour Dates, Prices And More',
                'keywords' =>'Return To The Motherland, Year of Return, Beyond The Return,  African Connections, African Connections USA, Ghana Tours,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/countries/ghana',
                
            ],
            "egypt_tour" => [
                /*************************************************************************************************************************
                                                EGYPT TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Egypt Tour',
                'title' =>'Egypt African Heritage Tour | African Connections USA',
                'description' =>'Egypt Tour With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Egypt Tour, Egypt Pyramids Tour, Egypt Tour African Connections, African Connections, African Connections USA, Tours Egypt,  Tours to Egypt, Tour Operator Egypt, Tour Operators Egypt, Egypt Tour Agency, Egypt Tour Agencies, Travel To Egypt, Egypt Tour, Experience Egypt',
                'url' =>'/tours/egypt',
                
            ],
            "black_history_month_tour" => [
                /*************************************************************************************************************************
                                                BLACK HISTORY MONTH TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Black History Month Tour',
                'title' =>'Black History Month, Return To The Motherland Tour',
                'description' =>'Get A Feel Of Our Black History Month Tour. Learn About Pricing, Packages & More',
                'keywords' =>'Black History Month, Black History Month Ghana, African Connections, African Connections USA, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/tours/black-history-month',
                
            ],
            "juneteenth_tour" => [
                /*************************************************************************************************************************
                                                JUNETEENTH TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Juneteenth Tour',
                'title' =>'JuneTeenth, Return To The Motherland | African Connections',
                'description' =>'Juneteenth Tour To Ghana With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Juneteenth, Juneteenth Tour, Juneteenth Tour African Connections, Return To The Motherland, Year of Return, Beyond The Return,  African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/tours/juneteenth',
                
            ],
            "panafest_tour" => [
                /*************************************************************************************************************************
                                                JUNETEENTH TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Panafest Tour',
                'title' =>'PANAFEST, African Heritage Tour | African Connections',
                'description' =>'PANAFEST Tour To Ghana With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'PANAFEST, PANAFEST Ghana, PANAFEST Tour African Connections, Return To The Motherland, Year of Return, Beyond The Return,  African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/tours/panafest',
                
            ],
            "kenya_tanzania_zanzibar_tour" => [
                /*************************************************************************************************************************
                                                KENYA, TANZANIA, ZANZIBAR TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Kenya, Tanzania, Zanzibar Tour',
                'title' =>'Kenya, Tanzania, Zanzibar Return To The Motherland Tour | African Connections USA',
                'description' =>'Kenya, Tanzania, Zanzibar Tour With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Kenya Tour, Tanzania Tour, Zanzibar Tour,  African Connections, African Connections, African Connections USA, Tours Kenya Tanzania Zanzibar,  Tours to Kenya Tanzania Zanzibar, Tour Operator Kenya Tanzania Zanzibar, Tour Operators Kenya Tanzania Zanzibar, Kenya Tanzania Zanzibar Tour Agency, Kenya Tanzania Zanzibar Tour Agencies, Travel To Kenya Tanzania Zanzibar, Kenya Tanzania Zanzibar Tour, Experience Kenya Tanzania Zanzibar',
                'url' =>'/tours/kenya-tanzania-zanzibar',
                
            ],
            "south_africa_tour" => [
                /*************************************************************************************************************************
                                                SOUTH AFRICA PAGE
                *************************************************************************************************************************/
                'name' =>'South Africa Tour',
                'title' =>'South Africa, Return To The Motherland Tour | African Connections',
                'description' =>'South Africa Tour With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'South Africa Tour, South Africa Tour African Connections, African Connections, African Connections USA, Tours South Africa,  Tours to South Africa, Tour Operator South Africa, Tour Operators South Africa, South Africa Tour Agency, South Africa Tour Agencies, Travel To EgSouth Africaypt, South Africa Tour, Experience South Africa',
                'url' =>'/tours/south-africa',
                
            ],
            "ghana_togo_benin_tour" => [
                /*************************************************************************************************************************
                                                GHANA, TOGO, BENIN TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Ghana, Togo, Benin Tour',
                'title' =>'Ghana, Togo, Benin Ouidah Voodoo Festival Tour | AC',
                'description' =>'Ghana, Togo, Benin Ouidah Voodoo Festival Tour. Learn About Pricing, Packages And More',
                'keywords' =>'Togo Tour, Benin Tour, Voodoo Festival Tour, Return To The Motherland, Year of Return, Beyond The Return,  African Connections, African Connections USA, Ghana Tours,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/tours/ghana-togo-benin',
                
            ],
            "senegal_tour" => [
                /*************************************************************************************************************************
                                                SENEGAL TOUR PAGE
                *************************************************************************************************************************/
                'name' =>'Senegal Tour',
                'title' =>'Senegal, African Culture & Safari Tour | African Connections',
                'description' =>'Senegal Safari Tour With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Senegal Tour, Senegal Safari Tour, Senegal Tour African Connections, Senegal Safari Tour African Connections, African Connections USA, Tours Senegal,  Tours to Senegal, Tour Operator Senegal, Tour Operators Senegal, Senegal Tour Agency, Senegal Tour Agencies, Travel To Senegal, Senegal Tour, Experience Senegal',
                'url' =>'/tours/senegal',
                
            ],
            "ethiopia_ghana_tour" => [
                /*************************************************************************************************************************
                                                ETHIOPIA, GHANA
                *************************************************************************************************************************/
                'name' =>'Ethiopia & Ghana Tour',
                'title' =>'Ethiopia & Ghana Return to the Motherland | African Connections USA',
                'description' =>'Ethiopia & Ghana Tour With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Ethiopia Tour, Ghana Tour, Ethiopia & Ghana Tour African Connections, African Connections, African Connections USA, Tours Ethiopia, Tour Operator Ethiopia, Travel To Ethiopia',
                'url' =>'/tours/ethiopia-ghana',
                
            ],
            "morocco_tour" => [
                /*************************************************************************************************************************
                                                MOROCCO TOUR
                *************************************************************************************************************************/
                'name' =>'Morocco Tour',
                'title' =>'Morocco Tour | African Connections USA',
                'description' =>'Morocco Tour With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Morocco Tour, Morocco Tour African Connections, African Connections, African Connections USA, Tours Morocco, Tour Operator Morocco, Travel To Ethiopia',
                'url' =>'/tours/morocco',
                
            ],
            "return_to_the_motherland_tour" => [
                /*************************************************************************************************************************
                                                RETURN TO THE MOTHERLAND, GHANA TOUR
                *************************************************************************************************************************/
                'name' =>'Return To The Motherland Tour',
                'title' =>'Return To The Motherland, African Heritage Tour | AC',
                'description' =>'Return To The Motherland Tour To Ghana With African Connections. Learn About Pricing, Packages And More',
                'keywords' =>'Return To The Motherland, Return To Motherland Tour Ghana, Return To The Mother Tour African Connections, Return To The Motherland, Year of Return, Beyond The Return,  African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/tours/return-to-the-motherland',
                
            ],
            "tour_registration" => [
                /*************************************************************************************************************************
                                                TOUR REGISTRATION
                *************************************************************************************************************************/
                'name' =>'Tour Registration',
                'title' =>'Tour Registration Form | African Connections',
                'description' =>'Register For A Tour With African Connections.',
                'keywords' =>'Register For A Tour With African Connections African Connections',
                'url' =>'/tour-registration',
                
            ],
            "terms" => [
                /*************************************************************************************************************************
                                                TERMS AND CONDITIONS
                *************************************************************************************************************************/
                'name' =>'Terms',
                'title' =>'Terms & Conditions Of Service | African Connections',
                'description' =>'African Connections Tour Terms And Conditions. Learn About Installment Payments, Refunds And More.',
                'keywords' =>'Tour Terms And Conditions African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/terms',
                
            ],
            "customize_tour" => [
                /*************************************************************************************************************************
                                                CUSTOMIZE A TOUR
                *************************************************************************************************************************/
                'name' =>'Customize',
                'title' =>'Customize A Tour To Suit Your Needs | African Connections',
                'description' =>'Customize A Tour With African Connections. Send Customized Tour Details',
                'keywords' =>'Customize A Tour With African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/customize-tour',
                
            ],
            "referral_program" => [
                /*************************************************************************************************************************
                                                CUSTOMIZE A TOUR
                *************************************************************************************************************************/
                'name' =>'Referral Program',
                'title' =>'Referral Program | Win Credits For Your Tour With African Connections',
                'description' =>'Learn About The African Connections Referral Program And How You Can Win Credits For Tours',
                'keywords' =>'African Connections Referral Program, African Connections USA, Ghana Tours,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana',
                'url' =>'/referral-program',
                
            ],
        ];
    }
}
