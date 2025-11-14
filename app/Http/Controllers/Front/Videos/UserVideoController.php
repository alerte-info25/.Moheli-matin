<?php

namespace App\Http\Controllers\Front\Videos;

use App\Http\Controllers\Controller;
use App\Models\CategorieVideo;
use App\Models\Video;
use Illuminate\Http\Request;

class UserVideoController extends Controller
{
    public function index()
    {
        // Tous les podcasts vidéo
        $videos = Video::with(['media', 'categorieVideo'])
            ->latest()
            ->paginate(10);

        return view('Front.Videos.index', compact('videos'));
    }

    public function render(string $slug)
    {
        // Récupérer la vidéo principale via le slug du média
        $video = Video::whereHas('media', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with(['media', 'categorieVideo', 'media.tags'])
        ->firstOrFail();

        // catégories de vidéos
        $categoriesVideo = CategorieVideo::withCount('videos')
            ->orderByDesc('videos_count')
            ->get();

        // Récupérer les vidéos similaires (même catégorie)
        $videosSimilaires = Video::where('id', '!=', $video->id)
            ->where('categorie_video_id', $video->categorie_video_id)
            ->with(['media', 'categorieVideo', 'media.tags'])
            ->latest()
            ->take(4)
            ->get();

        // Incrémente le nombre de vues
        $video->increment('views');

        return view('Front.Details.detailVideo', compact('video', 'categoriesVideo', 'videosSimilaires'));
    }
}
