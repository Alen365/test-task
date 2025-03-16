<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\Library\AuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{

    public function __construct(private readonly AuthorService $authorService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $authors = $this->authorService->getAuthors();
            $authorCollection = new AuthorCollection($authors);

            return response()->json($authorCollection, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $author = $this->authorService->createAuthor($request->toDto());
            $authorResource = new AuthorResource($author);
            return response()->json($authorResource, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $authorId): JsonResponse
    {
        try {
            $author = $this->authorService->getAuthorById($authorId);
            $authorResource = new AuthorResource($author);

            return response()->json($authorResource);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $authorId): JsonResponse
    {
        try {
            $author = $this->authorService->updateAuthor($authorId, $request->toDto());
            $authorResource = new AuthorResource($author);

            return response()->json($authorResource);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $authorId): JsonResponse
    {
        try {
            $this->authorService->deleteAuthor($authorId);

            return response()->json(['message'=>'Author has been deleted']);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
