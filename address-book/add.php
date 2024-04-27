<?php
if (!isset($_SESSION)) {
    session_start();
}
$title = "新增通訊錄";
$pageName = 'add';

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
    form .mb-3 .form-text {
        color: red;
        font-weight: 800;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="sendData(event)">
                        <div class="mb-3">
                            <label for="name" class="form-label">姓名</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="birthday" class="form-label">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">地址</label>

                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"></textarea>
                            <div class="form-text"></div>
                        </div>


                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 成功新增資料後跳出 -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">新增成功</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    資料新增成功
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="location.href='list.php'">到列表頁</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">繼續新增</button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const nameField = document.form1.name;
    const emailField = document.form1.email;

    // 驗證email
    function validateEmail(email) {
        const re =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    const sendData = e => {
        e.preventDefault(); // 不要讓 form1 以傳統的方式送出

        nameField.style.border = '1px solid #CCCCCC';
        nameField.nextElementSibling.innerText = '';
        emailField.style.border = '1px solid #CCCCCC';
        emailField.nextElementSibling.innerText = '';
        // TODO: 欄位資料檢查

        let isPass = true; // 表單有沒有通過檢查
        if (nameField.value.length < 2) {
            isPass = false; //如果姓名字數小於2，讓isPass狀態變成false，並顯示以下錯誤訊息
            nameField.style.border = '1px solid red';
            nameField.nextElementSibling.innerText = '請填寫正確的姓名';

        }
        if (!validateEmail(emailField.value)) {
            isPass = false; // 如果email沒有通過驗證，讓isPass狀態變成false，並顯示以下錯誤訊息
            emailField.style.border = '1px solid red';
            emailField.nextElementSibling.innerText = '請填寫正確的 Email';
        }


        // 有通過檢查, 才要送表單
        if (isPass) {
            const fd = new FormData(document.form1); // 沒有外觀的表單物件

            fetch('add-api.php', {
                method: 'POST',
                body: fd, // Content-Type: multipart/form-data
            }).then(r => r.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        myModal.show();
                    } else { }
                })
                .catch(ex => console.log(ex))
        }
    };

    const myModal = new bootstrap.Modal('#staticBackdrop')
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>