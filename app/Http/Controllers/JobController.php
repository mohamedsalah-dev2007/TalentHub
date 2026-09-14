<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;
use App\Models\Company;

class JobController extends Controller
{
    // عرض قائمة الوظائف
    public function index()
    {
        $jobs = JobListing::latest()->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    // عرض فورم إضافة وظيفة جديدة
    public function create()
    {
        return view('admin.jobs.create');
    }

    // حفظ الوظيفة الجديدة مع إنشاء الشركة تلقائياً لو لم تكن موجودة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'job_type' => 'required|string',
            'description' => 'required|string',
        ]);

        $company = Company::firstOrCreate(
            ['name' => $validated['company_name']],
            ['description' => 'Auto-created via job posting']
        );

        JobListing::create([
            'title' => $validated['title'],
            'company_id' => $company->id,
            'location' => $validated['location'],
            'salary' => $validated['salary'],
            'job_type' => $validated['job_type'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created and company handled successfully!');
    }

    // عرض صفحة تعديل الوظيفة
    public function edit($id)
    {
        $job = JobListing::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    // تحديث بيانات الوظيفة
    public function update(Request $request, $id)
    {
        $job = JobListing::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'job_type' => 'required|string',
            'description' => 'required|string', // أضفناها هنا عشان يتم تحديث الوصف بنجاح
        ]);

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
    }

    // حذف الوظيفة
    public function destroy($id)
    {
        $job = JobListing::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully!');
    }
}
