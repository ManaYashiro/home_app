//ファイル選択
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

    //ダウンロードボタンの処理
    $(document).on('click', 'a[id$="_download"]', function (e) {
        e.preventDefault(); // デフォルトのリンク動作を防ぐ
        var filename = $(this).data('filename');
        if (!filename) {
            alert('ファイルが設定されていません');
            return; // 処理を終了
        }
        var url = $("#download-url").val();
        const metaElements = document.querySelectorAll('input[name="_token"]');
        const csrf = metaElements.length > 0 ? metaElements[0].value : "";
        var baseFilename = filename.split('/').pop();// パスからファイル名を取り出す
        if (filename){
            fetch(url,
                {
                    method:"post",
                    headers: {
                      "Content-Type": "application/json",
                      "X-CSRF-TOKEN":csrf
                    },
                    body: JSON.stringify({
                        filename: filename,
                    })
                }
            )
                .then(response => response.blob())
                .then(blob => {
                    var blob2 = new Blob([blob]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob2);
                    link.download = baseFilename;
                    link.click();
                })
                .catch((err) => {
                    console.error(err);
                    alert('ダウンロードに失敗しました');
                });}

            });
});

// // ラベルリセット
$('[id$="_resetFile"]').each(function() {
    $(this).on('click', function(e) {
        e.preventDefault();

        // ボタンのIDから '_resetFile' を削除して、対応するIDを取得
        let labelTextId = $(this).attr('id').replace('_resetFile', '');
        let hiddenId = labelTextId + '_hidden';

        // 対応するラベルのリセット
        $('#' + labelTextId).text('');

        // 対応する隠しフィールドの値を空に設定
        $('#' + hiddenId).val('');
    });
});
