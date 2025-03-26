<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            return $this->search($request);
        }

        // Fetch paginated services when there's no search query
        $services = Service::latest()->paginate(10);

        return view('service', compact('services'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:2|max:255',
        ]);
    
        $query = $request->input('search');
    
        $search_result = Service::search($query)->take(5)->get(); 
    
        return response()->json([
            'status' => 'success',
            'query' => $query,
            'data' => $search_result->map(fn ($service) => [
                'name' => $service->name,
                'slug' => $service->slug,
                'description' => $service->description,
                'image_path' => $service->image_path,
            ]),
        ]);
    }
}
