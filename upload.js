$("#imagesfile").change(function () {
    var file = this.files[0];
    //用size属性判断文件大小不能超过5M ，前端直接判断的好处，免去服务器的压力。
    if (file.size > 5 * 1024 * 1024) {
        alert("你上传的文件太大了！")
    }
    //好东西来了
    var reader = new FileReader();
    reader.onload = function () {
        // 通过 reader.result 来访问生成的 base64 DataURL
        var base64 = reader.result;
        //打印到控制台，按F12查看
        console.log(base64);
        //上传图片
        base64_uploading(base64);
    }
    reader.readAsDataURL(file);
});

//AJAX上传base64
function base64_uploading(base64Data) {
    $.ajax({
        type: 'POST',
        url: "./upload",
        data: {
            'base64': base64Data
        },
        dataType: 'json',
        timeout: 50000,
        success: function (data) {
            console.log(data);
        },
        complete: function () { },
        error: function (xhr, type) {
            alert('上传超时啦，再试试');
        }
    });
}