<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownLoadController extends Controller
{
    private $uploadsFolder = "";

    public function __construct()
    {
        $this->uploadsFolder = Applicants::UPLOAD_FOLDER;
    }

    public function download(Request $request)
    {
        $filePath = $request->input('filename');

        // ファイルが存在するかチェック
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404); // ファイルが見つからない場合は404エラー
        }
        // ファイルをダウンロード
        try {
            $response = response(Storage::disk('public')->get($filePath))->header('Content-Type', 'application/pdf');
            return $response;
        } catch (\Throwable $th) {
        }
    }
}
