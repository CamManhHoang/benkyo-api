<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Prefecture;
use App\Models\School;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchoolController extends Controller
{
    public function index($pref_slug, $city_slug, Request $request)
    {
        $pref = Prefecture::where('slug', $pref_slug)->first();
        $city = City::where('slug', $city_slug)->first();

        $prefSchools = School::where('pref_code', $pref->id);
        $citySchools = School::where('city_id', $city->id);

        // number of cities in current prefecture
        $citiesInPrefCount = City::where('prefecture_id', $pref->id)->count();

        // number of schools for each type in prefecture
        $prefElementarySchoolCount = $prefSchools->clone()->where('school_type_code', School::SCHOOL_TYPE['elementary'])->count();
        $prefMiddleSchoolCount = $prefSchools->clone()->where('school_type_code', School::SCHOOL_TYPE['middle'])->count();
        $prefSeniorSchoolCount = $prefSchools->clone()->where('school_type_code', School::SCHOOL_TYPE['senior'])->count();

        // number of schools for each type in entire nation
        $nationalElementarySchoolCount = School::where('school_type_code', School::SCHOOL_TYPE['elementary'])->count();
        $nationalMiddleSchoolCount = School::where('school_type_code', School::SCHOOL_TYPE['middle'])->count();
        $nationalSeniorSchoolCount = School::where('school_type_code', School::SCHOOL_TYPE['senior'])->count();

        // number of cities in the entire nation
        $allCitiesCount = City::count();

        return response()->json([
            'success' => true,
            'data' => [
                'elementary' => [
                    'school_count' => $citySchools->clone()->where('school_type_code', School::SCHOOL_TYPE['elementary'])->count(),
                    'prefecture_average' => $this->calculateAverage($prefElementarySchoolCount, $citiesInPrefCount),
                    'national_average' => $this->calculateAverage($nationalElementarySchoolCount, $allCitiesCount)
                ],
                'middle' => [
                    'school_count' => $citySchools->clone()->where('school_type_code', School::SCHOOL_TYPE['middle'])->count(),
                    'prefecture_average' => $this->calculateAverage($prefMiddleSchoolCount, $citiesInPrefCount),
                    'national_average' => $this->calculateAverage($nationalMiddleSchoolCount, $allCitiesCount)
                ],
                'senior' => [
                    'school_count' => $citySchools->clone()->where('school_type_code', School::SCHOOL_TYPE['senior'])->count(),
                    'prefecture_average' => $this->calculateAverage($prefSeniorSchoolCount, $citiesInPrefCount),
                    'national_average' => $this->calculateAverage($nationalSeniorSchoolCount, $allCitiesCount)
                ],
            ]
        ], Response::HTTP_OK);
    }

    private function calculateAverage($sum, $count)
    {
        if ($count === 0) {
            return 0; // Handle the case when the count is empty
        }

        return round($sum / $count, 2);
    }
}
