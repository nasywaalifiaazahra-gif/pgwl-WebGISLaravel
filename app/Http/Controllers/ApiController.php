<?php

namespace App\Http\Controllers;

use App\Models\pointsModel;
use App\Models\polylinesModel;
use App\Models\polygonsModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    protected $points;
    protected $polylines;
    protected $polygons;

    public function __construct()
    {
        $this->points = new pointsModel();
        $this->polylines = new polylinesModel();
        $this->polygons = new polygonsModel(); 
    }

    public function geojson_points()
    {
        $points = $this->points->gjson_points();

    return response()->json($points, 200, [], JSON_NUMERIC_CHECK);
    }

    public function geojson_polylines()
    {
        $polylines = $this->polylines->gjson_polylines();

        return response()->json($polylines, 200, [], JSON_NUMERIC_CHECK);
    }

    public function geojson_polygons()
    {
        $polygons = $this->polygons->gjson_polygons();

        return response()->json($polygons, 200, [], JSON_NUMERIC_CHECK);
    }
}
