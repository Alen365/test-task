<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Services\Library\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(private readonly BookService $bookService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $books = $this->bookService->filterBooks(
                $request->all(),
                $request->get('page', 1),
                $request->get('limit', 10)
            );
            $bookCollection = new BookCollection($books);

            return response()->json($bookCollection, 200);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        try {
            $book = $this->bookService->createBook($request->toDto());
            $bookResource = new BookResource($book);
            return response()->json($bookResource, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $bookId): JsonResponse
    {
        try {
            $book = $this->bookService->getBookById($bookId);
            $bookResource = new BookResource($book);

            return response()->json($bookResource);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $bookId): JsonResponse
    {
        try {
            $book = $this->bookService->updateBook($bookId, $request->toDto());
            $bookResource = new BookResource($book);

            return response()->json($bookResource, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $bookId): JsonResponse
    {
        try {
            $this->bookService->deleteBook($bookId);

            return response()->json(['message' => 'Book has been deleted']);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 200);
        }

    }
}
