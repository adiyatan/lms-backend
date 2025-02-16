<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Speaker;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    use ApiResponseTrait;

    public function index(Request $request)
    {
        // Get search and pagination parameters
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10); // Default 10 items per page

        // Query the modules with optional search
        $modules = Module::with('speaker')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->paginate($perPage);

        return $this->successResponse($modules, 'List of modules with pagination and search');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'speaker_id' => 'nullable|exists:speakers,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'group_link' => 'nullable|string|max:255',
            'schedule' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->all(), 'Validasi gagal', 422);
        }

        $module = Module::create($request->all());

        return $this->successResponse($module, 'Module created successfully', 201);
    }

    public function show($id)
    {
        $module = Module::with('speaker')->find($id);

        if (! $module) {
            return $this->errorResponse(null, 'Module not found', 404);
        }

        return $this->successResponse($module, 'Module details');
    }

    public function update(Request $request, $id)
    {
        $module = Module::find($id);

        if (! $module) {
            return $this->errorResponse(null, 'Module not found', 404);
        }

        $validator = Validator::make($request->all(), [
            'speaker_id' => 'nullable|exists:speakers,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'group_link' => 'nullable|string|max:255',
            'schedule' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->all(), 'Validasi gagal', 422);
        }

        $module->update($request->all());

        return $this->successResponse($module, 'Module updated successfully');
    }

    public function destroy($id)
    {
        $module = Module::find($id);

        if (! $module) {
            return $this->errorResponse(null, 'Module not found', 404);
        }

        $module->delete();

        return $this->successResponse(null, 'Module deleted successfully');
    }

    public function getSpeakerModules(Request $request)
    {
        $speaker = Speaker::all();

        return $this->successResponse($speaker, 'List of modules for the speaker');
    }

    public function getAllModulesGroupLink(Request $request)
    {
        $modules = Module::whereNotNull('group_link')->get();

        return $this->successResponse($modules, 'List of modules with group link');
    }
}
