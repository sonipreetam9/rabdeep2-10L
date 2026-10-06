<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // ******************** Company Information ******************** //
        $CompanyName = "Rabdeep Motors";
        $CompanyShortName = "RDMT";
        $CompanyPhone1 = "9306255901";
        $CompanyPhone2 = "9306255901";
        $CompanyWhatsapp = "9306255901";
        $CompanyEmail = "rabdeepmotors@gmail.com";
        $CompanyAddress = "RABDEEP MOTORS JEEPS, Sirsa Road, opp. indane gas agency, Dhaliwal Nagar, Mandi Dabwali, Haryana 125104";
        $CompanyURL = "https://www.google.com";


        // ******************** Company Assets ******************** //
        $CompanyLogo = 'admin/assets/images/logo.png';
        $CompanyFavicon = 'admin/assets/images/favicon.png';

        // ******************** Company Social Media Links ******************** //
        $CompanyFacebook = 'https://www.facebook.com/rabdeep.chauhan/';
        $CompanyTwitter = 'https://www.twitter.com';
        $CompanyInstagram = 'https://www.instagram.com/rabdeep_motors_jeep/';
        $CompanyYoutube = 'https://www.youtube.com/@RABDEEPMOTORS';


        view()->share('CompanyName', $CompanyName);
        view()->share('CompanyShortName', $CompanyShortName);
        view()->share('CompanyPhone1', $CompanyPhone1);
        view()->share('CompanyPhone2', $CompanyPhone2);
        view()->share('CompanyWhatsapp', $CompanyWhatsapp);
        view()->share('CompanyEmail', $CompanyEmail);
        view()->share('CompanyAddress', $CompanyAddress);
        view()->share('CompanyURL', $CompanyURL);

        // ******************** Company Assets ******************** //
        view()->share('CompanyLogo', $CompanyLogo);
        view()->share('CompanyFavicon', $CompanyFavicon);

        // ******************** Company Social Media Links ******************** //
        view()->share('CompanyFacebook', $CompanyFacebook);
        view()->share('CompanyTwitter', $CompanyTwitter);
        view()->share('CompanyInstagram', $CompanyInstagram);
        view()->share('CompanyYoutube', $CompanyYoutube);


    }
}
