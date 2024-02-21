const breadcrumbs = {
    'projects.index' : [ {'route' : 'main', title: 'Главная'} , {'title' : "Проекты"}],
    'projects.show' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'projects.index', 'title' : "Проекты"}, {'title' : "Страница проекта"}],
    'projects.create' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'projects.index', 'title' : "Проекты"}, {'title' : "Создание"}],
    'projects.edit' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'projects.index', 'title' : "Проекты"}, {'title' : "Редактирование проекта"}],
    'projects.delete' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'projects.index', 'title' : "Проекты"}, {'title' : "Удаление проекта"}],
    'tasks.index' : [ {'route' : 'main', title: 'Главная'} , {'title' : "Задачи"}],
    'tasks.show' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'tasks.index', 'title' : "Задачи"}, {'title' : "Страница задачи"}],
    'tasks.create' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'tasks.index', 'title' : "Задачи"}, {'title' : "Создание задачи"}],
    'tasks.edit' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'tasks.index', 'title' : "Задачи"}, {'title' : "Редактирование задачи"}],
    'tasks.delete' : [ {'route' : 'main', title: 'Главная'} , {'route' : 'tasks.index', 'title' : "Задачи"}, {'title' : "Удаление задачи"}],
    'timelines.index' : [ {'route' : 'main', title: 'Главная'} , {'title' : "Тамлайны"}]

};

export default breadcrumbs;
