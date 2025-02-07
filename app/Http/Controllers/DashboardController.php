<?php

namespace App\Http\Controllers;

use App\Models\CommunityUnits;
use App\Models\Document;
use App\Models\FamilyCard;
use App\Models\Generals;
use App\Models\Migrations;
use App\Models\Neighborhoods;
use App\Models\Resident;
use App\Models\SubDistrict;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::get()->count();
        $generals = Generals::get()->count();
        $migrations = Migrations::get()->count();
        $neighborhoods = Neighborhoods::get()->count();
        $resident = Resident::get()->count();
        $subdistrict = SubDistrict::get()->count();
        $family_card = FamilyCard::get()->count();
        $document = Document::get()->count();
        $community_units = CommunityUnits::get()->count();

        return view('pages.dashboard', compact([
            'user_count', 'generals', 'migrations', 'neighborhoods',
            'resident', 'subdistrict', 'family_card', 'document', 'community_units'
        ]));
    }
}