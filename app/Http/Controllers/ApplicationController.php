<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    // عرض صفحة جميع طلبات التوظيف مع الترقيم
    public function index()
    {
        $applications = Application::latest()->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    // عرض صفحة تفاصيل الطلب
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    // تحديث حالة طلب التوظيف
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|string|in:Pending,Accepted,Rejected',
        ]);

        $application->update($validated);

        return redirect()->route('admin.applications.show', $id)->with('success', 'Application status updated successfully!');
    }

    // حذف طلب التوظيف
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully!');
    }
}