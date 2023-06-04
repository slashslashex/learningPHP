<div class="form">
           <form class="appForm" method="post">
            Name:<br>
            <input type="text"  name="name"><br>
            Phone:<br>
            <input type="text"  name="phone"><br>
            <button>Send</button>
            <p class="err"></p>
        </form>
</div>
<script>
//получаем форму с помощью квери селектора по названному селектору(классу) в форме
    let form = document.querySelector('.appForm');
    //делаем переменную об ошибке и получаем по классу err
    let errorBox = document.querySelector('.err');
    //перехватываем отправку формы
    form.addEventListener('submit', function (e)
    {
        //чтобы форма не отправлялась
        e.preventDefault();
    //получение объекта класса formData то есть данные из формы от переданной формы
    //то есть все поля которые есть на форме готовятся к отправке на сервер с помощью фетча
        let formData = new FormData(form);
        //выводим в консоль
        // console.log(formData);
        //вызов методом фетч на адрес методом пост объекта формдата
        fetch('send.php',
            {
                method: 'POST',
                body: formData
            })
        //ждем ответ от сервера
        //перегоняем ответ в джсон формат
        .then(response=>response.json())
        //получаем данные с сервера
        .then(data=>
        {
            //выводим в консоль
            // console.log(data);
            if (data.res)
            {
                //форма успешно отправлена
                form.innerHTML = 'Your app is done!';
            }
            else
            {
                //заносим в параграф <p class="err"> информацию об ошибке
                errorBox.innerHTML = data.error;
            }
        })
    });
</script>