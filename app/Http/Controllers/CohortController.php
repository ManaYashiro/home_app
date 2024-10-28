<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cohort;
use App\Models\ResidencyCertificateApplicant;

class CohortController extends Controller
{

    public function index(Request $request)
    {
        // コホート名をリクエストから取得
        $cohortName = $request->input('cohort_name');

        // すべてのコホートを取得
        $cohorts = Cohort::all();

        // ビューにデータを渡す
        return view('cohort_reg', compact('cohorts'));
    }

    public function getCohortDetails($cohortName)
    {
        $cohort = Cohort::where('cohort_name', $cohortName)->first();

        if ($cohort) {
            return response()->json($cohort);
        }

        return response()->json(['error' => 'Cohort not found'], 404);
    }

    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'app_ceo_date' => 'required|date',
            'app_visa_date' => 'nullable|date',
            'jpn_lang_study_start_date' => 'nullable|date',
            'jpn_lang_study_end_date' => 'nullable|date',
            'date_of_entry' => 'nullable|date',
        ]);

        // セレクトボックスまたはテキストボックスからの値を取得
        $cohortName = $request->input('cohort_name');

        // セレクトボックスの値が存在しない場合、テキストボックスの値を使用
        if (empty($cohortName) && !empty($request->input('input_cohort'))) {
            $cohortName = $request->input('input_cohort');
        }

        // cohort_nameが空でないことを確認
        if (empty($cohortName)) {
            return redirect()->back()->withErrors(['cohort_name' => __('cohort_reg.input_required')]);
        }

        // cohort_nameが既存の場合は更新、存在しない場合は新規作成
        $cohort = Cohort::where('cohort_name', $cohortName)->first();

        if ($cohort) {
            // 既存のレコードを更新
            $cohort->update($validatedData);
            $message = __('cohort_reg.update_success');
        } else {
            // 新しいレコードを作成
            Cohort::create(array_merge($validatedData, ['cohort_name' => $cohortName]));
            $message = __('cohort_reg.create_success');
        }

        // 成功メッセージ付きでリダイレクト
        return redirect('/cohort_registration')->with('success', $message);
    }

    public function destroy(Request $request)
    {
        // リクエストからcohort_nameを取得
        $cohortName = $request->input('cohort_name');

        // cohort_nameが存在する場合は削除
        if ($cohortName) {
            $cohort = Cohort::where('cohort_name', $cohortName)->first();

            if ($cohort) {
                $cohort->delete();
                return redirect('/cohort_registration')->with('success', __('cohort_reg.delete_success'));
            } else {
                return redirect('/cohort_registration')->withErrors(['cohort_name' => __('cohort_reg.not_found')]);
            }
        }

        return redirect('/cohort_registration')->withErrors(['cohort_name' => __('cohort_reg.select_cohort')]);
    }
}
