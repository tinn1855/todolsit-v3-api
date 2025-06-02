<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Lấy danh sách tất cả users (không phân trang, không lọc)
     */
    public function index(): JsonResponse
    {
        try {
            $users = User::select('id', 'username', 'email', 'full_name', 'role', 'created_at')
                         ->orderBy('created_at', 'desc')
                         ->get();

            return response()->json([
                'success' => true,
                'message' => 'Lấy danh sách users thành công',
                'data' => $users,
                'count' => $users->count()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy danh sách users',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lấy thông tin user theo ID
     */
    public function show($id): JsonResponse
    {
        try {
            $user = User::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Lấy thông tin user thành công',
                'data' => $user
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy user'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy thông tin user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
