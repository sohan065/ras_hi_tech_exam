<?php

namespace App\Http\Controllers;

use Exception;
use FileSystem;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::where('is_active', true)->get();
        // return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            // User is logged in, display the dashboard
            return view('dashboard.pages.post.create');
        } else {
            // User is not logged in, redirect to the login page 
            return redirect()->route('user.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $validated = $request->only(['user', 'title', 'text', 'image']);
        $path = FileSystem::storeFile($validated['image'], 'post/image');

        try {
            $post =  Post::create([
                'user' => $validated['user'],
                'title' => $validated['title'],
                'text' => $validated['text'],
                'image' => $path,

            ]);
        } catch (Exception $e) {
            Log::error($e);
        }
        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $post = Post::findOrFail($id);
            return view('dashboard.pages.post.edit', compact('post'));
        } else {
            return redirect()->route('user.login')->with('error', 'You need to log in to perform this action.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $validated = $request->only(['user', 'title', 'text', 'image']);

        if (Auth::check()) {
            $post = Post::where('user', Auth::user()->id)->where('id', $id)->first();
            if (array_key_exists('image', $validated) && $post) {
                FileSystem::deleteFile($post['image']);
                $path = FileSystem::storeFile($validated['image'], 'post/image');
            }
            try {
                Post::where('user', Auth::user()->id)->where('id', $id)->update([
                    'title' => $validated['title'],
                    'text' => $validated['text'],
                    'image' => array_key_exists('image', $validated) ? $path : $post['image'],
                ]);
                return redirect()->route('user.dashboard');
            } catch (Exception $e) {
                log::error($e);
            }
        } else {
            return redirect()->route('user.login')->with('error', 'You need to log in to perform this action.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $post = Post::findOrFail($id);
            if ($post->image) {
                Filesystem::deleteFile($post->image);
            }
            $post->delete();
            return redirect()->route('user.dashboard')->with('success', 'Post status toggled successfully.');
        } else {

            return redirect()->route('user.login')->with('error', 'You need to log in to perform this action.');
        }
    }
    public function toggleActive($id)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $post = Post::findOrFail($id);

            $status = $post->is_active;
            $post->is_active = !$status;
            $post->update();
            return redirect()->route('user.dashboard')->with('success', 'Post status toggled successfully.');
        } else {
            // User is not logged in, redirect to the login page 
            return redirect()->route('user.login')->with('error', 'You need to log in to perform this action.');
        }
    }
    // dash board user post filter 
    public function filter(Request $request)
    {

        if (Auth::check()) {
            $startDateInput = $request->input('start_date');
            $startDate = Carbon::createFromFormat('m/d/Y', $startDateInput)->format('Y-m-d');
            $user = Auth::user();
            $filteredPosts = Post::where('user', $user->id)->whereDate('created_at', '=', $startDate)
                ->get();
            return view('dashboard.pages.post.filter', compact('filteredPosts'));
        } else {
            return redirect()->route('user.login')->with('error', 'You need to log in to perform this action.');
        }
    }
}
