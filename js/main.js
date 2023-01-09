/*
Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        full_name = $('input[name="full_name"]').val(),
        phone_number = $('input[name="phone_number"]').val(),
        birth_date = $('input[name="birth_date"]').val(),
        inn = $('input[name="inn"]').val(),
        password_confirm = $('input[name="password_confirm"]').val()

    let formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    formData.append('full_name', full_name);
    formData.append('phone_number', phone_number);
    formData.append('birth_date', birth_date);
    formData.append('inn', inn);
    formData.append('password_confirm', password_confirm);

    $.ajax({
        url: 'vendor/sign_up.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {

            if (data.status) {
                document.location.href = '/authorization.php'
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }

    });

});

/*
Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $('input').removeClass('error');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();


    $.ajax({
        url: 'vendor/sign_in.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success(data) {

            if (data.status) {
                document.location.href = '/index.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });

});

/*
Расчет стоимости осаго
 */

$('.calculation-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let power = $('select[name="power"]').val(),
        KBM = $('select[name="KBM"]').val(),
        region = $('select[name="region"]').val(),
        strahTime = $('select[name="strahTime"]').val(),
        yearTimeUsage = $('select[name="yearTimeUsage"]').val(),
        experience = $('select[name="experience"]').val(),
        owner = $('select[name="owner"]').val(),
        age = $('select[name="age"]').val(),
        driversCol = $('select[name="driversCol"]').val()

    let formData = new FormData();
    formData.append('power', power);
    formData.append('KBM', KBM);
    formData.append('region', region);
    formData.append('strahTime', strahTime);
    formData.append('yearTimeUsage', yearTimeUsage);
    formData.append('experience', experience);
    formData.append('age', age);
    formData.append('owner', owner);
    formData.append('driversCol', driversCol);

    $.ajax({
        url: 'vendor/osago_calculation.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            $('.msg').removeClass('none').text(data.message);
            $('.contract_execution-btn').removeClass('none');
        }

    });

});

$('.contract_execution-btn-welcome').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let power = $('select[name="power"]').val(),
        KBM = $('select[name="KBM"]').val(),
        region = $('select[name="region"]').val(),
        strahTime = $('select[name="strahTime"]').val(),
        yearTimeUsage = $('select[name="yearTimeUsage"]').val(),
        experience = $('select[name="experience"]').val(),
        owner = $('select[name="owner"]').val(),
        age = $('select[name="age"]').val(),
        driversCol = $('select[name="driversCol"]').val(),
        gos_number = $('input[name="gos_number"]').val()

    let formData = new FormData();
    formData.append('power', power);
    formData.append('KBM', KBM);
    formData.append('region', region);
    formData.append('strahTime', strahTime);
    formData.append('yearTimeUsage', yearTimeUsage);
    formData.append('experience', experience);
    formData.append('age', age);
    formData.append('owner', owner);
    formData.append('driversCol', driversCol);
    formData.append('gos_number', gos_number);

    $.ajax({
        url: 'vendor/osago_execution.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            $('.msg').removeClass('none').text(data.message);
        }

    });

});

// Рассчет стоимости страховки квартиры

$('.calculation-flat-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let sum_of_ins = $('select[name="sum_of_ins"]').val(),
        otdelka = $('select[name="otdelka"]').val(),
        property = $('select[name="property"]').val(),
        otvetstvenntost = $('select[name="otvetstvenntost"]').val()

    let formData = new FormData();
    formData.append('sum_of_ins', sum_of_ins);
    formData.append('otdelka', otdelka);
    formData.append('property', property);
    formData.append('otvetstvenntost', otvetstvenntost);

    $.ajax({
        url: 'vendor/flat_calculation.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            $('.msg').removeClass('none').text(data.message);
            $('.contract_execution-btn').removeClass('none');
        }

    });

});

$('.flat_execution-btn-welcome').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let sum_of_ins = $('select[name="sum_of_ins"]').val(),
        otdelka = $('select[name="otdelka"]').val(),
        property = $('select[name="property"]').val(),
        otvetstvenntost = $('select[name="otvetstvenntost"]').val()

    let formData = new FormData();
    formData.append('sum_of_ins', sum_of_ins);
    formData.append('otdelka', otdelka);
    formData.append('property', property);
    formData.append('otvetstvenntost', otvetstvenntost);

    $.ajax({
        url: 'vendor/flat_execution.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            $('.msg').removeClass('none').text(data.message);
        }

    });

});

