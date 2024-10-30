$(function() {
    // 初期状態の設定
    toggleFields();

    // セレクトボックスの変更イベント
    $('#select_cohort').on('change', function() {
        toggleFields();
    });

    // テキスト入力の入力イベント
    $('#input_cohort').on('input', function() {
        toggleFields();
    });

    function toggleFields() {
        const selectValue = $('#select_cohort').val();
        const inputValue = $('#input_cohort').val();

        // セレクトが選択されているとき
        if (selectValue) {
            $('#input_cohort').prop('disabled', true);
            $('#select_cohort').prop('disabled', false);
        }
        // テキスト入力があるとき
        else if (inputValue) {
            $('#select_cohort').prop('disabled', true);
            $('#input_cohort').prop('disabled', false);
        }
        // 両方が空の場合
        else {
            $('#input_cohort').prop('disabled', false);
            $('#select_cohort').prop('disabled', false);
        }
    }

    $('#select_cohort').on('change', function() {
        const cohortName = $(this).val();

        // セレクトボックスが選択された場合にのみ実行
        if (cohortName) {
            $.ajax({
                url: `/cohorts/details/${cohortName}`,
                method: 'GET',
                success: function(data) {
                    // フォームの入力フィールドにデータをセット
                    $('#app_ceo_date').val(data.app_ceo_date);
                    $('#app_visa_date').val(data.app_visa_date);
                    $('#jpn_lang_study_start_date').val(data.jpn_lang_study_start_date);
                    $('#jpn_lang_study_end_date').val(data.jpn_lang_study_end_date);
                    $('#date_of_entry').val(data.date_of_entry);
                },
                error: function() {
                    // エラー時の処理（必要に応じて）
                    alert('期登録が見つかりませんでした');
                }
            });
        } else {
            // セレクトボックスが空の場合は入力フィールドをクリア
            $('#app_ceo_date').val('');
            $('#app_visa_date').val('');
            $('#jpn_lang_study_start_date').val('');
            $('#jpn_lang_study_end_date').val('');
            $('#date_of_entry').val('');
        }
    });


    //削除
    $('#delete-cohort-button').on('click', function(event) {
        event.preventDefault(); // デフォルトの動作を防ぐ
        const cohortName = $('#select_cohort').val() || $('#input_cohort').val();

        if (!cohortName) {
            alert('削除する期名称を選択してください');
            return;
        }

        // 隠しフィールドに値を設定
        $('#cohort_name_to_delete').val(cohortName);
        // 削除フォームを送信
        $('#delete-cohort-form').submit();
    });
});
