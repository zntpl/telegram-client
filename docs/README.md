
## Интересные фразы

Ну раз так Мат то напиши мне без ошибок ХОЧУ ЧАСТУШКУ или так напиши МУЗЫКА

🗒 Список моих команд ты можешь посмотреть тут: sharamedia.ru/bot

iii.ru - это место, где каждый может создать собственного виртуального персонажа - такого, как я

我不懂你。

✖ Ты получаешь предупреждение, а также можешь быть занесен в ЧС за частые грубости ✖

Я - бот для группы SharaMedia. Я умею много всего интересного и весёлого! Полный список команд ты мо.

## Непристойно

xz
Любите минет делать? По вам видно
xz
Щас как оттрахаю
xz
САМ ОТСОСИ, ПРИДУРОК

## ToDo

Логировать переписку, особенно то, на что не нашлось ответа

Возможность обучения

1) Почистить данные (убрать стоп-слова, спецсимволы, привести в нормальную форму и т.п.)
2) Векторизовать данные (bag of words, tf-idf, n-grams... )
3) Разделить выборку на train/test.
4) Собственно, обучить классификатор (не начинайте с нейросетей, начните с чего-то более простого типа random forest).
5) Сделать кросс-валидацию, ужаснуться от результата, начать чинить проблемы на каждом шаге.
Очень базовый туториал scikit-learn.org/stable/tutorial/text_analytics/wo... Гораздо менее базово - nlp.stanford.edu/IR-book/.

Ну вот, например: https://github.com/muatik/naive-bayes-classifier. Нужно только озаботиться, предварительно, лемматизировать или хотя бы стеммировать русские слова. Тут, наверное, PyMorphy поможет. 

## Запросы 

SELECT count(text) as count, text
FROM "dialog_answer_option"
WHERE "text" != ''
GROUP BY "text"
ORDER BY count DESC
LIMIT 500


SELECT dialog_tag.word, count(dialog_answer_tag.tag_id) as count
FROM "dialog_tag"
LEFT JOIN dialog_answer_tag ON dialog_answer_tag.tag_id = dialog_tag.id
GROUP BY dialog_answer_tag.tag_id 
ORDER BY count DESC
LIMIT 50

SELECT *
FROM "dialog_tag"
ORDER BY LENGTH(word) DESC
LIMIT 50

SELECT text
FROM "dialog_answer_option"
ORDER BY LENGTH(text) DESC
LIMIT 50

## Links

http://forum.iii.ru/index.php?showtopic=10969
http://forum.iii.ru/index.php?showtopic=3432
