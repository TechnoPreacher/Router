**компонент динамического роутера**
**дополнен передачей гет-параметров через рефлексию**


в каталоге example лежит index.php, который показывает пример использования роутера (для тестов этот index.php должен лежать в корне проекта)

также добавлен класс SomeClass для демонстрации возможностей обработки калбэков


Если запросить http://test.local/aa/bb то вызовет метод view2 класса SomeClass без передачи в него параметров (выводятся значения по умолчанию):

view2 method from some class
values of params (changed if get-request is set): id = 0; foo = 3 ru = 8

Если запросить http://test.local/aa/bb?id=95&foo=78&ru=69 то передаст в метод параметры:

view2 method from some class
values of params (changed if get-request is set): id = 95; foo = 78 ru = 69
