<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Image;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{

    public function index()
    {
        $portfolio = Portfolio::with(['images','tacheur'])->where("tacheur_id",Auth()->user()->tacheur->id)->get();
        // dd($portfolio);
        return view('portfolio.index',compact('portfolio'));
        // return response()->json([
        //     'Portfolio' => $portfolio
        // ]);
    }

    public function store(PortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->validated());
        $portfolio->tacheur_id = Auth::user()->tacheur->id;

        $portfolio->save();


        $images = $request->file('images');
        foreach ($images as  $image) {
            $path = $image->store('public/portfolio');
            $portfolio->images()->save(Image::make(['path' => $path]));
        }

        return redirect()->back();

        // if ($request->hasFile('path')) {

        //     $path = $request->file('path')->store('public/portfolio');

        //     $portfolio->images()->save(Image::make(['path' => $path]));

        // }

        // return response()->json(["Portfolio" => "Bien Ajouté !"]);
    }

    public function show(Portfolio $portfolio)
    {
        //
    }

    // public function updatePortfolio(PortfolioRequest $request, $id){
    //     try {
    //         $portfolio = Portfolio::findOrFail($id)->update($request->validated());

    //         if ($request->hasFile('path')) {

    //             $path = $request->file('path')->store('public/portfolio');

    //             if ($portfolio->images) {
    //                 Storage::delete($portfolio->images->path);
    //                 $portfolio->images->path = $path;
    //                 $portfolio->images->save();
    //             } else {
    //                 $portfolio->images()->save(Image::make(['path' => $path]));
    //             }
    //         }

    //         return response()->json(["Portfolio" => "Bien Modifié !"]);

    //     } catch (\Throwable $th) {
    //         return response()->json(['Error' => $th->getMessage()]);
    //     }
    // }

    public function update(PortfolioRequest $request, $id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id)->update($request->validated());

            if ($request->hasFile('path')) {

                $path = $request->file('path')->store('public/portfolio');

                if ($portfolio->images) {
                    Storage::delete($portfolio->images->path);
                    $portfolio->images->path = $path;
                    $portfolio->images->save();
                } else {
                    $portfolio->images()->save(Image::make(['path' => $path]));
                }
            }

            return response()->json(["Portfolio" => "Bien Modifié !"]);

        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()]);
        }
    }

    public function destroy(Portfolio $portfolio)
    {

        $portfolio->delete();

        return redirect()->back();
        // return response()->json([
        //     'Portfolio' => "Bien supprimé"
        // ]);
    }
}
