//ファイルダウンロード
$(function () {
    // ファイル選択時の処理
    $(document).on('change', 'input[type="file"]', function (e) {
        // 選択されたファイルをデータ属性に格納
        const selectedFile = e.target.files[0];
        if (selectedFile) {
            $(this).data('selectedFile', selectedFile);
        } else {
            $(this).data('selectedFile', null);
        }
    });

    // ダウンロードボタンの処理
    $(document).on('click', 'a[id$="_download"]', function (e) {
        e.preventDefault(); // デフォルトのリンク動作を防ぐ
        const fileInputId = $(this).attr('id').replace('_download', ''); // 対応する入力のIDを取得
        const selectedFile = $(`#${fileInputId}`).data('selectedFile'); // 選択されたファイルを取得

        if (selectedFile) {
            const url = URL.createObjectURL(selectedFile);
            const link = document.createElement('a');
            link.href = url;
            link.download = selectedFile.name; // 元のファイル名でダウンロード
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url); // メモリ解放
        } else {
            // ファイルが選択されていない場合のアラート
            alert('ファイルが選択されていません。');
        }
    });
});
// ファイルリセット
$('[id$="_resetFile"]').each(function() {
    $(this).on('click', function(e) {
        e.preventDefault();
        // ボタンのIDから '_resetFile' を削除して、対応するファイル入力のIDを取得
        let targetInputId = $(this).attr('id').replace('_resetFile', '');
        $('#' + targetInputId).val('');  // 対応するファイル入力をリセット
    });
});
