<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\SmartService;
use App\Models\Package;
use App\Models\InfoCard;
use App\Models\HotelOffering;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\RoomType;

class HomeController extends Controller
{
    public function home()
    {  
        $heroSection = HeroSection::first() ?? new HeroSection(); 
        $aboutSections = AboutSection::all(); 
        $smartservices = SmartService::all() ?? collect();
        $packages = Package::all();
        $infoCards = InfoCard::take(4)->get();
        $offerings = HotelOffering::take(8)->get();
        $contacts = Contact::all();
        $faqs = Faq::all(); 
        // $roomTypes = RoomType::all(); 
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get(); 
    
        return view('frontend.index', compact(
            'testimonials', 'heroSection', 'aboutSections', 'smartservices', 
            'packages', 'infoCards', 'offerings', 'contacts', 'faqs' 
        ));
    }
    

    
    public function about()
    {
        return view('frontend.about');
    }

    public function accommodation()
    {
        return view('frontend.accommodation');
    }

    public function banquetsAndMeetings()
    {
        return view('frontend.banquets-and-meetings');
    }

    public function rulesAndRegulations()
    {
        return view('frontend.rules-and-regulations');
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    // Accommodation Routes
    public function standardRoom()
    {
        return view('frontend.standard-room');
    }

    public function deluxeRoom()
    {
        return view('frontend.deluxe-room');
    }

    public function luxurySuite()
    {
        return view('frontend.luxury-suite');
    }

    // Banquets and Meetings Routes

    public function lawnPackage()
    {
        return view('frontend.lawn-package');
    }

    public function ballroomPackage()
    {
        return view('frontend.ballroom-package');
    }

    public function termandcondition(){
        return view('frontend.termandcondition');
    }
    public function conditions(){
        return view('frontend.conditions');
    }
    public function liability()
    {
        return view('frontend.liability');
    }
    public function miscelleneous()
    {
        return view('frontend.miscelleneous');
    }
    public function details(){
        return view('frontend.details');
    }
    public function information()
    {
        return view('frontend.information');
    }
    public function policy()
    {
        return view('frontend.policy');
    }
}
