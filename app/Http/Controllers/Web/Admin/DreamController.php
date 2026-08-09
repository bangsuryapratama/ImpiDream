<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dream;
use Illuminate\Http\Request;

class DreamController extends Controller
{
    public function index(Request $request)
    {
        $query = Dream::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $dreams = $query->latest()->paginate(10);

        return view('admin.dreams.index', compact('dreams'));
    }

    public function destroy($id)
    {
        $dream = Dream::findOrFail($id);
        $dream->delete();

        return redirect()->back()->with('success', 'Rencana impian berhasil dihapus!');
    }
}
