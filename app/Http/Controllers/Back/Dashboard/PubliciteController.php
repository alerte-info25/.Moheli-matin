<?php

namespace App\Http\Controllers\Back\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Publicite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PubliciteController extends Controller
{
    /**
     * Afficher la liste des publicités
     */
    public function index()
    {
        $publicites = Publicite::with('user')
            ->whereIn('status', ['active', 'inactive'])
            ->latest()
            ->paginate(10);

        // Compteurs
        $total = Publicite::whereIn('status', ['active', 'inactive'])->count();
        $actives = Publicite::where('status', 'active')->count();
        $inactives = Publicite::where('status', 'inactive')->count();

        return view('back.publicites.liste', compact('publicites', 'total', 'actives', 'inactives'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('back.publicites.index');
    }

    /**
     * Enregistrer une nouvelle publicité
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'link_url' => 'nullable|url',
            'width' => 'nullable|integer|min:1|max:5000',
            'height' => 'nullable|integer|min:1|max:5000',
            'status' => 'required|in:active,inactive,expiré',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // dd($validated);

        // Upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('publicites', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Ajouter l'ID de l'utilisateur connecté
        $validated['user_id'] = auth()->id();

        Publicite::create($validated);

        return redirect()->route('dashboard.publicites.index')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Publicité créée avec succès.'
            ]);

    }

    /**
     * Afficher une publicité
     */
    public function show(Publicite $publicite)
    {
        $publicite->load('user');
        return view('back.publicites.show', compact('publicite'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Publicite $publicite)
    {
        return view('back.publicites.edit', compact('publicite'));
    }

    /**
     * Mettre à jour une publicité
     */
    public function update(Request $request, Publicite $publicite)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link_url' => 'nullable|url',
            'width' => 'nullable|integer|min:1|max:5000',
            'height' => 'nullable|integer|min:1|max:5000',
            'status' => 'required|in:active,inactive,expiré',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Upload de la nouvelle image si fournie
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($publicite->image_path && Storage::disk('public')->exists($publicite->image_path)) {
                Storage::disk('public')->delete($publicite->image_path);
            }

            $imagePath = $request->file('image')->store('publicites', 'public');
            $validated['image_path'] = $imagePath;
        }

        $publicite->update($validated);

        return redirect()->route('dashboard.publicites.index')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Publicité supprimée avec succès.'
            ]);

    }

    /**
     * Supprimer une publicité
     */
    public function destroy(Publicite $publicite)
    {
        // Supprimer l'image
        if ($publicite->image_path && Storage::disk('public')->exists($publicite->image_path)) {
            Storage::disk('public')->delete($publicite->image_path);
        }

        $publicite->delete();

        return redirect()->route('dashboard.publicites.index')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Publicité supprimée avec succès.'
            ]);
    }

    /**
     * Activer une publicité
     */
    public function activate(Publicite $publicite)
    {
        $publicite->update(['status' => 'active']);

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Publicité activée avec succès.'
        ]);
    }

    /**
     * Désactiver une publicité
     */
    public function deactivate(Publicite $publicite)
    {
        $publicite->update(['status' => 'inactive']);

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Publicité désactivée avec succès.'
        ]);
    }

    /**
     * Marquer une publicité comme expirée
     */
    public function expire(Publicite $publicite)
    {
        $publicite->update(['status' => 'expiré']);

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Publicité marquée comme expirée.'
        ]);
        
    }

    /**
     * Changer le statut d'une publicité
     */
    public function updateStatus(Request $request, Publicite $publicite)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive,expiré',
        ]);

        $publicite->update($validated);

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Statut mis à jour avec succès.'
        ]);

    }

    /**
     * Mettre à jour les statuts automatiquement (pour une commande cron)
     */
    public function autoUpdateStatus()
    {
        $now = now();

        // Marquer comme expirées les publicités dont la date de fin est dépassée
        Publicite::where('status', 'active')
            ->whereNotNull('end_date')
            ->where('end_date', '<', $now)
            ->update(['status' => 'expiré']);

        return response()->json([
            'message' => 'Statuts mis à jour automatiquement.'
        ]);
    }
}